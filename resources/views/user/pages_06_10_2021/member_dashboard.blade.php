@extends('layouts.user')
@push('css')
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
 
    <script src="https://www.paypal.com/sdk/js?client-id=AVZGP8lxfDPrBPU_7JIIl6HO2uw3zFSSm1Nr7Y_x55PIFcqGSWALbpRjv_XR-GbANoDc2bMYk8-wYLQp&disable-funding=credit,card&currency=EUR"></script>
    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="container">
                <h1 class="entry-title">DashBoard</h1>
            </div>
        </div>
        <div class="xt-breadcrumb-wrapper">
            <div class="container">
                <nav class="xt-breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li class="current">DashBoard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php
        function generateDate($date){
            $result = "";
            $convert_date   =   strtotime($date);
            $month          =   date('F',$convert_date);
            $year           =   date('Y',$convert_date);
            $name_day       =   date('l',$convert_date);
            $day            =   date('j',$convert_date);
            $result         =   $month . " " . $day . ", " . $year . " - " . $name_day;
            return $result;
        }
    ?>
    <div class="container">
        <div class="theme-main-content-inner row justify-content-center">
                @include('user.include.dheader')
            <div class="row profile_page_container">
                <div class="col-md-8 left_section_container">
                    <div class="row">
                        <div class="col-md-12 section_container">
                            <div class="row">
                                <div class="col-lg-5 profile_img_section">
                                    <h3><i class="fa fa-envelope-open-o" aria-hidden="true"></i>My Profile</h3>
                                        @if($user->profile_img)
                                            <img src="{{ route('getprofileimage', $user->profile_img ) }}"/>
                                        @else
                                            <img src="user/images/avatar_new.png">
                                        @endif
                                    <div class="link_action_btn">
                                        {{--<a href="javascript:void(0);" class="renew_btn">Edit Profile</a>--}}
                                        <a href="{{url('/profile')}}" class="renew_btn">Edit Profile</a>
                                    </div>
                                </div>
                                <div class="col-lg-7 profile_detail_section">
                                    <h3>&nbsp;</h3>
                                    <h5 class="name_title">Mr. {{$user->name}} {{$user->surname}}</h5>
                                    <p class="name">Member ID: {{$user->id}}</p>
                                    <p class="name">Member Since: {{ date('d-M-Y', strtotime($user->created_at)) }} </p>
                                    <!-- <p class="name">Year Left:</p> -->
                                    <p class="name">Company:</p>
                                    <p class="name">Title:</p>
                                    <p class="name mail">Email: <a href="mailto:{{$user->email}}">{{$user->email}}</a> </p>
                                    <p class="name">Phone:</p>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-12 section_container upcoming_events">
                            <h3><i class="fa fa-calendar-o" aria-hidden="true"></i>Upcoming Events</h3>
                            @foreach($events as $event)                                
                                <p><i class="fa fa-calendar-o" aria-hidden="true"></i><a href="{{url('/eventdetail')}}/{{$event->id}}"><span>{{generateDate($event->fromdate)}}: {{$event->title}}</span></a></p>
                            @endforeach
                            {{--<p><i class="fa fa-calendar-o" aria-hidden="true"></i><span>15th Nov, 2020: How to prepare for the Unknown</span></p>
                            <p><i class="fa fa-calendar-o" aria-hidden="true"></i><span>15th Nov, 2020: How to prepare for the Unknown</span></p>--}}
                        </div>
                    </div>
                </div>                
                <div class="col-md-4 right_section_container">
                    <div class="row">
                        <div class="col-md-12 section_container">
                            <h3><i class="fa fa-user-o" aria-hidden="true"></i>Membership Status</h3>
                                @if($user && $user->member=='1') 
                                    <button class="active_status_btn">Active</button>
                                    <div class="link_action_btn">
                                        <a href="javascript:void(0);" class="renew_btn left memberModel" style="margin-left: 100px;">Renew</a>
                                    </div>
                                @else
                                <button type="submit"  class="memberModel">Become a Member</button>                                
                                @endif
                            {{--<div class="row">
                                <div class="col-md-6">
                                    <p>Next Renewal Date</p>
                                <?php if($userPackage){ ?>
                                    <p><?php //generateDate($userPackage->end_date) //echo date('Y-m-d', strtotime($userPackage->end_date)); ?></p>
                                <?php } ?>                                
                                </div>
                                <div class="col-md-6">
                                    <p>Membership Period</p>
                                    <?php if($userPackage){ ?>
                                    <p><?php //generateDate($userPackage->start_date)." to ". generateDate($userPackage->end_date); ?>
                                    </p>
                                    <?php } ?> 
                                </div>
                            </div>--}}
                        </div>
                        @if($user && $user->sponser != '1') 
                        <div class="col-md-12 section_container">
                            <!-- <h3><i class="fa fa-handshake-o" aria-hidden="true"></i>My Sponsership</h3> -->
                            <h3><i class="fa fa-handshake-o" aria-hidden="true"></i>Become a Sponsor</h3>
                            <!-- <p class="center">Next Renewal Date</p>
                            <p class="center">Dec 27th, 2020</p> -->
                            <div class="link_action_btn_new">
                                <!--<a href="javascript:void(0);" class="renew_btn left">Activate</a>
                                <a href="javascript:void(0);" class="renew_btn right sponcerModel">View package</a>-->
                                <a href="javascript:void(0);" class="renew_btn right sponcerModel">Subscribe Now</a>
                            </div>
                        </div>
                        @else
                        <div class="col-md-12 section_container">
                            <h3><i class="fa fa-handshake-o" aria-hidden="true"></i>{{--My Sponsorship--}} Sponsorship Subscription</h3>                            
                            @if($user && $user->sponser == '1') 
                                <button class="active_status_btn">Active</button>
                            @else
                                <button type="submit" class="memberModel">Become a Member</button>
                            @endif
                            <p class="center">Next Renewal Date</p>
                            <!--<p class="center">Dec 27th, 2020</p>-->                            
                            <p class="center"><?php //generateDate($userSponserPackage->end_date) //date('Y-m-d', strtotime($userSponserPackage->end_date)); ?></p>
                            <div class="link_action_btn">
                                <a href="javascript:void(0);" class="renew_btn left sponcerModel" style="margin-left: 100px;">Renew</a>
                                <!-- <a href="javascript:void(0);" class="renew_btn right logo_edit">Edit Logo</a> -->
                            </div>
                        </div>
                        @endif
                        
                        @if($user && $user->advertiser != '1') 
                        <div class="col-md-12 section_container">
                            <h3><i class="fa fa-handshake-o" aria-hidden="true"></i>Advertise Your Job Vacancies</h3>
                            <!--<p class="center">Next Renewal Date</p>
                            <p class="center">Dec 27th, 2020</p>-->
                            <div class="link_action_btn_new">
                                <!--<a href="javascript:void(0);" class="renew_btn left">Activate</a>
                                <a href="javascript:void(0);" class="renew_btn right sponcerModel">View package</a>-->
                                <a href="javascript:void(0);" class="renew_btn right advertiseModel">Subscribe Now</a>
                            </div>
                        </div>
                        @else
                        <div class="col-md-12 section_container">
                            <h3><i class="fa fa-handshake-o" aria-hidden="true"></i>{{--My Advertise--}} Job Advertiser Subscription</h3>
                            @if($user && $user->advertiser == '1')
                                <button class="active_status_btn">Active</button>
                            @else
                                <button type="submit" class="memberModel">Become a Member</button>
                            @endif
                            <p class="center">Next Renewal Date</p>
                            <!--<p class="center">Dec 27th, 2020</p>-->
                            <p class="center"><?php //generateDate($userAdvertiserPackage->end_date); ?></p>
                            <div class="link_action_btn">
                                <a href="javascript:void(0);" class="renew_btn left advertiseModel" style="margin-left: 100px;">Renew</a>
                                <!-- <a href="javascript:void(0);" class="renew_btn right logo_edit">Edit Logo</a> -->
                            </div>
                        </div>
                        @endif
                        <!--<div class="col-md-12 section_container">
                             <h3><i class="fa fa-envelope-open-o" aria-hidden="true"></i>My Advertisement</h3> 
                            <h3><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Advertise with us</h3>
                             <p class="center">Next Renewal Date</p>
                            <p class="center">Dec 27th, 2020</p> 
                            <div class="link_action_btn_new">
                                <a href="javascript:void(0);" class="renew_btn left">Activate</a>
                                <a href="javascript:void(0);" class="renew_btn right advertiseModel">View package</a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>           
        </div>
    </div>
      
    {{-- model MemberShip --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Become a Member
                        @if(count($package->where('type','member')) > 1)
                        <span class="cyp">Choose Your Pack</span>
                        @endif
                    </h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMemberShip">
                        <input type="hidden" name="payerID" id="payerIDmem">
                        <input type="hidden" name="orderID" id="orderIDmem">
                        <div class="row">                                
                            @foreach ($package->where('type','member') as $item)
                                <div class="col-sm-6 memred">
                                    <input type="radio" data-id="{{ $item->price }}" id="{{ $item->type }}" name="{{ $item->type }}" value="{{ $item->id }}">
                                    {{--&nbsp;&nbsp;€{{ $item->price }}&nbsp;&nbsp; - &nbsp;&nbsp; ({{ $item->month }}&nbsp;&nbsp;Months)--}}
                                    <div class="lns-donate advert">
                                        <span class="lns-span"> €{{ $item->price }} </span>
                                        <span class="lns-month"> {{ $item->month }} Months </span>
                                    </div>
                                </div>
                            @endforeach                        
                        </div>                            
                        <div class="form-group">
                            <div id="paypalMemberbutton"></div>                         
                            <input class="btn btn-lg btn-fill" type="submit" value="Submit"  id="memformbtn" style="display: none">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   {{-- model Sponser --}}
    <div class="modal fade" id="sponcermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Become a Sponsor 
                        @if(count($package->where('type','sponsor')) > 1)
                        <span class="cyp">Choose Your Pack</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sponserform">
                        <input type="hidden" name="payerID" id="payerIDsp">
                        <input type="hidden" name="orderID" id="orderIDsp">
                        <div class="row">
                            @foreach($package->where('type','sponsor') as $item)
                            <div class="col-sm-6 memred">
                                <input type="radio" id="{{ $item->type }}" data-id="{{ $item->price }}" name="{{ $item->type }}" value="{{ $item->id }}">
                                {{--&nbsp;&nbsp;${{ $item->price }}&nbsp;&nbsp; - &nbsp;&nbsp; ({{ $item->month }}&nbsp;&nbsp;Months)--}}
                                <div class="lns-donate advert">
                                    <span class="lns-span"> €{{ $item->price }} </span>
                                    <span class="lns-month"> {{ $item->month }} Months </span>
                                </div>
                            </div>
                            @endforeach                     
                        </div>                         
                        <div class="form-group">
                            <div id="paypal-button-container"></div>
                            <div id="paypalSponcerbutton"></div>
                            <input class="btn btn-lg btn-fill" type="submit" value="Submit" style="display: none"  id="sponsersubbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- model Advertise --}}
    <div class="modal fade" id="advertiseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Job Advertiser
                        @if(count($package->where('type','advertiser')) > 1)
                        <span class="cyp"> Choose Your Pack</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="advertiserForm">
                        <input type="hidden" name="payerID" id="payerIDmem">
                        <input type="hidden" name="orderID" id="orderIDmem">
                        <div class="row">
                            @foreach ($package->where('type','advertiser') as $item)
                            <div class="col-sm-6 memred">
                                <input type="radio" id="{{ $item->type }}" data-id="{{ $item->price }}" name="{{ $item->type }}" value="{{ $item->id }}">
                                <div class="lns-donate advert">
                                    <span class="lns-span"> €{{ $item->price }} </span>
                                    <span class="lns-month"> {{ $item->month }} Months </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div id="paypalMemberbutton"></div>
                            <div id="advertiserpay"></div>
                            <input class="btn btn-lg btn-fill" type="submit" value="Submit"  style="display: none" id="advertiserformbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- model Advertise  --}}
    {{-- <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Become Advertise </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="advertiserForm">
                        <input type="hidden" name="payerID" id="payerIDad">
                        <input type="hidden" name="orderID" id="orderIDad">
                        <div class="row">
                            @foreach ($package->where('type','advertiser') as $item)
                            <div class="col-sm-6">
                                <input type="radio" id="{{ $item->type }}" data-id="{{ $item->price }}" name="{{ $item->type }}" value="{{ $item->id }}">
                                &nbsp;&nbsp;€ {{ $item->price }} {{ $item->month }}&nbsp;&nbsp;Months
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div id="advertiserpay"></div>
                            <input class="btn btn-lg btn-fill" type="submit" value="Submit"  style="display: none"  id="advertiserformbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    
    {{-- Edit Logo Model  --}}
    <div class="modal fade" id="logoEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Your Logo </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form id="logoEditForm"> -->
                    <form action="{{ route('managesponsor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- <input class="form-control" type="hidden" name="editlogo" id="editlogo" value="editlogo"> -->
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title">
                        </div> 
                        <div class="form-group">
                            <input  class="form-control" type="text" name="link" id="link"  placeholder="Enter Link">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="image" id="image">
                            <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                        </div>  

                        <div class="form-group">
                            <div id="advertiserpay"></div>
                            <input class="center btn btn-lg btn-fill " type="submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script>
    ///Pay Pal for MEMBER
    paypal.Buttons({
        style: {
            layout:  'vertical',
            color:   'silver',
            shape:   'pill',
            label:   'paypal'
        },
        createOrder: function(data, actions){
            let amount = $('input[name=member]:checked').attr('data-id');
            return actions.order.create({
                application_context: {
                    brand_name: 'Belender Membership CheckOut',
                    user_action: 'PAY_NOW',
                },
                purchase_units: [{
                    amount: {
                        value: amount,
                        currency: "INR"
                    }
                }],
            });
        },
        onApprove: function(data){
            // $('#formsub').prop('disabled', false);
            let payerID = data.payerID;
            let orderID = data.orderID;
            $('#payerIDmem').val(payerID);
            $('#orderIDmem').val(orderID);
            $('#exampleModalCenter').modal('hide'); 
            $( "#memformbtn" ).click();

        }
    }).render('#paypalMemberbutton');
    ///// paypal for SPONSER
    paypal.Buttons({
        style: {
            layout:  'vertical',
            color:   'silver',
            shape:   'pill',
            label:   'paypal'
        },
        createOrder: function(data, actions){
            let amount = $('input[name=sponsor]:checked').attr('data-id');
            return actions.order.create({
                application_context: {
                    brand_name: 'Belender Sponser CheckOut',
                    user_action: 'PAY_NOW',
                },
                purchase_units: [{
                    amount: {
                        value: amount,
                        currency: "INR"
                    }
                }],
            });
        },
        onApprove: function(data){
            // $('#formsub').prop('disabled', false);
            let payerID = data.payerID;
            let orderID = data.orderID;
            $('#payerIDsp').val(payerID);
            $('#orderIDsp').val(orderID);
            $('#sponcermodel').modal('hide'); 
            $( "#sponsersubbtn" ).click();

        }
    }).render('#paypalSponcerbutton');

    // PayPall for Advertiser
    paypal.Buttons({
        style: {
            layout:  'vertical',
            color:   'silver',
            shape:   'pill',
            label:   'paypal'
        },
        createOrder: function(data, actions) {
            let amount = $('input[name=advertiser]:checked').attr('data-id');
            return actions.order.create({
                application_context: {
                    brand_name: 'Belender Advertiser CheckOut',
                    user_action: 'PAY_NOW',
                },
                purchase_units: [{
                    amount: {
                        value: amount,
                        currency: "INR"
                    }
                }],
            });
        },
        onApprove: function(data) {
            // $('#formsub').prop('disabled', false);
            let payerID = data.payerID;
            let orderID = data.orderID;
            $('#payerIDad').val(payerID);
            $('#orderIDad').val(orderID);
            $('#advertiseModel').modal('hide'); 
            $( "#advertiserformbtn" ).click();
        }
    }).render('#advertiserpay');


    $(document).on("click", ".memberModel", function() {    
        // $('#formsub').prop('disabled', true);
        $('#eventBookForm').trigger("reset");
        // $('#ModelTitle').html('Add Member');
        // $('#ModelButton').html('Save');
        $('#exampleModalCenter').modal('show');
        $("#eventBookForm")[0].reset();
    });

    $(document).on("click", ".logo_edit", function(){
        // $('#formsub').prop('disabled', true);
        // $('#eventBookForm').trigger("reset");
        // $('#ModelTitle').html('Add Member');
        // $('#ModelButton').html('Save');
        $('#logoEditModel').modal('show');
        // $("#eventBookForm")[0].reset();
    });
    </script>
    <script>
        $(document).on("click", ".sponcerModel", function(){
            //$('#formsub').prop('disabled', true);
            $('#eventBookForm').trigger("reset");
            // $('#ModelTitle').html('Add Member');
            // $('#ModelButton').html('Save');
            $('#sponcermodel').modal('show');
            $("#eventBookForm")[0].reset();
        });
    </script>
    <script>
        $(document).on("click", ".advertiseModel", function(){
            // $('#formsub').prop('disabled', true);
            // $('#eventBookForm').trigger("reset");
            // $('#ModelTitle').html('Add Member');
            // $('#ModelButton').html('Save');
            $('#advertiseModel').modal('show');
            // $("#eventBookForm")[0].reset();
        });
    </script>
    <script>
        $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ajax call for membership
            $('#formMemberShip').on('submit', function(event){
                event.preventDefault();
                url = "{{ url('paybecomemember') }}"
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        //alert('Your Plan Has Subscribed Successully');
                        alert('Your plan has subscribed for Member');
                        location.reload();
                    },
                })
            });
            // AJax Call for Sponser 
            $('#sponserform').on('submit', function(event) {
                event.preventDefault();
                url = "{{ url('paybecomesponser') }}"
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
//                        alert('Your Plan Has Subscribed Successully');
                        alert('Your plan has subscribed for Sponser');
                        location.reload();
                    },
                })
            });
            // AJax Call for Advertiser 
            $('#advertiserForm').on('submit', function(event) {
                event.preventDefault();
                url = "{{ url('payBecomeAdvertiser') }}"
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
//                        alert('Your Plan Has Subscribed Successully');
                        alert('Your plan has subscribed for Advertiser');
                        // location.reload();
                    },
                })
            });
        //sponcer data store 
        $('#logoEditForm').on('submit', function(event){
            event.preventDefault();
            url = "{{ url('managesponsors') }}"
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#logoEditModel').modal('hide');
                    $("#logoEditForm")[0].reset();
                },
            })
        });
    </script>
@endpush
