@extends('admin.layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Event') 
@section('content')

    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>Manage Advertisers</h1>

            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">

            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <br>
                    <ul class="header-dropdown dropdown">
                        <h4>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"
                                        style="font-size: 22px"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="AddNew" data-toggle="" role="button"
                                    aria-haspopup="true" aria-expanded="false" style="font-size: 22px"><i
                                        class="icon-plus"></i></a>
                            </li>
                        </h4>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover js-basic-example dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Company Logo</th>
                                    <th>Job Type</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal with btn -->
    <div class="modal fade bd-example-modal-lg" id="MyModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="ModelTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>                
                <div class="modal-body">
                    <div class="body">
                        <form id="myForm">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Company Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <input name="company_name" type="text" class="form-control" id="company_name" aria-describedby="basic-addon3"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Job Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <input type="hidden" name="advertiser_id" value="{{$user->id}}"/>
                                            <select name="job_type" class="form-control" id="job_type" aria-describedby="basic-addon3">
                                                <option value="">Select Job Type</option>
                                                <option value="1">Full</option>
                                                <option value="2">Part time</option>
                                                <option value="3">Contractual</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Job Category</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <select name="category" class="form-control" id="category" aria-describedby="basic-addon3">
                                                <option value="">Select Job Category</option>
                                                @foreach($job_cat as $jcategory)
                                                    <option value="{{$jcategory->adv_cat_id}}">{{$jcategory->adv_cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Country</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <select id="country" class="form-control" aria-describedby="basic-addon3">
                                                <option value="">Select Country</option>
                                                <option value="1">Ireland</option>
                                                <option value="2">United Kingdom</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="idir" class="col-lg-12" style="display:none;">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">County :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <select id="ireland" class="form-control">
                                                <option value="">Select County</option>
                                                @foreach($irelandCounty as $ireland)
                                                    <option value="{{$ireland->county_id}}">{{$ireland->county}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="iduk" class="col-lg-12" style="display:none;">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">County :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <select id="uk" class="form-control">
                                                <option value="">Select County</option>
                                                @foreach($ukCounty as $uk)
                                                    <option value="{{$uk->county_id}}">{{$uk->county}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Job Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <textarea id="job_description" name="job_description" class="form-control" aria-label="With textarea" style="resize:none; height: 350px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Company Logo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon3"></span> </div>
                                            <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                                <input type="file" class="form-control" name="company_logo"/>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary theme-bg gradient" id="ModelButton"></button>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>



@stop

@section('page-styles')
    {{-- datatable css --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css') }}">

    <style>
        .demo-card label {
            display: block;
            position: relative;
        }

        .demo-card .col-lg-4 {
            margin-bottom: 30px;
        }

    </style>


@stop
@section('vendor-script')
    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>

    <script type="text/javascript" src="{{ asset('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js') }}"></script>
    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>
@stop

@section('page-script')
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
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

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#myTable").DataTable({
                "responsive": true,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "bDestroy": true,
                "Access-Control-Allow-Origin": "*",
                "ajax": {
                    "url": "{{ route('advertisers') }}",
                },
                "columns": [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'company_logo',
                        name: 'company_logo',
                        "render": function(data, type, full, meta){
                            return "<img src=\"{{ url('/') }}/uploads/advert/" + data + "\" height=\"50\"/>";
                        }
                    },
                    {
                        data: 'job_type',
                        name: 'job_type'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]

            });
            $(document).on("click", ".AddNew", function() {
                $('.error').html('');
                $('.error').html('');
                // $('#imageview').remove();
                $('#EditId').remove();
                $('#myForm').trigger("reset");
                $('#ModelTitle').html('Add Event');
                $('#ModelButton').html('Save');
                $('#MyModel').modal('show');
                $("#myForm")[0].reset();
            });
            $(document).on("click", "#EditModel", function() {
                $('.error').html('');
                var Id = $(this).attr('data-id');
                $('#Model_title').html('Edit Sponsors');
                $('#ModelButton').html('Edit');
                $.ajax({
                    //url: "{{ url('managesponsors') }}/" + Id,
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
                        $('#MyModel').modal('show');
                    }
                });
            });
            $('#myForm').on('submit', function(event) {
                event.preventDefault();
                //url = "{{ url('managesponsors') }}"
                $(':input[type="submit"]').prop('disabled', true);
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
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#MyModel').modal('hide');
                        $('#myTable').DataTable().ajax.reload();
                        swal({
                            position: 'top-end',
                            title: "Good job!",
                            text: "Product Added Successfully!",
                            icon: "success",
                            showConfirmButton: false,
                        });
                        $(':input[type="submit"]').prop('disabled', false);

                        $("#myForm")[0].reset();
                    },
                    error: function(reject) {
                        if (reject.status === 422) {
                            $(':input[type="submit"]').prop('disabled', false);

                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors.errors, function(key, val) {
                                $("#" + key + "_error").show();
                                $("#" + key + "_error").text(val[0]);
                            });
                        }
                    }
                })
            });

            $(document).on("click", "#DeleteModel", function() {
                var Id = $(this).attr('data-id');
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this  file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                //url: "{{ url('managesponsors') }}/" + Id,
                                url     :   "{{ url('deletesponsor') }}/" + Id,
                                //method: 'DELETE',
                                method  :   'GET',
                                success: function(result) {
                                    $('#myTable').DataTable().ajax.reload();
                                }
                            });
                            swal("Poof! Your imaginary file has been deleted!", {

                                icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
                return false;
            });
        });

    </script>

@stop
