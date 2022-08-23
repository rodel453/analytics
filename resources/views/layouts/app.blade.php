<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.partials.head')

   
</head>

<?php
$id = Auth::id();
if ($id != null){
    $utype = Auth::user()->user_type;
}

?>


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->

    @if (Route::currentRouteName() != 'register' && Route::currentRouteName() != 'login' && Route::currentRouteName() != 'password.request')
        @if ($utype == 1)
            @include('layouts.partials.adminmenu') 
         @else 
            @include('layouts.partials.menu') 
        @endif
    @endif


    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        
        @if (Route::currentRouteName() != 'register' && Route::currentRouteName() != 'login' && Route::currentRouteName() != 'password.request')
        @include('layouts.partials.topbar')
        @endif
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content') 
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @if (Route::currentRouteName() != 'register' && Route::currentRouteName() != 'login' && Route::currentRouteName() != 'password.request')
        @include('layouts.partials.footer') 
        @endif
        
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

     @include('layouts.partials.footer-script')

</body>

</html>
