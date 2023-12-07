<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Vienna Project' }}</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/table-styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/register-styles.css') }}">
        <style>
            body{
                background-image: url("{{ asset('images/bg.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh;
            }
        </style>
                
        @vite(['resources/js/app.js'])
    </head>
    
    <body>
        @yield('content')

        <div id="pre-loader">
            <div class="spinner"></div>
        </div>
        
        <script>
            setTimeout(() => {
                document.getElementById('pre-loader').style.display = 'none';
                document.querySelector('.content').style.display = 'block';
            }, 2000);
        </script>

        <div class="w-100 mx-auto text-center fixed-bottom p-3">
            <h4>
                All Rights Reserved To &copy; <span class="text-info fw-bold">Muhammed Saber</span>
            </h4>
        </div>
    </body>
</html>
