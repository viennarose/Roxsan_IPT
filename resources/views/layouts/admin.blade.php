<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleButton.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png')}}" />

    <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui.css')}}">
    @livewireStyles
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper" >
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel bg-info" >
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>

    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

    <script src="{{ asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('admin/js/template.js')}}"></script>

    <!-- Custom js for this page-->
    <script src="{{asset('/admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/data-table.js')}}"></script>
    <script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End custom js for this page-->


    <script src="{{ asset('assets/js/external/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js')}}"></script>

    {{-- for touch-enabled devices --}}
    {{-- <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script> --}}

    <script type="text/javascript" src="{{asset('assets/js/signature/jquery.signature.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @livewireScripts
    @yield('script')


</body>
</html>
