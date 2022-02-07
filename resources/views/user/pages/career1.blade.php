@extends('layouts.user')
@push('css') 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link media="all" href="font/fontcss.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet" />
    <link media="all" href="{{ asset('user/css/custome.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('user/js/custome.js') }}"></script>

@endpush
@section('content')
 <!-- ****End top header***-->
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
        

        <div class="s010">
  <form>
    <div class="inner-form">
      
      <div class="advance-search">
       
        <div class="row">
          <div class="input-field_new">
            
              <input id="search_new" type="text" placeholder="Enter Keywords" />
          </div>
          <div class="input-field">
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
          </div>
        </div>
       
        <div class="row third">
          <div class="input-field">
            <div class="result-count">
              <span>108 </span>results</div>
            <div class="group-btn">
              <button class="btn-delete" id="delete">RESET</button>
              <button class="btn-search">SEARCH</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

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
                <div class="course-thumbnail"> <img width="570" height="461" src="user/images/rawpixel.jpg"></div>
            </div>
            <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">
              <h3 class="course-title">Intel Computing<span class="just_lable">Location: {{ $item->location }} | Category:  {{ $item->category }}</span><span class="full_time_lable">Full time</span></h3></a>
              <div class="event-info">
              <div class="reptro-event-date"><span class="reptro-event-month">Posted on</span> <span class="reptro-event-day">{{ $month }}</span> <span class="reptro-event-month">Dec</span> <span class="reptro-event-year">{{ $year }}</span></div>
                <div class="venueTime">
                  <span class="reptro-event-time"> <h6>Job Description</h6> <p>{{ $item->desc }}</p><!-- <i class="sli-clock"></i>Thursday, 3:00 pm to 6:00 pm --> </span>
                  <span class="reptro-event-venue"><i class="sli-location-pin"></i>{{ $item->location }}</span>
                  <a class="btn btn-fill btn-lg" href="events-details.html">Apply</a>
                </div>
              </div>
            </div>
                      
            </li> 
            @endforeach                                 
            </ul>


         
    </section>
</div>


 
@endsection
@push('js')
<script src="{{ asset('user/js/choices.js') }}"></script>
<script>
  const customSelects = document.querySelectorAll("select");
  const deleteBtn = document.getElementById('delete')
  const choices = new Choices('select',
  {
    searchEnabled: false,
    itemSelectText: '',
    removeItemButton: true,
  });
  for (let i = 0; i < customSelects.length; i++)
  {
    customSelects[i].addEventListener('addItem', function(event)
    {
      if (event.detail.value)
      {
        let parent = this.parentNode.parentNode
        parent.classList.add('valid')
        parent.classList.remove('invalid')
      }
      else
      {
        let parent = this.parentNode.parentNode
        parent.classList.add('invalid')
        parent.classList.remove('valid')
      }
    }, false);
  }
  deleteBtn.addEventListener("click", function(e)
  {
    e.preventDefault()
    const deleteAll = document.querySelectorAll('.choices__button')
    for (let i = 0; i < deleteAll.length; i++)
    {
      deleteAll[i].click();
    }
  });

</script>
@endpush
