<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin: - @yield('title')</title>
    @include('includes.admin.tempstyles')
</head>

<body>
    <div class="wrapper">
        @include('includes.admin.navbar')

        @section('sidebar')
        @include('sidebar')
        @show

        <div class="content-wrapper">

            @yield('content')

        </div>


        @section('footer')
        @include('includes.admin.footer')
        @show

        @include('includes.admin.tempscript')
    </div>
</body>
</html>
