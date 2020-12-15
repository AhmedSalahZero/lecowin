<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\View\View;
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
        return redirect()->route('tasks.index')->with('success','Done !');
    }
    public function update(Request $request , Task $task):RedirectResponse
    {
        $task->update(array_merge($request->only(['name','note']) ,[
            'due_date'=>format_date($request->due_date) ,
            ]));
        return redirect()->route('tasks.index')->with('success','Done !');
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
        return redirect()->back()->with('success','Done !');

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
}
