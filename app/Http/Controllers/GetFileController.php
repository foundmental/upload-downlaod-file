<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use App\Http\Requests\CheckUserInformation;
use App\GtUser;
use App\UploadFile;
use Illuminate\Support\Facades\DB;
class GetFileController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  CheckUserInformation  $request
     * @return Response
     */
    public function getFile(CheckUserInformation $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $uploadFile = UploadFile::orderBy('id','desc')->first();
        $file = storage_path()."/app/public/upload/".$uploadFile->id."_".$uploadFile->filename;
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
        $headers = array(
            'Content-Type: application/ppt',
        );

  
      return  response()->download($file,$uploadFile->filename,$headers);
    }
}




