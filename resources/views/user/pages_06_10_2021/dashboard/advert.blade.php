@extends('layouts.user')
@push('css')
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .borde{
            border-radius: 0.55rem !important;
        }
    </style>
@endpush
@section('content')
<body class="carriers_page">
    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="continer">
                <h1 class="entry-title">DashBoard</h1>
            </div>
        </div>
        <div class="xt-breadcrumb-wrapper">
            <div class="continer">
                <nav class="xt-breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li class="current">DashBoard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"></div>
                    <button type="button" class="btn btn-default btn-cls" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <form id="advertadd">
                        <div class="form-group">
                            <label for="email">Company Name :</label>
                            <input type="text" class="form-control" name="company_name" id="company_name">
                            <input type="hidden" name="advertiser_id" value="{{$user->id}}"/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="job_type">Job Type :</label>
                            <select id="job_type" name="job_type" class="form-control">
                                <option value="">Select Job Type</option>
                                <option value="1">Full</option>
                                <option value="2">Part time</option>
                                <option value="3">Contractual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="job_cat">Job Category :</label>
                            <select id="category" name="category" class="form-control">
                                <option value="">Select Job Category</option>
                                @foreach($job_cat as $jcategory)
                                    <option value="{{$jcategory->adv_cat_id}}">{{$jcategory->adv_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="job_cat">Country :</label>
                            <select id="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="1">Ireland</option>
                                <option value="2">United Kingdom</option>
                            </select>
                        </div>
                        <div id="idir" class="form-group" style="display:none;">
                            <label for="job_cat">County :</label>
                            <select id="ireland" class="form-control">
                                <option value="">Select County</option>
                                @foreach($irelandCounty as $ireland)
                                    <option value="{{$ireland->county_id}}">{{$ireland->county}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="iduk" class="form-group" style="display:none;">
                            <label for="job_cat">County :</label>
                            <select id="uk" class="form-control">
                                <option value="">Select County</option>
                                @foreach($ukCounty as $uk)
                                    <option value="{{$uk->county_id}}">{{$uk->county}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Deadline Date :</label>
                            <input type="text" class="form-control" name="deadline_date" id="deadline_date"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Salary Offer :</label>
                            <input type="text" class="form-control" name="salary_offer" id="salary_offer"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="text" class="form-control" name="adv_email" id="adv_email"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone :</label>
                            <input type="text" class="form-control" name="adv_phone" id="adv_phone"/>
                        </div>
                        <div class="form-group">
                            <label for="job_description">Job Description</label>
                            <textarea id="job_description" name="job_description" class="form-control" style="resize:none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="company_logo">Company Logo</label>
                            <input type="file" class="form-control" name="company_logo"/>
                        </div>
                        <button type="submit" class="btn btn-default">Post Advert</button>
                    </form>
                </div>                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="theme-main-content-inner row justify-content-center">
            <div class="row profile_page_container">
                @include('user.include.dheader')
                <div class="col-md-12">
                    {{-- <i class="fal fa-bullhorn"></i> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <h3 style="text-align: left;"><i class="fa fa-bullhorn" aria-hidden="true"></i> My ADVERTISEMENT
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <button class="btn-sm btn-add" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add</button>
                            </div>
                        </div>
                        @foreach($advertisers as $advertiser)
                        <!-- <div class="col-md-6 section_container center"> -->
                        <!-- <div class="col-md-6 "> -->
                            <ul class="row reptro-course-items event">
                                <li class="course  col-lg-12 col-md-12">
                                    <div class="reptro-course-loop-thumbnail-area">
                                        <!-- <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="events-details.html">Apply</a></div> -->
                                        <div class="course-thumbnail">
                                            <!-- <img width="570" height="461" src="user/images/rawpixel.jpg"> -->
                                            <img width="570" height="461" src="{{ route('getadvertimage', $advertiser->company_logo) }}">
                                        </div>
                                    </div>
                                    <div class="reptro-course-item-inner">
                                        <a href="#" class="course-permalink">
                                            <h3 class="course-title">{{$advertiser->company_name}}
                                                <span class="just_lable">
                                                    Job ID: BLV000-{{$advertiser->id}} {{--| Location: {{$advertiser->county}}--}} | Category: {{$advertiser->category}}</span>
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
                                                    $get_date   = date("Y-M-d",strtotime($advertiser->posted_on));
                                                    $post_date  = explode('-', $get_date);
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
                                                <span class="reptro-event-deadline comn-career" title="Salary On Offer">
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
                                            </div>                                            
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-sm EditModel" data-id="{{$advertiser->id}}" >Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-sm DeleteModel" data-id="{{$advertiser->id}}" >Delete</a>
                                </li>                                
                            </ul>
                        <!-- </div> -->
                        @endforeach                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $advertisers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="js/choices.js"></script>
    <script>
        $(document).on('change','#country',function(){
            if($(this).val() == 1){
                $("#uk").removeAttr("name");
                $('#iduk').hide();
                $('#idir').show();
                $('#ireland').attr('name', 'location');
            }
            else if($(this).val() == 2){
                $("#ireland").removeAttr("name");
                $('#idir').hide();
                $('#iduk').show();
                $('#uk').attr('name', 'location');
            }
            else{
                $('#idir').hide();
                $('#iduk').hide();
                $("#ireland, #uk").removeAttr("name");
            }
        });

        $(document).on("click", ".EditModel", function(){
            var Id = $(this).attr('data-id');
            $.ajax({
                url     :   "{{ url('editadvertiser') }}/" + Id,
                method: 'get',
                success: function(result){
                    response    =   result[0];
                    $('#MyForm').trigger("reset");
                    $('#EditId').remove();
                    $('#imageview').remove();
                    $("#job_type option:selected").each(function(){
                        $(this).removeAttr('selected'); 
                    });
                    $("#category option:selected").each(function(){
                        $(this).removeAttr('selected'); 
                    });
                    $("#country option:selected").each(function(){
                        $(this).removeAttr('selected'); 
                    });
                    $('#company_name').append('<input id="EditId" type="hidden" name="EditId">');
                    $('#EditId').val(response.id);
                    $('#company_name').val(response.company_name);
                    $('#job_description').val(response.description);
                    $('#deadline_date').val(response.deadline_date);
                    $('#salary_offer').val(response.salary_offer);
                    $('#adv_email').val(response.adv_email);
                    $('#adv_phone').val(response.adv_phone);
                    if(response.job_type == 1){
                        $('#job_type option[value="1"]').attr("selected", "selected");
                    }
                    else if(response.job_type == 2){
                        $('#job_type option[value="2"]').attr("selected", "selected");
                    }
                    else{
                        $('#job_type option[value="3"]').attr("selected", "selected");
                    }
                    $('#category option[value="'+response.category+'"]').attr("selected", "selected");
                    $('#country option[value="'+response.country+'"]').attr("selected", "selected");
                    if(response.country == 1){
                        $("#uk").removeAttr("name");
                        $('#iduk').hide();
                        $('#idir').show();
                        $('#ireland').attr('name', 'location');
                        $('#ireland option[value="'+response.location+'"]').attr("selected", "selected");
                    }
                    else if(response.country == 2){
                        $("#ireland").removeAttr("name");
                        $('#idir').hide();
                        $('#iduk').show();
                        $('#uk').attr('name', 'location');
                        $('#uk option[value="'+response.location+'"]').attr("selected", "selected");
                    }
                    else{
                        $('#idir').hide();
                        $('#iduk').hide();
                        $("#ireland, #uk").removeAttr("name");
                    }
                    $('#myModal').modal('show');
                }
            });
        });

        $('#advertadd').on('submit', function(event){
            event.preventDefault();                
            //url = "{{ url('manageevent') }}";
            //url = "{{ route('addnewadvert') }}";
            var checkForm   =   $('#EditId').val();
            if(checkForm){
                url = "{{ route('updateadvertiser') }}";
            }
            else{
                url = "{{ route('addnewadvert') }}";
            }
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data){
                    if(data.id != 0){
                        $('#advertadd').trigger('reset');
                        $('#myModal').modal('hide');                        
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
        
        $(document).on("click", ".DeleteModel", function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var Id      =   $(this).attr('data-id');
            console.log(Id);
            var confirmation = confirm("are you sure you want to delete the advertisement?");
            if (confirmation){
                //alert('removed');
                $.ajax({
                    url     : "{{ route('deleteadvertisement') }}",
                    method  : 'POST',
                    data    : { addid : Id },
                    success: function(result) {
                        window.location.reload();
                    }
                });
            }
            return false;
        });

      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete')
      const choices = new Choices('select',{
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
      deleteBtn.addEventListener("click", function(e){
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++)
        {
          deleteAll[i].click();
        }
      });
    </script>
@endpush
