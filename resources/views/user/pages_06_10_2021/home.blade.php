@extends('layouts.user')

@push('css')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script src="https://www.paypal.com/sdk/js?client-id=AVZGP8lxfDPrBPU_7JIIl6HO2uw3zFSSm1Nr7Y_x55PIFcqGSWALbpRjv_XR-GbANoDc2bMYk8-wYLQp&disable-funding=credit,card"></script>

<style>

    .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }

    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }

        .MultiCarousel .MultiCarousel-inner .item { float: left;}

        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#fefefe; color:rgb(0, 0, 0);}

    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }

    .MultiCarousel .leftLst { left:0; }

    .MultiCarousel .rightLst { right:0; }

    

        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ee192b; }

</style>

@endpush

@section('content')

    <section>

        <div class="reptro-hero-area">

            <div class="reptro-hero-area-right reptro-hero-area-column"

                 style="background-image: url(user/images/hero-min.jpg)"></div>

            <div class="reptro-hero-area-left reptro-hero-area-left-custom-bg-no reptro-hero-area-column">

                <h2>Become a Member</h2>

                <p>Already have an account?<a href="{{ secure_url('login') }}" style="color: white"> Click here to Login.</a></p>



                <div class="wpcf7">

                    <form id="form1" class="wpcf7-form init demo">

                        @csrf

                        <div id="attr">

                            <input type="hidden" name="payerID" id="payerIDmem">

                            <input type="hidden" name="orderID" id="orderIDmem">

                            <div class="xt_sign_up_now_field">

                                <input type="text" name="name" placeholder="First Name">

                            </div>

                            <div class="xt_sign_up_now_field">

                                <input type="text" name="sname" placeholder="Surname">

                            </div>

                            <div class="xt_sign_up_now_field">

                                <input type="Email" name="email" placeholder="Email Address">

                            </div>

                            <div class="xt_sign_up_now_field">

                                <input type="Password" name="password" placeholder="Password">

                            </div>

                            <div class="xt_sign_up_now_field">

                                <input type="Password" name="cpassword" placeholder="Confirm Password">

                            </div>                    

                            <div class="xt_sign_up_now_field xt_sign_up_now_submit" id="testest">

                                <input type="button" value="Next" disabled id="nexpay">

                            </div>

                        </div>



                        <div class="hidden" style="display: none;top: 34%;" id="hidenpay">

                            <br>

                            <h5 style="text-align: center;color:#7b848c;">MemberShip Subscription </h5>

                            <br>

                            <h4 style="text-align: center;color:#7b848c;">$ <span id="amountsow">0.0</span> </h4>

                            <br/>

                            <div class="form-group center" style="width: 200px;color:#7b848c;">

                                <!-- <select class="form-control rounded" id="droppackage" name="member" >  -->

                                <select class="form-control rounded" id="droppackage" name="package">

                                    <option value="0.0">Select Packages</option>

                                    @foreach ($pkg as $item)

                                    <option value="{{ $item->price }}">{{ $item->name }}</option>

                                    @endforeach

                                </select>

                            </div>

                            <br>

                            <div id="paypalMemberbutton"></div>

                        </div>

                        <input type="submit" style="display: none" id="subbtn">

                    </form>

                </div>

            </div>

        </div> 

    </section>

    <section class="aboutsec">

        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <h3 class="reptro-section-title margin-bottom-medium"><span>{{isset($cmsData->title)?$cmsData->title:''}}</span></h3>

                    <div class="text-section">

                        {!!isset($cmsData->description)?$cmsData->description:''!!}

                    </div>

                    <div class=" repto-button-border  elementor-widget-button"> <a href="{{ secure_url('about') }}" class=" elementor-button"> <span class="elementor-button-text">Read More</span> </a></div>

                </div>

                <div class="col-lg-6">

                    <div class="xt-video xt-video-popup-type-with_image">

                        <div class="xt-video-img"><img src="{!!isset($content->video_link)?$content->video_link:'user/images/about-6-min.jpg'!!}" alt="">

                            <!-- <div class="xt-video-overlay"><a class="xt-video-popup-btn" data-fancybox="" href="https://youtu.be/AGBjI0x9VbM"><span class="video-popup-play-icon"></span></a></div> -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="UEvents">

        <div class="container">

            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Upcoming Events and Reunions</span></h2>

            {{-- <p class="section-title-small text-center  section-title-small-border-yes">Due to the current Covid 19 pandemic, there are currently no confirmed events.</p> --}}

            <ul class="reptro-course-items row">

                @foreach($eventData as $key=>$val)

                    <li class="col-lg-4 col-md-6 course">

                        <div class="reptro-course-loop-thumbnail-area">

                            <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="{{ url('eventdetail/'.$val['id']) }}">Details</a></div>

                            <div class="course-thumbnail"> <img width="570" height="461" src="imagess/{{ $val['image'] }}"></div>

                            <div class="reptro-course-loop-price-and-rating">

                                <div class="course-price"> <span class="price">€{{$val->cost}}</span></div>

                                <div class="xt-course-review">

                                    <div class="xt-review-stars-wrapper">

                                        <ul class="xt-review-stars">

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                        </ul>

                                        <ul class="xt-review-stars xt-fill" style="width: {{$key<5?$key*20:5*20}}%">

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                            <li><span class="fa fa-star"></span></li>

                                        </ul>

                                    </div> <span>(1 review)</span>

                                </div>

                            </div>

                        </div>

                        <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">

                                <h3 class="course-title">{{$val->title}}</h3>

                            </a>

                            <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>41</span> students enrolled"> 41 students </span></div> -->

                        </div>

                    </li>

                @endforeach

            </ul>

            <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="{{ secure_url('event') }}">All Events</a></div>

        </div>

    </section>





    <div class="container">

        <h2 class="reptro-section-title text-center margin-bottom-xsmall section-title-type-border"><span>Our Clubs and Societies</span></h2>

    </div>

    <section class="SsuccessSec xt_row_primary_bg_color_white">

        <div class="container">

            <div class="row">

                @foreach($ourClubData as $val)

                <div class="col-md-4">

                    <div class="Ssuccess-counter">

                        <div class="counter-number-wrapper">

                            <span class="count">{{$val->title}}</span>

                        </div>

                        @if($val->donatelink)

                            <a class="btn btn-md btn-border" target="_blank" href="{{$val->donatelink}}">Read More</a>

                        @else

                            <a class="btn btn-md btn-border" href="#">Read More</a>

                        @endif

                        {{--<a class="btn btn-md btn-border" target="_blank" href="{{$val->link}}">Read More</a>

                        <a class="reptro-call-to-action-btn btn-md" href="{{$val->donatelink}}" target="_blank">Donate</a>--}}

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </section>

    <section class="LNews">

        <div class="container">

            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Latest News</span></h2>

            <!-- <p class="section-title-small text-center  section-title-small-border-yes">COMING SOON</p> -->

            <div class="row">

                @foreach($blogData as $key => $val)

                    @if($val->status != 0)

                        <article class="col-lg-4 col-md-6 tag-study">

                            <div class="xt-post-item">

                                <div class="xt-post-item-thumb">

                                    <figure>

                                        <a href="{{ url('news/'.$val['id']) }}">

                                            <img src="{{$val->image}}" alt="{{$val->title}}">

                                        </a>

                                    </figure>

                                    <div class="xt-post-item-categories">

                                        <a href="{{ url('news/'.$val['id']) }}">News</a>

                                    </div>

                                </div>

                                <div class="xt-post-item-content">

                                    <div class="xt-post-item-date">{{date("F j, Y",strtotime($val->updated_at))}}</div>

                                    <h4 class="xt-post-item-title">

                                        <a href="{{ url('news/'.$val['id']) }}">{!!$val->title!!}</a>

                                    </h4>

                                </div>

                            </div>

                        </article>

                    @endif

                @endforeach

            </div>

        </div>

        <br/>

        <div class="text-center reptro-all-courses-btn">

            <a class="btn btn-lg btn-fill" href="{{ secure_url('news') }}">All News</a>

        </div>

    </section>



    @include('user.include.sponser')



    <section class="BMember">

        <div class="section-background-overlay"></div>

        <div class="container">

            <div class="row">

                <div class="reptro-ctl-area reptro-ctl-default">

                    <div class="reptro-ctl-content-wrapper">

                        <div class="reptro-ctl-icon"> <i class="fa fa-envelope-open-o" aria-hidden="true"></i></div>

                        <div class="reptro-ctl-content">

                            <h2 class="BMember-title">Employment Opportunities</h2>

                            <p class="BMember-text"><span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </span></p>

                        </div>

                        <div class="reptro-ctl-button"> <a class="btn btn-lg btn-border" href="{{ secure_url('careers') }}">View All</a></div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

@push('js')

<script>

    $(document).ready(function(){

        /*swal({

            title: "Under Maintenance",

            text: "We are currently updating our website. We apologise for any inconvenience caused.",

            icon: "info",

            buttons: true,

            dangerMode: true,

        })

        .then((willDelete) => {

            if (willDelete){

                //    swal("Poof! Your imaginary file has been deleted!",{

                //        icon: "success",

                //    });

            }

            else{

                //    swal("Your imaginary file is safe!");

            }

        });*/



        var itemsMainDiv = ('.MultiCarousel');

        var itemsDiv = ('.MultiCarousel-inner');

        var itemWidth = "";



        $('.leftLst, .rightLst').click(function(){

            var condition = $(this).hasClass("leftLst");

            if (condition)

                click(0, this);

            else

                click(1, this)

        });



        ResCarouselSize();

    

        $(window).resize(function () {

            ResCarouselSize();

        });



        //this function define the size of the items

        function ResCarouselSize(){

            var incno = 0;

            var dataItems = ("data-items");

            var itemClass = ('.item');

            var id = 0;

            var btnParentSb = '';

            var itemsSplit = '';

            var sampwidth = $(itemsMainDiv).width();

            var bodyWidth = $('body').width();

            $(itemsDiv).each(function(){

                id = id + 1;

                var itemNumbers = $(this).find(itemClass).length;

                btnParentSb = $(this).parent().attr(dataItems);

                itemsSplit = btnParentSb.split(',');

                $(this).parent().attr("id", "MultiCarousel" + id);



                if(bodyWidth >= 1200){

                    incno = itemsSplit[3];

                    itemWidth = sampwidth / incno;

                }

                else if(bodyWidth >= 992){

                    incno = itemsSplit[2];

                    itemWidth = sampwidth / incno;

                }

                else if(bodyWidth >= 768){

                    incno = itemsSplit[1];

                    itemWidth = sampwidth / incno;

                }

                else{

                    incno = itemsSplit[0];

                    itemWidth = sampwidth / incno;

                }

                $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });

                $(this).find(itemClass).each(function () {

                    $(this).outerWidth(itemWidth);

                });

                $(".leftLst").addClass("over");

                $(".rightLst").removeClass("over");

            });

        }



        //this function used to move the items

        function ResCarousel(e, el, s){

            var leftBtn = ('.leftLst');

            var rightBtn = ('.rightLst');

            var translateXval = '';

            var divStyle = $(el + ' ' + itemsDiv).css('transform');

            var values = divStyle.match(/-?[\d\.]+/g);

            var xds = Math.abs(values[4]);

            if (e == 0) {

                translateXval = parseInt(xds) - parseInt(itemWidth * s);

                $(el + ' ' + rightBtn).removeClass("over");



                if (translateXval <= itemWidth / 2) {

                    translateXval = 0;

                    $(el + ' ' + leftBtn).addClass("over");

                }

            }

            else if (e == 1) {

                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();

                translateXval = parseInt(xds) + parseInt(itemWidth * s);

                $(el + ' ' + leftBtn).removeClass("over");



                if (translateXval >= itemsCondition - itemWidth / 2) {

                    translateXval = itemsCondition;

                    $(el + ' ' + rightBtn).addClass("over");

                }

            }

            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');

        }



        //It is used to get some elements from btn

        function click(ell, ee){

            var Parent = "#" + $(ee).parent().attr("id");

            var slide = $(Parent).attr("data-slide");

            ResCarousel(ell, Parent, slide);

        }

    });

</script>



<script>

    $(document).ready(function() {  

        var $input = $('input:text'),

            $register = $('#nexpay');    

            $register.attr('disabled', true);



            $input.keyup(function() {

                var trigger = false;

                $input.each(function() {

                    if (!$(this).val()) {

                        trigger = true;

                    }

                });

                trigger ? $register.attr('disabled', true) : $register.removeAttr('disabled');

            });

        //package Dropdown Change value Change and set

        $("#droppackage").change(function() {

            let amount = $("#droppackage").val();

          

            $('#amountsow').html('');

            $('#amountsow').html(amount);

        });

        $( "#testest" ).click(function() {

                $("#attr").toggle('slide');

                $("#hidenpay").toggle('slide');

         });

    });

    // PayPall  

    paypal.Buttons({

        style: {

            layout:  'vertical',

            color:   'silver',

            shape:   'pill',

            label:   'paypal'

        },

        createOrder: function(data, actions){



            let amount = $("#droppackage").val();

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

        onApprove: function(data) {

            // $('#formsub').prop('disabled', false);

            let payerID = data.payerID;

            let orderID = data.orderID;

            $('#payerIDmem').val(payerID);

            $('#orderIDmem').val(orderID);

            $('#exampleModalCenter').modal('hide'); 

            $( "#subbtn" ).click();



        }

    }).render('#paypalMemberbutton');



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    // ajax call for member ship

    $('#form1').on('submit', function(event){

        event.preventDefault();

        usel2 = "{{ url('login') }}";

        url = "{{ url('post-register') }}"

        $.ajax({

            url: url,

            type: "POST",

            data: new FormData(this),

            contentType: false,

            processData: false,

            success: function(data) {

                //alert('Your Plan Has Subscribed Successully,Now you can login');

                top.location.href = usel2;

            },

        })

    });

</script>

@endpush