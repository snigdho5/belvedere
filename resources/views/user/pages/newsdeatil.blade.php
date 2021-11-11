@extends('layouts.user')

@push('css')

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

@endpush

@section('content')

    

       

<script
src="https://www.paypal.com/sdk/js?client-id=AdSuJbD9cyJpGbooPSf3Z963eDNCJ1TXJVmHEB6oOXJKqpbI9S0TYyB1vHT4wuZdNtPUmP6u9LwXNUOA&disable-funding=credit,card&currency=EUR">
</script>



    <div class="xt-page-title-area">

        <div class="xt-page-title">

            <div class="container">

                <h1 class="entry-title">News Details</h1> </div>

        </div>

        <div class="xt-breadcrumb-wrapper">

            <div class="container">

                <nav class="xt-breadcrumb">

                    <ul>

                        <li><a href="#">Home</a></li>

                        <li><a href="#">News</a></li>

                        <li class="current">News Details</li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

    <div class="site-content">

    	<div class="container">

    		<h1 class="tribe-events-single-event-title center">{!! $data->title !!}</h1>

    		<div class="tribe-events-schedule tribe-clearfix">

                {{--

                    <h2>

                        <span class="tribe-event-date-start">{{ $data->date }}</span>&nbsp; &nbsp; | &nbsp;&nbsp;

                        <span class="tribe-event-date-end">Time: {{ $data->time }} pm</span>&nbsp; &nbsp; | &nbsp;&nbsp;

                        <span class="tribe-events-cost">Cost: ${{ $data->cost }}</span>

                    </h2>

                --}}

            </div>

    		<div class="tribe-events-event-image center"> <img src="http://demoserver.tech/public/uploads/image/1606072328_61779.jpg" alt=""> </div>

    		<!-- <p>{{ $data->description }}</p> -->        

    		<div class="container">{!! $data->description !!}</div> {{--

    		<div class="reptro-all-courses-btn"> <a class="btn btn-lg btn-fill AddNew" href="javascript:void(0)">Book Now</a></div> --}}

        </div>

    </div>

    {{--@include('user.include.sponser')--}}

    <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>



    <script>

        // This function displays Smart Payment Buttons on your web page.

        $(document).on("click", ".AddNew", function() {

            $('#formsub').prop('disabled', true);

            $('#eventBookForm').trigger("reset");

            // $('#ModelTitle').html('Add Member');

            // $('#ModelButton').html('Save');

            $('#exampleModalCenter').modal('show');

            $("#eventBookForm")[0].reset();

            });

        //post request

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

                

        $('#eventBookForm').on('submit', function(event) {

            event.preventDefault();

            url = "{{ url('eventcheckout') }}"            

            $.ajax({

                url: url,

                type: "POST",

                data: new FormData(this),

                contentType: false,

                processData: false,

                success: function(data) {

                    $('#exampleModalCenter').modal('hide');

                },

                error: function(reject) {

                    if (reject.status === 422) {

                        var errors = $.parseJSON(reject.responseText);

                        $.each(errors.errors, function(key, val) {

                            vkey = key.split(".")[0];

                            if (vkey != "gallery_image") {

                                vkey = key.replace(".", "_");

                            }

                            $("#" + vkey + "_error").html(val[0]);

                        });

                        //$(':input[type="submit"]').prop('disabled', false);

                    }

                }

            })

            return false;

        });

    </script>

@endsection