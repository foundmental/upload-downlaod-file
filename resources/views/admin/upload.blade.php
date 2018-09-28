@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div id="admin">
            <div class="upload-file">
                    <img class="phoceis-logo" src="../../images/phoceislogo.png">
                    <form action="http://gt.phoceis.cc/admin/putfile" method="post" enctype="multipart/form-data"  novalidate="true">
                            <!-- <p><input type="hidden" name="_token" :value="csrf"></p> -->
                            {{ csrf_field() }}
                            <p>Event: <input class="event" type="text" name="eventName"></p>    
                            <p><input class="file" type="file" accept='application/pdf' name="uploadfile"></p>    
                            <div>
                            <button type="button" class="btn btn-secondary">Only pdf file format can upload</button>
                            <input class="btn btn-outline-secondary" type="submit" value="Submit" >         
                            </div>
                    </form>
                    <a href="http://gt.phoceis.cc/#/admin/checkUploadHistory"><button class="btn btn-info check-upload-history">check upload history</button></a>
            </div>
    </div>
</div>
@endsection

<style lang="css" scoped>
    .btn-secondary{
        background-color: #1dc5ef;
    }
    .check-upload-history{
        margin-top:20vh
    }

    .upload-file{
        text-align:center;
    } 
    .file{
        height: 35px;
        border: 1px solid #6c757d;
        border-radius: 0.25rem;
        overflow:hidden;
        margin-top: 20px;
    }
    .phoceis-logo{
        margin-top: 20px;
        height: 100px;
    }
    .event{
        margin-top: 20px;
    }
</style>




