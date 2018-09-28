<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Phoceis') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
</head>
<body>
<div class="container">
    <h1>WeChat test</h1>
    <pre>
        {{ $jssdk }}
    </pre>
    <button onclick="startScanning()">Start beacon scanning</button>
    <button onclick="stopScanning()">Stop beacon scanning</button>
</div>
<script>
    // var wx = require('weixin-js-sdk');

    wx.config({!! $jssdk !!});
   
    wx.ready(function () {
        wx.onMenuShareTimeline({
            title: 'Test title',
            link: '{{ env('APP_URL') }}'
        });

        wx.onMenuShareAppMessage({
            title: 'Test title',
            desc: 'Random description',
            link: '{{ env('APP_URL') }}'
        });
    });
       wx.downloadFile({
            url: 'https://www.bouncepad.com/wp-content/uploads/2014/11/BP-DAT-MEG-FLX.pdf',
            success: function (res) {
                var filePath = res.tempFilePath
                wx.openDocument({
                    filePath: filePath,
                    success: function (res) {
                    console.log('打开文档成功')
                    }
                })
            }
    }) 

    function startScanning () {
        wx.startSearchBeacons({
            ticker: "test"
        })
    }

    function stopScanning () {
        wx.stopSearchBeacons({
            complete: function (argv) {

            }
        })
    }

</script>
</body>
</html>