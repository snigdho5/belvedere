@extends('layouts.user')

@push('css')

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .tttext {

            display: block;

            width: 200px;

            overflow: hidden;

            white-space: nowrap;

            text-overflow: ellipsis;

        }

    </style>

@endpush

@section('content')



    <script
        src="https://www.paypal.com/sdk/js?client-id=AdSuJbD9cyJpGbooPSf3Z963eDNCJ1TXJVmHEB6oOXJKqpbI9S0TYyB1vHT4wuZdNtPUmP6u9LwXNUOA&disable-funding=credit,card&currency=EUR">
    </script>


    {{-- <script
        src="https://www.paypal.com/sdk/js?client-id=AVZGP8lxfDPrBPU_7JIIl6HO2uw3zFSSm1Nr7Y_x55PIFcqGSWALbpRjv_XR-GbANoDc2bMYk8-wYLQp&disable-funding=credit,card&currency=EUR">
    </script> --}}

    <div class="xt-page-title-area">

        <div class="xt-page-title">

            <div class="container">

                <h1 class="entry-title">Events Details</h1>

            </div>

        </div>

        <div class="xt-breadcrumb-wrapper">

            <div class="container">

                <nav class="xt-breadcrumb">

                    <ul>

                        <li><a href="#">Home</a></li>

                        <li><a href="#">Events</a></li>

                        <li class="current">Events Details</li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

    <div class="site-content">

        <div class="container">

            <h1 class="tribe-events-single-event-title center">{{ $event->title }}</h1>

            <div class="tribe-events-schedule tribe-clearfix center">

                @php
                    
                    $timestemp = $event->fromdate;
                    
                    $year = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->year;
                    
                    $month = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->month;
                    
                    $day = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->day;
                    
                    $fromtimestamp = explode('-', $event->fromdate);
                    
                    $fromdate = $fromtimestamp[0] . $fromtimestamp[1] . $fromtimestamp[2];
                    
                    /*$totimestamp    =   explode('-', $event->todate);
                                                                                
                                                                                                    $todate       =   $totimestamp[0].$totimestamp[1].$totimestamp[2];*/
                    
                @endphp

                <h2>

                    <span class="tribe-event-date-start">{{ date('d, F  Y', strtotime($fromdate)) }}</span>&nbsp; &nbsp; |
                    &nbsp;&nbsp;

                    <span class="tribe-event-date-end">Time: {{ $event->time }}</span>&nbsp; &nbsp; | &nbsp;&nbsp;

                    <span class="tribe-events-cost">Cost: €{{ $event->cost }}</span>

                </h2>

            </div>

            <div class="tribe-events-event-image"><img src="{{ asset('imagess/' . $event->image) }}" alt=""></div>

            <p>{{ $event->desc }}</p>

            <div class="reptro-all-courses-btn"> <a class="btn btn-lg btn-fill AddNew" href="javascript:void(0)">Book
                    Now</a></div>



            {{-- <div class="tribe-events-event-meta clearfix">

                <div class="row">

                    <div class="col-md-4">

                        <h2 class="tribe-events-single-section-title"> Details</h2>

                        <dl>

                            <dt class="tribe-events-start-datetime-label"> Event Name:</dt>

                            <dd> <abbr class=""> {{ $event->title }} </abbr></dd>

                            <dt> Date:</dt>

                            <dd> <abbr>{{ date('d, F  Y', strtotime($fromdate)) }} - {{ date('d, F  Y', strtotime($todate)) }}</abbr></dd>

                            <dt> Time:</dt>

                            <dd> <abbr> {{ $event->time }}</abbr></dd>

                            <dt> Cost:</dt>

                            <dd id="eventPrice"> €{{ $event->cost }}</dd>

                        </dl>

                    </div>

                    <div class="col-md-4">

                        <h2 class="tribe-events-single-section-title">Event Contact</h2>

                        <dl>

                            <dt class="tribe-organizer-tel-label"> Phone:</dt>

                            <dd class="tribe-organizer-tel"> {{ $event->phone_no }}</dd>

                            <dt class="tribe-organizer-email-label"> Email:</dt>

                            <dd class="tribe-organizer-email">{{ $event->email }}</dd>

                        </dl>

                    </div>

                    <div class="col-md-4">

                        <h2 class="tribe-events-single-section-title">Venue</h2>

                        <dl>

                            <dd>{{ $event->address }}</dd>

                            <dd>

                                <!-- <address class="tribe-events-address"> 15 St Margarets Lane <br> New York

                                    <abbr>NY</abbr> 10033 United States <br>

                                        <a href="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=15+St+Margarets+Lane+New+York+NY+10033+United+States"

                                        title="Click to view a Google Map" target="_blank">+ Google Map</a>

                                </address> -->

                            </dd>

                            <dt> Phone:</dt>

                            <dd> {{ $event->phone_no }}</dd>

                        </dl>

                    </div>

                </div>

            </div> --}}

            <div class="tribe-events-event-meta clearfix">

                <div class="row">

                    <div class="col-md-12">

                        <div class="scribble-live">

                            {!! isset($event->map) ? $event->map : '' !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- <section class="reptro-section-padding-large elementor-top-section Popularevents xt_row_primary_bg_color_white_yes">

        <div class="elementor-background-overlay"></div>

        <div class="container">

            <h2 class="reptro-section-title text-center margin-bottom-xsmall" style="z-index: 999;position: relative;">

                <span>Popular Events</span>

            </h2>

            <p class="section-title-small text-center  section-title-small-border-yes" style="color: #fff">

                Lorem ipsum dolor sit amet, consectetuer adipiscing.

            </p>

            <div id="two" class="reptro-course-items reptro-course-slider owl-carousel owl-theme owl-loaded owl-drag">

                <div class="owl-carousel owl-theme owl-loaded">

                    <div class="owl-stage-outer">

                        <div class="owl-stage">

                            @foreach ($popularevent as $item)                            

                            @php                            

                            $timestemp = $item['fromdate'];

                            $year = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->year;

                            $month = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->month;

                            $day = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->day;

                            @endphp

                            <div class="owl-item">

                                <div class="course">

                                    <div class="reptro-course-loop-thumbnail-area">

                                        <div class="reptro-course-details-btn">

                                            <a class="btn btn-fill btn-lg" href="{{ url('eventdetail/'.$item['id']) }}">

                                                Details

                                            </a>

                                        </div>

                                        <div class="course-thumbnail">

                                            <img width="570" height="461" src="{{ asset('imagess/'. $item['image']) }}"/>

                                        </div>

                                    </div>

                                    <div class="reptro-course-item-inner">

                                        <a href="#" class="course-permalink">

                                            <h3 class="course-title">{{ $item->title }}</h3>

                                        </a>

                                        <div class="event-info">

                                            <div class="reptro-event-date">

                                                <span class="reptro-event-day">{{ $day }}</span>

                                                <span class="reptro-event-month">{{ $month }}</span>

                                                <span class="reptro-event-year"> {{ $year }}</span>

                                            </div>

                                            <div class="venueTime">

                                                <span class="reptro-event-time">

                                                    <i class="sli-clock"></i>Time:{{ $item->time }}

                                                </span>

                                                <span class="reptro-event-venue tttext" maxlength="100">

                                                    <i class="sli-location-pin"></i>{{ $item->address }}

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            @endforeach                            

                        </div>

                    </div>

                </div>

            </div>

        </div>       

    </section> --}}





    {{-- @include('user.include.sponser') --}}



    <section class="OSponsors">

        <div class="container">

            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Our Sponsors</span></h2>

            <p class="section-title-small text-center  section-title-small-border-yes">YOU MAKE A DIFFERENCE</p>

            <div class="row">

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="{{ asset('user/images/logo-5-1.png') }}"
                            class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="{{ asset('user/images/logo-3-1.png') }}"
                            class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="{{ asset('user/images/logo-2-1.png') }}"
                            class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="{{ asset('user/images/logo-1-1.png') }}"
                            class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="{{ asset('user/images/logo5.png') }}"
                            class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="{{ asset('user/images/logo-6.png') }}"
                            class="img-responsive" alt=""></a></div>

            </div>

        </div>

    </section>

    {{-- model --}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Booking an Event</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form id="eventBookForm">

                        <input type="hidden" name="payerID" id="payerID" />

                        <input type="hidden" name="orderID" id="orderID" />

                        <input type="hidden" name="payment_json" id="payment_json" />

                        <input type="hidden" name="package" value="{{ request()->route('id') }}" />

                        <input type="hidden" id="eventPrice" name="eventfee" value="{{ $event->cost }}" />

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Name" name="name" id="name">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="The year you left the school"
                                name="year" id="year">

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" placeholder="Email Address" name="address" id="address">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Mobile Number" name="phone_no" id="phone_no">

                        </div>

                        <div class="form-group">

                            <div id="paypal-button-container"></div>

                            <div id="paypalDonationbutton"></div>

                            <input class="btn btn-lg btn-fill" type="submit" value="Submit" id="formsubbtn"
                                style="display: none">

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>





    <div class="modal fade" id="paymentSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Congratulations!</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="col-md-12">

                        <span>Your payment was successfully completed!</span>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>



    <script>
        // This function displays Smart Payment Buttons on your web page.

        $(document).on("click", ".AddNew", function() {

            // $('#formsub').prop('disabled', true);

            $('#eventBookForm').trigger("reset");

            // $('#ModelTitle').html('Add Member');

            // $('#ModelButton').html('Save');

            $('#exampleModalCenter').modal('show');

            $("#eventBookForm")[0].reset();

        });

        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                var name = $('#name').val();
                var year = $('#year').val();
                var address = $('#address').val();
                var phone_no = $('#phone_no').val();

                if (name != '' && year != '' && address != '' && phone_no != '') {
                    var amount = $('#eventPrice').val();
                    // console.log('amount' + amount);

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: amount
                            }
                        }]
                    });
                } else {
                    alert('Please enter the details!');
                }
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    var payerid = orderData.payer.payer_id;
                    $('#orderID').val(transaction.id);
                    $('#payerID').val(payerid);
                    $('#payment_json').val(JSON.stringify(orderData, null, 2));

                    // alert('Transaction ' + transaction.status + ': ' + transaction.id +'\n\nThank you.');
                    // $("#formsubbtn").click();
                    $("form[id='eventBookForm']").submit();
                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }

        }).render('#paypalDonationbutton');



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

                    $('#paymentSuccessModal').modal('show');

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



    <script>
        $(document).ready(function() {

            $("div.scribble-live").find("iframe").attr("width", "100%");

            $("div.scribble-live").find("iframe").attr("height", "350px");

        });
    </script>

@endsection
