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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        @include('templates.top-header')
        @include('templates.lateral-menu')
        
        @yield('view-sub-header')

        <div id="container">
            <div id="content"> 

                @yield('view-content')
            
            </div>
        </div> 

        @yield('view-js')
    </body>
</html>