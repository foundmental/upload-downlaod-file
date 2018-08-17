<?php

namespace App\Http\Controllers;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\CheckUserInformation;
use App\GtUser;
use App\UploadFile;
use Illuminate\Support\Facades\DB;
class PutFileController extends Controller
{
    /**
     * Store a new user.
     *
     * @param UploadFileRequest
     * @return Response
     */
    public function putFile(UploadFileRequest $request)
    {
        $file = $request->file("uploadfile");
        // $path = $request->$file->path();
         $path = $request->uploadfile->path();
         $uploadFile = new UploadFile();
         $fileName = $request->uploadfile->getClientOriginalName();
         $uploadFile->fileName = $fileName;
         $uploadFile->path = $path;
         $uploadFile->save();
         $path = $request->uploadfile->storeas('upload',$uploadFile->id.'_'.$fileName,'public');
       
      return  response()->file($file);
    }
}




