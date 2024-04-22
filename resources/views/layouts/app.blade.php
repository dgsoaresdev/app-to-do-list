<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title-page')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- {{ $page_slug = 'dashboard' }} --}}

    @if ( $page_slug != 'login' )

            <!-- Plugin css -->
            <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">

            <!-- Theme Config Js -->
            <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

            <!-- App css -->
            <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

            <!-- Icons css -->
            <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

            @if ( $page_slug === 'administradoras' || $page_slug === 'administradoras-usuarios' || $page_slug === 'administradoras-details' )

                <!-- Datatable css -->
                <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

            @endif

            {{-- ADD ADMINISTRADOR --}}

            <!-- Bootstrap Datepicker css -->
            <link href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

            <!-- Select2 Plugins css -->
            <link href="{{ asset('assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

            <!-- SimpleMDE css -->
            <link href="{{ asset('assets/vendor/simplemde/simplemde.min.css') }}" rel="stylesheet" type="text/css" />
            <style>
                .CodeMirror{
                    min-height: 200px !important;
                    max-height: 240px !important;
                }
            </style>



        @elseif ( $page_slug === 'login' )
            <!-- Theme Config Js -->
            <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

            <!-- App css -->
            <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

            <!-- Icons css -->
            <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
       
        {{-- END HYPER --}}
        @endif

        {{-- TOASTR --}}
        
        <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-toastr/toastr.min.css') }}">
        <script src="{{ asset('assets/vendor/jquery/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-toastr/toastr.min.js') }}"></script>

</head>
<body>
    <div id="app">
        @yield('content')
    </div>
     @include('layouts._partials.notifications')
</body>
</html>
