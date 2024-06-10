<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite(['resources/js/chart-plz.js']) --}}
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    @auth
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endauth
    {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = false;
  
      var pusher = new Pusher('f7a5eee73daae00b9122', {
        cluster: 'sa1'
      });
      var channel = pusher.subscribe('notificacao');
      channel.bind('NotificarPaciente', function(data) {
        alert(JSON.stringify(data));
      });
    </script> --}}
</head>

<body class="font-sans antialiased bg-{{ $theme ?? 'dark' }}">
    <!-- Navbar -->
    <div class="row">
        <x-navbar />
    </div>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 bg-{{ $theme ?? 'dark' }}">
            <x-sidebar />
        </div>
        <!-- Page Content -->
        <div class="container col-xl-10 col-lg-10 col-md-10 col-sm-10 bg-{{ $theme ?? 'dark' }}">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
