<?php


namespace App\Traits;
use Intervention\Image\Facades\Image;
trait hasFile
{
    protected function uploadImage($request , $path)
    {

       if ($this->checkImageDimensions($request->image))
           return $request->image->store($path,'public');
        return false;
    }
    protected function updateImage($request , $library,$path):string
    {
        if ($request->has('image'))
        {
            $this->deleteOldImage($library);
            return $this->uploadImage($request,$path);
        }
        return $library->image ;
    }
    protected function updateFile($request , $library,$path):string
    {
        if ($request->has('pdf'))
        {
            $this->deleteOldFile($library);
            return $this->uploadFile($request,$path);
        }
        return $library->pdf ;
    }
    protected function uploadFile($request , $path):string
    {
       return $request->pdf->store($path,'public');
    }
    protected function deleteOldImage($library):void
    {
        if(file_exists('storage/'.$library->image)){
            unlink('storage/'.$library->image);
        }
    }
    protected function deleteOldFile($library):void
    {
        if(file_exists('storage/'.$library->pdf)){
            unlink('storage/'.$library->pdf);
        }
     }
     protected function checkImageDimensions($image):bool
     {
         return getimagesize($image)[0]>254 && getimagesize($image)[1]>257 ;
     }
}
