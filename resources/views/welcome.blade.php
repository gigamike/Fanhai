<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/modern-business.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <home-component></home-component>
        </div>
        <footer class="py-5 bg-dark">
            <div class="container">
            <p class="m-0 text-center text-white">Exam By Mik Galon</p>
            </div>
        </footer>
        <script src="{{ URL::asset('/js/app.js') }}"></script>
    </body>
</html>