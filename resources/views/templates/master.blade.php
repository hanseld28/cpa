<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CPA</title>
        
        @yield('view-css')

        <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}">
    </head>
    <body>
        @include('templates.lateral-menu')

        @yield('view-content')
        

        @yield('view-js')
    </body>
</html>