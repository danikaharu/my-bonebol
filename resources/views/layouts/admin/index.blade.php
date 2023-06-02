<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal Aplikasi Bone Bolango</title>

    <link rel="stylesheet" href="{{ asset('template/admin') }}/css/main/app.css" />
    <link rel="stylesheet" href="{{ asset('template/admin') }}/css/main/app-dark.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('template/admin') }}/images/favicon/favicon.ico" />
    @stack('css')
</head>

<body>
    <script src="{{ asset('template/admin') }}/js/initTheme.js"></script>
    <div id="app">
        @include('layouts.admin.include.sidebar')
        <div id="main">
            @include('layouts.admin.include.header')

            @yield('content')

            @include('layouts.admin.include.footer')
        </div>
    </div>
    <script src="{{ asset('template/admin') }}/js/bootstrap.js"></script>
    <script src="{{ asset('template/admin') }}/js/app.js"></script>
    <script src="{{ asset('template/admin') }}/js/extensions/jquery/jquery.min.js"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    @stack('js')
</body>

</html>
