<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Admin Dashboard') }}</title>
    {{--libs css--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.48.0/tabler-icons.min.css"
          integrity="sha512-FpfjSBRmQDu3MAAZrjj8j+RwvbASPc9f+gpd2pF/sHXPWPeTbd1OmXpC7CYt+Nnb6kD+Ed0fFH366YcAoV9LNA=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- CSS files -->
    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/demo.min.css') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('assets/admin/js/demo-theme.min.js') }}"></script>


    <div class="page">


        <!--------------- Sidebar ----------------->

        @include('Admin.layouts.sidebar')

        <!--------------- End Sidebar ----------------->


        <!--------------- Header ----------------->

        @include('Admin.layouts/header')

        <!--------------- End Header ----------------->




        <!------------------- Page Content--------------------->
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>


        <!------------------- End Page Content--------------------->



        <!---------------------- footer ---------------------------->

        @include('Admin.layouts.footer')


        <!---------------------- End footer ---------------------------->


    </div>

    <!-- Libs JS -->
    <script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tabler Core -->
    <script src="{{ asset('assets/admin/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/demo.min.js') }}" defer></script>
    <!-- Admin Js -->
    <script src="{{asset('assets/admin/js/default/admin.js')}}" ></script>

</body>

</html>
