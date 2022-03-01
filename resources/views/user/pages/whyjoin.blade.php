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

<div class="xt-page-title-area">

    <div class="xt-page-title">

        <div class="container">

            <h1 class="entry-title">About</h1>

        </div>

    </div>

    <div class="xt-breadcrumb-wrapper">

        <div class="container">

            <nav class="xt-breadcrumb">

                <ul>

                    <li><a href="#">Home</a></li>

                    <li class="current">About</li>

                </ul>

            </nav>

        </div>

    </div>

</div>

<!-- inner banner end -->

<section class="aboutsec">

    <div class="container">

        <div class="row">

            <div class="col-lg-6">

                <h3 class="reptro-section-title margin-bottom-medium"><span>Why Join the Union</span></h3>

                <div class="text-section">

                    <p>The Belvedere Union enables past pupils of Belvedere College to maintain friendships made at school, to help our members who are in need and to provide opportunities for Old Belvederians to connect with each other .  We do this by organising social, business and sporting events and also by supporting charities and other social justice activities in parallel with Belvedere College.&nbsp;</p>

                    <p>The Union is run by a voluntary committee who organise a range of different activities throughout the year which include the Union Dinner, the Belvedere Business Network Lunch, the Annual Retrete and the Annual mass for deceased past pupils.&nbsp;</p>

                    <p>The Junior union is run by Old Belvederians who have left the Belvedere in the last 10 years.  They set their own agenda and run events with continue a strong social justice ethos, such as the Soup run and the Sleep Out, which support the homelessness.  They also run activities to support their mental health and mentor students in Belvedere.</p>

                    <p>The Union has a strong historic connection to Old Belvedere Rugby Club, The Belvedere Benevolent Association and the Belvedere Youth Club.  We are also connected with the past pupils unions from other Jesuit schools in Ireland through Jesuit Alumni Ireland.</p>

                </div>

               

            </div>

            <div class="col-lg-6">

                <div class="xt-video xt-video-popup-type-with_image">

                    <div class="xt-video-img">
                        <img src="{{ isset($content->about_image) ? secure_url('uploads/image/' . $content->about_image) : '' }}" alt="about-image">

                        {{-- <div class="xt-video-overlay"><a class="xt-video-popup-btn" data-fancybox="" href="https://youtu.be/AGBjI0x9VbM"><span class="video-popup-play-icon"></span></a></div> --}}

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

 <!-- ********footer********** -->

 <section class="OSponsors">

    

    <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Our Sponsors</span></h2>

    <p class="section-title-small text-center  section-title-small-border-yes"><a href="#">Become a Sponsor</a> | <a href="">Sponsor Benefits</a></p>

    

    <div class="container">

        <div class="row">

            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">

                <div class="MultiCarousel-inner">

                    @foreach ($oursponser as $item)

                    <div class="item">

                        <div class="pad15">

                            <img src="{{ secure_url('imagess/thumbnail/'.$item->image) }}" class="img-responsive">

                        </div>

                    </div>

    

                    @endforeach

   

                </div>

                <button class="btn  leftLst"><</button>

                <button class="btn  rightLst">></button>

            </div>

        </div>


    </div>


   </section>



@endsection

@push('js')

<script>

    function initSections() {

        var $activeSection = $('.course-item.current').closest('.section'),

            sections = $('.curriculum-sections').find('.section'),

            sectionId = $activeSection.data('section-id'),

            hiddenSections = [];

        if ($activeSection) { hiddenSections = sectionStorage.remove(sectionId); } else { hiddenSections = sectionStorage.get(); }

        for (var i = 0; i < hiddenSections.length; i++) { sections.filter('[data-section-id="' + hiddenSections[i] + '"]').find('.section-content').hide(); }

    }

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