<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Promo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="vh-100">
<header>

</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>

</footer>
</body>
@yield('script')
@yield('style')
<style>
    body {
        background: url("/storage/img/bg/miratorg_3.jpg") no-repeat center center /cover;
        font-family: 'Nunito', sans-serif;
    }

    .btn-bg {
        background: #f34c60;
        color: white;
        font-weight: bold;
    }

    .form_block {

    }
</style>
</html>
