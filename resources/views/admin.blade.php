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
            <img class="phoceis-logo" src="../../images/phoceislogo.png">
            <form action="http://gt.phoceis.cc/admin/putfile" method="post" enctype="multipart/form-data" novalidate="true">
                <p><input class="uploadfile" type="file" name="uploadfile"></p>    
                <p><input class="btn btn-outline-secondary" type="submit" value="Submit" > </p>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
<script src="{{ mix('js/app.js') }}"></script>

<style scoped>
    #admin{
        text-align:center;
    } 
    .uploadfile{
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

</style>
</body>
</html>
