<!DOCTYPE html>

<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<link rel="stylesheet" href="{{secure_url('assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<head>

   @include('user.include.head')

   @stack('css')

</head>



<body>

    @include('user.include.header')

    @yield('content')

    @include('user.include.footer')

    <script>

    /*$('.count').each(function () {

                $(this).prop('Counter',0).animate({

                    Counter: $(this).text()

                }, {

                duration: 10000,

                easing: 'swing',

                step: function (now) {

                    $(this).text(Math.ceil(now));

                }

                });

            });*/

    </script>

</body>

    @stack('js')

</html>