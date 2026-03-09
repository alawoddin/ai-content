<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}">
    <title>Home - CopyGen - AI Writer &amp; Copywriting Landing Page HTML Template.</title>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">


</head>

<body class="nk-body ">
    <div class="nk-app-root " data-sidebar-collapse="lg">
        <div class="nk-main">


            @include('admin.body.sidebar')

            <!-- .nk-sidebar -->
            <div class="nk-wrap">

                @include('admin.body.mobile')

                <div class="nk-content">
                    <div class="container-xl">
                        @yield('admin')
                    </div>
                </div>

                @include('admin.body.footer')

            </div>
        </div>
    </div>
    <script src="{{ asset('backend/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
</body>

</html>
