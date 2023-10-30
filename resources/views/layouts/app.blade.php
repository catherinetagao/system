<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CupsCath</title>
    <link rel = "icon" href = "../assets/img/mug.png" type = "image/x-icon"> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss','resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- SweetAlert -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <div id="app">

        @include('components.navbar')
        

        <main class="py-4">
            @yield('content')
        </main>

        @include('components.modalProduct')
        @include('components.modalUpdateProduct')
        @include('components.footer')

    </div>

   
</body>
</html>
