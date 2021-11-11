<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="{{ secure_url('assets/images/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->


<title>@yield('title') - {{ config('app.name') }}</title>

<meta name="description" content="@yield('meta_description', config('app.name'))">

<meta name="author" content="@yield('meta_author', config('app.name'))">



@yield('meta')

@stack('before-styles')

<link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">    

<link rel="stylesheet" href="{{ secure_url('assets/vendor/font-awesome/css/font-awesome.min.css') }}">    

<link rel="stylesheet" href="{{ secure_url('assets/vendor/animate-css/vivify.min.css') }}">



@stack('after-styles')

@if (trim($__env->yieldContent('page-styles')))    

@yield('page-styles')

@endif    



<!-- Custom Css -->

<link rel="stylesheet" href="{{ secure_url('assets/css/mooli.min.css') }}">

</head>



<body data-theme="light">

    

<div id="body" class="theme-cyan">

    

    <!-- Theme setting div -->

    @include('admin.layout.themesetting')



    <!-- Overlay For Sidebars --> 

    <div class="overlay"></div>



    <div id="wrapper">

        

        <!-- main page header -->

        @include('admin.layout.navbar')



        <!-- project main left menubar -->

        @include('admin.layout.sidebar')



        <!-- Rightbar chat  -->

        @include('admin.layout.rightbar')    



        <!-- sticky note rightbar div -->

        @include('admin.layout.stickynote')



        <div id="main-content">

            <div class="container-fluid">          



                @yield('content')



            </div>

        </div>        

    </div>



    @yield('popup')

    

</div>





<!-- main jquery and bootstrap Scripts -->

@stack('before-scripts')

<script src="{{ secure_url('assets/bundles/libscripts.bundle.js') }}"></script>

<script src="{{ secure_url('assets/bundles/vendorscripts.bundle.js') }}"></script>

@stack('after-scripts')



<!-- vendor js file -->

@yield('vendor-script')



<!-- project main Scripts js-->

<script src="{{ secure_url('assets/bundles/mainscripts.bundle.js') }}"></script>



<!-- page Scripts ja -->

@yield('page-script')



<!--Start of Tawk.to Script-->

<script type="text/javascript">

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

(function(){

var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];

s1.async=true;

s1.src='https://embed.tawk.to/5e44175da89cda5a188591ec/1e0t1qduj';

s1.charset='UTF-8';

s1.setAttribute('crossorigin','*');

s0.parentNode.insertBefore(s1,s0);

})();

</script>

<!--End of Tawk.to Script-->



</body>

</html>

