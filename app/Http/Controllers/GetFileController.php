<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use App\Http\Requests\CheckUserInformation;
use App\GtUser;
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

        $gtuser = new GtUser();
        $gtuser->name = $name;
        $gtuser->email = $email;
        $gtuser->save();
        $file= public_path()."/download/test.ppt";
        $headers = array(
          'Content-Type: application/ppt',
        );

  
      return  response()->file($file,$headers);
    }
}




