<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Styles -->
    <!-- <link rel="stylesheet" href="/css/style.css"> -->

    <style>
        a{
            color: white !important;
        }
    </style>

    </head>
    <body>

        <div class="">
            <div class="">
                <h1>HomePage</h1>
            </div>

        </div>

            <div id="app" class="container">
                <router-view></router-view>
            </div>


        </header>
        <script src="{{ mix('/js/app.js') }}"></script>
</html>
