<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="portal bone bolango, bone bolango" />
    <meta name="description"
        content="Portal Aplikasi Bone Bolango adalah wadah untuk seluruh aplikasi yang ada di Bone Bolango" />
    <meta name="author" content="Diskominfo Bone Bolango" />

    <title>Portal Aplikasi Bone Bolango</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('template/user') }}/images/favicon.ico" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/user') }}/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('template/user') }}/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('template/user') }}/css/responsive.css" rel="stylesheet" />
</head>

<body class="{{ request()->is('/') ? '' : 'sub_page' }}">

    <div class="hero_area">
        @include('layouts.user.include.header')
        @stack('slider')
    </div>

    @yield('content')

    @include('layouts.user.include.footer')


    <script type="text/javascript" src="{{ asset('template/user') }}/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('template/user') }}/js/bootstrap.js"></script>
    <script type="text/javascript" src="{{ asset('template/user') }}/js/custom.js"></script>
    @stack('js')


</body>

</html>
