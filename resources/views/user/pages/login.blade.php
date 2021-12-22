@extends('layouts.user')

@push('css')


<script
src="https://www.paypal.com/sdk/js?client-id=AdSuJbD9cyJpGbooPSf3Z963eDNCJ1TXJVmHEB6oOXJKqpbI9S0TYyB1vHT4wuZdNtPUmP6u9LwXNUOA&disable-funding=credit,card&currency=EUR">
</script>

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

                style="background-image: secure_url(user/images/Belvedere-College.jpg)"></div>

            <div class="reptro-hero-area-left reptro-hero-area-left-custom-bg-no reptro-hero-area-column">

                <h2>Become a Member</h2>

                <p>Not a member yet? <a href="{{secure_url('/')}}" style="color:white;"> Register here.</a></p>


                <div class="wpcf7 left">

                <form class="wpcf7-form init demo" method="post" action="{{ route('login-check') }}">

                    @csrf

                    <div class="xt_sign_up_now_field">

                        <input type="Email" name="email" value="" placeholder="Email Address">

                    </div>

                    <div class="xt_sign_up_now_field">

                        <input type="Password" name="password" value="" placeholder="Password">

                    </div>

                    <div class="xt_sign_up_now_field xt_sign_up_now_submit"><input type="submit" value="Submit"></div>





                   

                </form>

                <br>

                    <div class="center">

                        <span><a href="password/reset" >Forgot Password ?</a></span>

                    </div>

            </div>



               

                <!-- <a class="reptro-hero-area-play-btn" data-fancybox href="https://youtu.be/AGBjI0x9VbM"><i aria-hidden="true" class="fa fa-play"></i></a> -->

            </div>



        </div>

    </section>



     





     @include('user.include.sponser')

    



@endsection

@push('js')

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

    createOrder: function(data, actions) {

        

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

             $('#form1').on('submit', function(event) {

                event.preventDefault();

                url = "{{ url('post-register') }}"

                $.ajax({

                    url: url,

                    type: "POST",

                    data: new FormData(this),

                    contentType: false,

                    processData: false,

                    success: function(data) {

                        alert('Your Plan Has Subscribed Successully');

                        

                    },

                    })

            });



 

    </script>





{{-- slider js --}}

<script>

    $(document).ready(function () {

        var itemsMainDiv = ('.MultiCarousel');

        var itemsDiv = ('.MultiCarousel-inner');

        var itemWidth = "";

    

        $('.leftLst, .rightLst').click(function () {

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

        function ResCarouselSize() {

            var incno = 0;

            var dataItems = ("data-items");

            var itemClass = ('.item');

            var id = 0;

            var btnParentSb = '';

            var itemsSplit = '';

            var sampwidth = $(itemsMainDiv).width();

            var bodyWidth = $('body').width();

            $(itemsDiv).each(function () {

                id = id + 1;

                var itemNumbers = $(this).find(itemClass).length;

                btnParentSb = $(this).parent().attr(dataItems);

                itemsSplit = btnParentSb.split(',');

                $(this).parent().attr("id", "MultiCarousel" + id);

    

    

                if (bodyWidth >= 1200) {

                    incno = itemsSplit[3];

                    itemWidth = sampwidth / incno;

                }

                else if (bodyWidth >= 992) {

                    incno = itemsSplit[2];

                    itemWidth = sampwidth / incno;

                }

                else if (bodyWidth >= 768) {

                    incno = itemsSplit[1];

                    itemWidth = sampwidth / incno;

                }

                else {

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

        function ResCarousel(e, el, s) {

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

        function click(ell, ee) {

            var Parent = "#" + $(ee).parent().attr("id");

            var slide = $(Parent).attr("data-slide");

            ResCarousel(ell, Parent, slide);

        }

    

    });

    </script>

@endpush

