<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="user/images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link media="all" href="user/font/fontcss.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet" />
    <link media="all" href="user/css/custome.css" rel="stylesheet" />
    <link href="user/css/main.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="user/js/custome.js"></script>
    <!-- <script src="js/custom01.js"></script> -->
    <title>Belvedere Union</title>
</head>

<body class="carriers_page">
    @include('user.include.header')

    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="container">
                <h1 class="entry-title">Careers</h1>
            </div>
        </div>
        <div class="xt-breadcrumb-wrapper">
            <div class="container">
                <nav class="xt-breadcrumb">
                    <ul>
                        <li><a href="/" itemprop="url">Home</a></li>
                        <li class="current">Careers</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner banner end -->
    <div class="container">
        <section class="reptro-section-padding-large elementor-top-section">
            <!-- <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Carriers</span></h2>
            <p class="section-title-small text-center  section-title-small-border-yes">Lorem ipsum dolor sit amet, consectetuer.</p> -->

            <div class="s010">
                <form action="{{url('search')}}" method="get">
                    <div class="inner-form">
                        <!-- <div class="basic-search">
                            <div class="input-field">
                            <input id="search" type="text" placeholder="Type Keywords" />
                            <div class="icon-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                </svg>
                            </div>
                            </div>
                        </div> -->
                        <div class="advance-search">
                            <!-- <span class="desc">ADVANCED SEARCH</span> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field_new">
                                        <!-- <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Enter Key words</option>
                                            <option>Company name b</option>
                                            <option>Company name c</option>
                                        </select>
                                        </div> -->
                                        <input id="search_new" class="search_new" name="query" type="text" placeholder="Enter Keywords" value="{{ app('request')->input('query') }}" />
                                        <div id="suggestionList"></div>
                                    </div>
                                </div>
                                <!-- <div class="input-field">
                                    <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Company name</option>
                                            <option>Company name b</option>
                                            <option>Company name c</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Select position</option>
                                            <option>Position b</option>
                                            <option>Position c</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Sort Result</option>
                                            <option>Ascending Order</option>
                                            <option>Descending Order</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="row second">
                                    <div class="input-field">
                                        <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Sale</option>
                                            <option>Subject b</option>
                                            <option>Subject c</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="input-field">
                                        <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Time</option>
                                            <option>Last time</option>
                                            <option>Today</option>
                                            <option>This week</option>
                                            <option>This month</option>
                                            <option>This year</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="input-field">
                                        <div class="input-select">
                                        <select data-trigger="" name="choices-single-defaul">
                                            <option placeholder="" value="">Type</option>
                                            <option>Subject b</option>
                                            <option>Subject c</option>
                                        </select>
                                        </div>
                                    </div>
                                    </div> -->
                            <div class="row third">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <!-- <div class="result-count">
                                            <span>108 </span>results
                                        </div> -->
                                        <div class="group-btn search-dv">
                                            <a class="anc-reset" href="{{route('careers')}}">Reset</a>
                                            <!-- <input class="btn-delete" type="reset" value="Reset"/> -->
                                            <!-- <button class="btn-delete" id="delete">RESET</button> -->
                                            <button class="btn-search">SEARCH</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="row reptro-course-items event">
                @foreach($advertisers as $advertiser)
                    <li class="course  col-lg-12 col-md-12">
                        <div class="reptro-course-loop-thumbnail-area">
                            <!-- <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="events-details.html">Apply</a></div> -->
                            <div class="course-thumbnail"> 
                            <img width="570" height="461" src="{{ route('getadvertimage', $advertiser->company_logo) }}" alt="{{$advertiser->company_name}}" />
                        </div>
                        </div>
                        <div class="reptro-course-item-inner">
                            <a href="#" class="course-permalink">
                                <h3 class="course-title">
                                    {{$advertiser->company_name}}
                                    <span class="just_lable">
                                        Job ID: BLV000-{{$advertiser->id}} {{--| Location: {{$advertiser->county}}--}} | Category: {{$advertiser->category}}
                                    </span>
                                    @if($advertiser->job_type == 1)
                                        <span class="full_time_lable">Full time</span>
                                    @elseif($advertiser->job_type == 2)
                                        <span class="full_time_lable">Part time</span>
                                    @else
                                        <span class="full_time_lable">Contractual</span>
                                    @endif
                                </h3>
                            </a>
                            <div class="event-info">
                                <div class="reptro-event-date"><span class="reptro-event-month">Posted on</span>
                                    @php
                                        $get_date = date("Y-M-d",strtotime($advertiser->posted_on));
                                        $post_date = explode('-', $get_date);
                                    @endphp
                                    <span class="reptro-event-day">{{$post_date[2]}}</span>
                                    <span class="reptro-event-month">{{$post_date[1]}}</span>
                                    <span class="reptro-event-year">{{$post_date[0]}}</span>
                                </div>
                                <div class="venueTime">
                                    <span class="reptro-event-time">
                                        <h6>Job Description</h6>
                                        <p>{{$advertiser->job_description}}</p>
                                        <!-- <i class="sli-clock"></i>Thursday, 3:00 pm to 6:00 pm -->
                                    </span>
                                    <span class="reptro-event-venue" title="Location">
                                        <i class="sli-location-pin"></i>
                                            {{$advertiser->county}}
                                    </span>
                                    @if($advertiser->deadline_date)
                                    <span class="reptro-event-deadline comn-career" title="Application Deadline Date">
                                        @php
                                            $app_date   =   date("Y-M-d",strtotime($advertiser->deadline_date));
                                            $app_date   =   explode('-', $app_date);
                                        @endphp
                                        <i class="sli-calendar"></i>
                                        {{$app_date[2]}} - {{$app_date[1]}} - {{$app_date[0]}}
                                    </span>
                                    @endif
                                    @if($advertiser->salary_offer)
                                    <span class="reptro-event-salary comn-career" title="Salary On Offer">
                                        <i class="sli-credit-card"></i>
                                        €{{$advertiser->salary_offer}}
                                    </span>
                                    @endif
                                    @if($advertiser->adv_email)
                                    <span class="reptro-event-ademail comn-career" title="Email Us">
                                        <i class="sli-envelope"></i>
                                        {{$advertiser->adv_email}}
                                    </span>
                                    @endif
                                    @if($advertiser->adv_phone)
                                    <span class="reptro-event-adphone comn-career" title="Contact Us">
                                        <i class="sli-phone"></i>
                                        {{$advertiser->adv_phone}}
                                    </span>
                                    @endif
                                    <!-- <a class="btn btn-fill btn-lg" href="events-details.html">Apply</a> -->
                                    <a class="btn btn-fill btn-lg" data-toggle="modal" data-target="#myModal{{$advertiser->id}}">Apply</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <div id="myModal{{$advertiser->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">                
                                <div class="modal-body">
                                    <form id="applyforjob" class="applyforjob">
                                        <div class="form-group">
                                            <label for="name">Your First Name :</label>
                                            <input type="text" class="form-control" name="first_name" id="firstname">
                                            <input type="hidden" name="advertise_id" value="{{$advertiser->id}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Last Name :</label>
                                            <input type="text" class="form-control" name="last_name" id="lastname">
                                        </div>
                                        <div class="form-group">
                                            @csrf
                                            <label for="email">Your Email :</label>
                                            <input type="email" class="form-control" name="applicant_email" id="applicantemail">
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="job_description">Your Phone No.</label>
                                            <input type="text" class="form-control" name="applicant_phone" id="applicantphone">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_logo">Your CV</label>
                                            <input type="file" class="form-control" name="applicant_cv"/>
                                        </div>
                                        <button type="submit" class="btn btn-apply btn-default">Apply</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            {{ $advertisers->links() }}
            <ul class="row reptro-course-items event">
               
              @foreach ($data as $item)

              @php
                            
              $timestemp = $item['date'];
              $year = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->year;
              $month = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->month;
              $day = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->day;
                  
            @endphp


              <li class="course  col-lg-12 col-md-12">
                    <div class="reptro-course-loop-thumbnail-area">
                        <!-- <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="events-details.html">Apply</a></div> -->
                        <div class="course-thumbnail"> <img width="570" height="461" src="{{ asset('imagess/thumb-'.$item->image) }}">
                        </div>
                    </div>
                    <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">
                            <h3 class="course-title">Intel Computing<span class="just_lable">Location: {{ $item->location }} |
                                    Category: {{ $item->category }}</span><span class="full_time_lable">Full
                                    time</span></h3>
                        </a>
                        <div class="event-info">
                            <div class="reptro-event-date"><span class="reptro-event-month">Posted on</span> <span
                                    class="reptro-event-day">31</span> <span class="reptro-event-month">{{ $month }}</span> <span
                                    class="reptro-event-year">{{ $year }}</span></div>
                            <div class="venueTime">
                                <span class="reptro-event-time">
                                    <h6>Job Description</h6>
                                    <p>{{ $item->desc }}</p><!-- <i class="sli-clock"></i>Thursday, 3:00 pm to 6:00 pm -->
                                </span>
                                <span class="reptro-event-venue"><i class="sli-location-pin"></i>PSC Convention
                                    Hall</span>
                                <a class="btn btn-fill btn-lg AddNew" href="javascript:void(0)">Apply</a>
                            </div>
                        </div>
                    </div>

                </li>

                @endforeach
                
            </ul>


               {{-- model --}}
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Careers</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body" action="contact" method="post">
                 <form id="eventBookForm">
                    <input type="hidden" name="email" id="email">
                   
                     

                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Name" name="name">
                     </div>
                     
                     <div class="form-group">
                         <input type="email" class="form-control" placeholder="Email Address" name="senderemail">
                     </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Your Phone No" name="phone_no">
                    </div>
                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Mobile Number" name="phone_no">
                     </div>
                     <div class="form-group">
                      <input type="file" class="form-control" placeholder="Mobile Number" name="cv">
                  </div>
                     <div class="form-group">
                         <div id="paypal-button-container"></div>
                         <input class="btn btn-lg btn-fill" type="submit" value="Submit"  id="formsub" >
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>



            <!-- <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="#">All Events</a></div> -->
            {!! $data->render() !!}

        </section>
    </div>


    <!-- ********footer********** -->
    <!-- <section class="OSponsors">
        <div class="container">
            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Our Sponsors</span></h2>
            <p class="section-title-small text-center  section-title-small-border-yes">YOU MAKE A DIFFERENCE</p>
            <div class="row">
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-5-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-3-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-2-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-1-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo5.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-6.png" class="img-responsive" alt=""></a></div>
            </div>
        </div>
    </section> -->

    @include('user.include.footer')
    <input id="autocompleteUrl" type="hidden"  name="autourl" value="{{route('autocomplete.fetch')}}"/>
    <input id="csrfT" type="hidden"  name="_tokcsr" value="{{ csrf_token() }}"/>

</body>
<script src="user/js/choices.js"></script>
<script src="user/js/autocomplete.js"></script>
<script>
    $(document).on("click", ".AddNew", function() {
            // $('#formsub').prop('disabled', true);
            $('#eventBookForm').trigger("reset");
            // $('#ModelTitle').html('Add Member');
            // $('#ModelButton').html('Save');
            $('#exampleModalCenter').modal('show');
            $("#eventBookForm")[0].reset();
            });
        
    $('.applyforjob').on('submit', function(event){
        event.preventDefault();
        url = "{{ route('addnewapplicant') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data){
                if(data.id != 0){
                    //$('#advertadd').trigger('reset');
                    //$('#myModal').modal('hide');                        
                    setTimeout(function(){ window.location.reload(); }, 3000);
                }
            },
            error: function(reject) {
                if (reject.status === 422) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.errors, function(key, val) {
                        $("#" + key + "_error").show();
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            }
        })
    });





    const customSelects = document.querySelectorAll("select");
    const deleteBtn = document.getElementById('delete')
    const choices = new Choices('select', {
        searchEnabled: false,
        itemSelectText: '',
        removeItemButton: true,
    });
    for (let i = 0; i < customSelects.length; i++) {
        customSelects[i].addEventListener('addItem', function(event) {
            if (event.detail.value) {
                let parent = this.parentNode.parentNode
                parent.classList.add('valid')
                parent.classList.remove('invalid')
            } else {
                let parent = this.parentNode.parentNode
                parent.classList.add('invalid')
                parent.classList.remove('valid')
            }
        }, false);
    }
    deleteBtn.addEventListener("click", function(e) {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++) {
            deleteAll[i].click();
        }
    });

</script>

</html>
