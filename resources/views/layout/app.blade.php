<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <title>My Blog</title>
    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <div id="page-wrapper" class="full-height">
        <div id="page-container">
            @include('layout.sidebar')
            <div id="main-container">
                @include('layout.header')

                <div id="page-content" class="container py-5">
                    @yield('content')
                </div>

                @include('layout.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>

</html>