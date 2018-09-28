<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\CheckUserInformation;
use App\Event;
use App\GtUser;
use App\UploadFile;
use App\Model\UploadHistory;
use Illuminate\Support\Facades\DB;
use JavaScript;

class AdminController extends Controller
{
    /**
     * Store a new user.
     *
     * @param UploadFileRequest
     * @return Response
     */
    public function putFile(UploadFileRequest $request)
    {
        $file = $request->file('uploadfile');
        $eventName = $request->input('eventName');
        //  $path = $request->uploadfile->path();
        $uploadFile = new UploadFile();
        $event = new Event();
        $event->eventName = $eventName;
        $fileName = $request->uploadfile->getClientOriginalName();
       
        $path = $request->uploadfile->storeas('upload', $fileName, 'public');
        $uploadFile->path = $path;
        $uploadFile->fileName = $fileName;
        $uploadFile->eventName = $eventName;
        $eventIfExist = Event::where('eventName',$eventName)->find(1); 

        if($eventIfExist != null){
            $event->save();
            $uploadFile->save();
        }else{
            UploadFile::where('eventName',$eventName)
            ->update(['fileName'=>$fileName,'path'=>$path]);
        }
         $headers = array(
            'Content-Type: application/pdf',
        );
       
    // return view("admin.checkInfo",[
    //     'message' => 'File uploaded sucessfully']
    // );  
        
        return response()->json([
            'meassage' => 'File uploaded sucessfully',
        ]);
    }

    function home(){
        $uploadHistory = UploadHistory::all();

        // JavaScript::put([
        //     'params' => [
        //         "uploadHistory" => $uploadHistory,
        //         // "player" => $player,
        //     ],
        //     'jssdk' => $request->get('jssdk'),
        // ]);
        return view("admin.upload");
    }

    function checkUploadHistory(){
        return "sdfas啥地方经济阿萨德d";
    }
}




