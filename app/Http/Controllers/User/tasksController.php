<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tasksController extends Controller
{
    public function index(User $user):view
    {
        return view('user.tasks.index')->with('user',$user->load(['tasks']));
    }
    public function store(StoreTaskRequest $request):RedirectResponse
    {
        Task::create(array_merge($request->only(['name','note']) ,[
            'due_date'=>format_date($request->due_date) ,
            'user_id'=>Auth()->user()->id,
            'status'=>'uncompleted'
        ] ));
        return redirect()->route('tasks.index',App()->getLocale())->with('success',trans('lang.done'));
    }
//    public function update(Request $request , Task $task):RedirectResponse
//    {
//        $task->update(array_merge($request->only(['name','note']) ,[
//            'due_date'=>format_date($request->due_date) ,
//            ]));
//        return redirect()->route('tasks.index',App()->getLocale())->with('success',trans('lang.done'));
//    }
    public function editWithAjax(Task $task , Request $request  ):JsonResponse
    {
        $this->formatData($task,$request);
        return response()->json([
            'status'=>true
        ]);
    }

    public function completedTask(Task $task):RedirectResponse
    {
       $task->completedTask();
       return redirect()->back();
    }
    public function getArchivedTasks(User $user):view
    {
        return view('user.tasks.archive')->with('tasks',$user->getArchivedTasks());
    }
    public function archiveTask(Task $task):RedirectResponse
    {
        $task->archivedTask();
        return redirect()->back()->with('success',trans('lang.done'));

    }
    public function destroy(Task $task , User $user):jsonResponse
    {
        $task_id = $task->id ;
       $task->delete();
       return response()->json([
           'status'=>true ,
           'id'=>$task_id ,
           'archived_tasks_count'=>$user->countArchivedTasks(),
           'completed_tasks_count'=>$user->countCompletedTasks(),
           'uncompleted_tasks_count'=>$user->countUncompletedTasks()
       ]);
    }
    protected function formatData($task,$request):void
    {
        $originalNote = explode('#',$task->note) ;
        $originalDueDate = explode('#',$task->due_date) ;
        $originalNote[$request->segmentNumber] = $request->noteField ;
        $originalDueDate[$request->segmentNumber] = format_date($request->dueDateField) ;
        $task->due_date = implode('#',$originalDueDate) ;
        $task->note = implode('#',$originalNote) ;
        $task->name = $request->nameField   ;
        $task->save();
    }

    public function calendar()
    {
        return view('user.tasks.calendar');
    }
    public function goals()
    {
        return view('user.tasks.goal');
    }
    public function storeGoal(Request $request)
    {
        $request->user()->update([
            ''
        ]);
    }
}
