<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .flex-container {
                display: flex;
                flex-wrap: wrap;
            }

            html, body {
                margin: 0;
                padding: 0;,
                height: 100%;
                width: 100%;
                background-color: #d1d1d1
            }
            #mute {
                position: absolute;
            }
            #mute.on {
                opacity: 0.7;
                z-index: 1000;
                background: white;
                height: 100%;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="mute"></div>
        <div class="container" id="app">
            <App></App>
        </div>
        <script src="{{ 'js/app.js' }}"></script> 
    </body>
</html>
