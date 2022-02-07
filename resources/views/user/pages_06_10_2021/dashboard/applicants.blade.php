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
    
    <div class="container">
        <div class="theme-main-content-inner row justify-content-center">
            <div class="row profile_page_container">
                @include('user.include.dheader')
                <div class="col-md-12 left_section_container">
                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <h3 style="text-align: left;"><i class="fa fa-users" aria-hidden="true"></i>Job Applicants</h3>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Job Id</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Job Type</th>
                                        <th scope="col">Applicant Name</th>
                                        <th scope="col">Applicant Email</th>
                                        <th scope="col">Applicant Phone</th>
                                        <th scope="col">Applied On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applicants as $applicant)
                                        <tr>
                                            <td>{{ $applicant->id }}</td>
                                            <td>{{ $applicant->company_name }}</td>
                                            @if($applicant->job_type == 1)
                                                <td>Full time</td>
                                            @elseif($applicant->job_type == 2)
                                                <td>Part time</td>
                                            @else
                                                <td>Contractual</td>
                                            @endif
                                            <td>{{$applicant->first_name}} {{$applicant->last_name}}</td>
                                            <td>{{ $applicant->applicant_email }}</td>
                                            <td>{{ $applicant->applicant_phone }}</td>
                                            <td>{{date("d-M-Y",strtotime($applicant->applied_on))}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            {{ $applicants->links() }}
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

        $('#advertadd').on('submit', function(event){
            event.preventDefault();                
            //url = "{{ url('manageevent') }}";
            url = "{{ route('addnewadvert') }}";
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
