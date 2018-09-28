<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\CheckUserInformation;
use App\GtUser;
use App\UploadFile;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function user (CheckUserInformation $request) {
        $name = $request->input('name');
        $email = $request->input('email');

        $uploadFile = UploadFile::orderBy('id','desc')->first();
        $file = storage_path()."/app/public/upload/".$uploadFile->fileName;

        $gtUser = new GtUser();
        $gtUser->name = $name;
        $gtUser->email = $email;
        $gtUser->downloadFile = $file;

        $emailDB = GtUser::where('email', 1)->get();
        $nameDB = GtUser::where('name', 1)->get();

        if($emailDB == $email && $nameDB != $name){
            GtUser::where('email', $email)
            ->update(['name' => $name]);
        }
        if($emailDB != $email || $nameDB != $name){
             $gtUser->save();
        }
    }

    public function presentation() {
        $uploadFile = UploadFile::orderBy('id','desc')->first();
        $fileName = $uploadFile->fileName; 
        $file = storage_path()."/app/public/upload/".$fileName;

        $headers = array(
            'Content-Type: application/pdf',
        );
         return response()->file($file, $headers);
    }
}
