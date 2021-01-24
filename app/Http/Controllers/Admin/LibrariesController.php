<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;
use App\Models\Library;
use App\Traits\hasFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrariesController extends Controller
{

    use HasFile ;

    public function index()
    {


        return view('admin.libraries.index')->with('libraries' , Library::with('creator')->get());
    }
    public function create()
    {
        return view('admin.libraries.create');
    }
    public function store(StoreLibraryRequest $request)
    {
        $image=$this->uploadImage($request,'library\image') ;
        if (!$image)
            return redirect()->back()->with('fail', trans('lang.Image dimensions must be at least 254*257'));
         $pdf = $this->uploadFile($request,'library\pdf');
         Library::create(array_merge($request->only(['name','description']) , ['image'=>$image], ['pdf'=>$pdf] ,['created_by'=>Auth::user()->id]));
         return redirect()->route('libraries.create')->with('success',trans('lang.done'));

    }
    public function edit(Library $library)
    {
       return view('admin.libraries.create')->with('library',$library);
    }
    public function update(UpdateLibraryRequest $request , Library $library)
    {
        $image = $this->updateImage($request,$library,'/library/image');
        $pdf = $this->updateFile($request,$library,'/library/pdf');
        $library->update(array_merge($request->only(['name','description']) , ['image'=>$image], ['pdf'=>$pdf]));
        return redirect()->route('libraries.index')->with('success','libraries updated successfully');

    }
    public function destroy(Library $library)
    {
        $library_id = $library->id ;
        $this->deleteOldImage($library);
        $this->deleteOldFile($library);
        $library->delete();
        return response()->json([
            'status'=>true ,
            'id'=>$library_id ,
            'library_count'=>count(Library::all())
        ]);

    }
}
