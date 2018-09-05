<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
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
        </div>
        </div>
    </div>
<script src="{{ mix('js/app.js') }}"></script>

<style scoped>
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





</body>
</html>
