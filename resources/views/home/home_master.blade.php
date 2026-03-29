<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <title> SaaS Application.</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>

<body class="nk-body " data-menu-collapse="lg">
    <div class="nk-app-root ">

        @include('home.body.header')

        <main class="nk-pages">
            @yield('home')
        </main>
        @include('home.body.footer')
    </div>
    <script src="{{ asset('frontend/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
</body>

</html>
