@extends('admin.layout.master')

@section('parentPageTitle', 'Tables')

@section('title', 'Event')



@section('content')



    <!-- Page header section  -->

    <div class="block-header">

        <div class="row clearfix">

            <div class="col-xl-5 col-md-5 col-sm-12">

                <h1>Manage Event</h1>

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

                            {{-- <li>

                                <a href="{{url('export_event_data')}}">

                                    <i class="fa fa-exchange" style="font-size: 22px"></i>

                                </a>

                            </li> --}}

                            <li>

                                <a href="javascript:void(0);" class="full-screen">

                                    <i class="icon-frame" style="font-size: 22px"></i>

                                </a>

                            </li>

                            <li class="dropdown">

                                <a href="javascript:void(0);" class="AddNew" data-toggle="" role="button"
                                    aria-haspopup="true" aria-expanded="false" style="font-size: 22px">

                                    <i class="icon-plus"></i>

                                </a>

                            </li>

                        </h4>

                    </ul>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        @if (count($errors) > 0)

                            <div class="alert alert-danger">

                                upload validation error<br />

                                <ul>

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        @if ($message = Session::get('success'))

                            <div class="alert alert-success alert-block">

                                <button type="button" class="close" data-dismiss="alert">x</button>

                                <strong>{{ $message }}</strong>

                            </div>

                        @endif

                        @if ($message = Session::get('error'))

                            <div class="alert alert-danger alert-block">

                                <button type="button" class="close" data-dismiss="alert">x</button>

                                <strong>{{ $message }}</strong>

                            </div>

                        @endif

                    </div>

                    <div class="col-md-3">

                    </div>

                    <div class="col-md-6">

                        <form method="post" action="{{ url('export_event_data') }}">

                            @csrf

                            <div class="form-group">

                                <input type="text" name="expofromdate" id="expofromdate" data-provide="datepicker"
                                    data-date-autoclose="true" class="form-control" placeholder="Select From date" />

                            </div>

                            <div class="form-group">

                                <input type="text" name="expotodate" id="expotodate" data-provide="datepicker"
                                    data-date-autoclose="true" class="form-control" placeholder="Select To date" />

                            </div>

                            <div class="form-group">

                                <select class="form-control" name="filter_type" id="filter_type">
                                    <option value="">Select Column</option>
                                    <option value="title">Title</option>
                                    <option value="location">Location</option>
                                    <option value="status">Status</option>
                                </select>

                            </div>

                            <div class="form-group search-box">

                                <input type="text" name="search_key" id="search_key" class="form-control"
                                    placeholder="Search.." />

                            </div>

                            <div class="form-group status-drop" style="display:none;">

                                <select class="form-control" name="set_status" id="set_status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>

                            </div>

                            <div class="form-group">

                                <input type="submit" name="export" class="btn btn-primary" value="Export" />

                            </div>

                        </form>

                    </div>

                    <div class="col-md-3"></div>

                </div>

                <div class="body">

                    <div class="table-responsive">

                        <table id="myTable" class="table table-hover js-basic-example dataTable table-custom spacing5">

                            <thead>

                                <tr>

                                    <th>Title</th>

                                    <th>Date</th>

                                    <!-- <th>From Date</th> -->

                                    <!-- <th>To Date</th> -->

                                    <th>Location</th>

                                    <!-- <th>Phone no</th> -->

                                    <th>Status</th>

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

    <div class="modal fade bd-example-modal-lg" id="MyModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title h4" id="ModelTitle"></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="body">

                        <form id="myForm">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Title</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input name="title" type="text" class="form-control" id="title"
                                                aria-describedby="basic-addon3">

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Map</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <textarea name="map" id="map" class="form-control" aria-label="With textarea"
                                                style="resize:none; height: 175px;"></textarea>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-6 col-md-6">

                                    <div class="form-group c_form_group">

                                        <label>Date</label>

                                        <div class="input-group">

                                            <input id="fromdate" data-provide="datepicker" data-date-autoclose="true"
                                                class="form-control" placeholder="Select date" />

                                            <input id="finalfromdate" type="hidden" name="fromdate" />

                                        </div>

                                    </div>

                                </div>



                                {{-- <div class="col-lg-4 col-md-6">

                                    <div class="form-group c_form_group">

                                        <label>To Date</label>

                                        <div class="input-group">

                                            <input id="todate" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Select date"/>

                                            <input id="finaltodate" type="hidden" name="todate"/>

                                        </div>

                                    </div>

                                </div> --}}



                                <div class="col-lg-6 col-md-6">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Time</label>

                                        <div class="input-group clockpicker" data-placement="left" data-align="top"
                                            data-autoclose="true">

                                            <input name="time" id="time" type="text" class="form-control" value="13:14">

                                            <span class="input-group-addon">

                                                <span class="glyphicon glyphicon-time"></span>

                                            </span>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-6 col-md-6">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Cost</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input name="cost" id="cost" type="text" class="form-control" id=""
                                                aria-describedby="basic-addon3">

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-6">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Image</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">

                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                                        </div>

                                    </div>

                                </div>



                                {{-- <div class="col-lg-4">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Phone No.</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input name="phone_no" id="phone_no" type="text" class="form-control" id=""

                                                aria-describedby="basic-addon3">

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-6">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Email</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input name="email" id="email" type="text" class="form-control" id="" aria-describedby="basic-addon3">

                                        </div>

                                    </div>

                                </div> --}}



                                <input name="phone_no" id="phone_no" type="hidden" value="9578461230" />

                                <input name="email" id="email" type="hidden" value="noemail@gmail.com" />



                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label for="basic-url">Address</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input name="address" id="address" type="text" class="form-control" id=""
                                                aria-describedby="basic-addon3">

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>Description</label>

                                        <div class="input-group">

                                            <textarea name="desc" id="ckeditor" class="desc form-control"
                                                aria-label="With textarea" style="resize:none; height: 175px;"></textarea>

                                        </div>

                                    </div>

                                </div>

                                

                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>Status</label>

                                        <div class="input-group">

                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>


                                        </div>

                                    </div>

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

@stop



@section('page-styles')

    {{-- datatable css --}}

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet"
        href="{{ secure_url('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">

    <link rel="stylesheet"
        href="{{ secure_url('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/sweetalert/sweetalert.css') }}">



    <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">

    <link rel="stylesheet"
        href="{{ secure_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/multi-select/css/multi-select.css') }}">

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/nouislider/nouislider.min.css') }}">



    <link rel="stylesheet" type="text/css"
        href="{{ secure_url('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css') }}">



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



    {{-- <script src="{{ secure_url('assets/vendor/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ secure_url('assets/js/pages/forms/editors.js') }}"></script> --}}

    <script src="{{ secure_url('assets/bundles/datatablescripts.bundle.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ secure_url('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>

    <!-- <script src="{{ secure_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous"></script>

    <script src="{{ secure_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/nouislider/nouislider.js') }}"></script>







    <script type="text/javascript" src="{{ secure_url('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js') }}">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker();



        $("#expofromdate").datepicker({
            format: 'dd-mm-yyyy'
        });

        $("#expotodate").datepicker({
            format: 'dd-mm-yyyy'
        });



        $("#fromdate").datepicker({
            startDate: "today",
            format: 'dd-mm-yyyy'
        });

        $('#fromdate').datepicker().on('changeDate', function(e) {

            //$('#other-input').val(e.format(0,"dd/mm/yyyy"));

            //alert(e.date);

            //alert(e.format(0,"dd/mm/yyyy"));

            $('#finalfromdate').val(e.format(0, "yyyy-mm-dd"));

        });

        $('#todate').datepicker().on('changeDate', function(e) {

            $('#finaltodate').val(e.format(0, "yyyy-mm-dd"));

        });
    </script>



@stop



@section('page-script')

    <script src="{{ secure_url('assets/js/pages/tables/jquery-datatable.js') }}"></script>

    <script src="{{ secure_url('assets/js/pages/forms/advanced-form-elements.js') }}"></script>

    <script>
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

                    "url": "{{ route('manageevent.index') }}",

                },

                "columns": [{

                        data: 'title',

                        name: 'title'

                    },

                    {

                        data: 'fromdate',

                        name: 'fromdate'

                    },

                    /*{

                        data: 'todate',

                        name: 'todate'

                    },*/

                    {

                        data: 'address',

                        name: 'address',



                    },

                    /*{

                        data: 'phone_no',

                        name: 'phone_no',

                         

                    },*/


                    {

                        data: 'status',

                        name: 'status'

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

            
            $(document).on("change", "#filter_type", function() {
                var filter_type = $(this).val();
                if(filter_type == 'status'){
                    $('.search-box').hide();
                    $('.status-drop').show();
                }else{
                    $('.status-drop').hide();
                    $('.search-box').show();
                }
                
            });



            $(document).on("click", "#EditModel", function() {

                $('.error').html('');

                var Id = $(this).attr('data-id');

                $('#Model_title').html('Edit Event');

                $('#ModelButton').html('Edit');

                $('#status').html('');

                $.ajax({

                    url: "{{ url('manageevent') }}/" + Id,

                    method: 'get',

                    success: function(result) {

                        $('#MyForm').trigger("reset");

                        $('#EditId').remove();

                        $('#imageview').remove();

                        // $('#imageappendhere').append(

                        //'<div id="imageview"><img src="public/images/admin/thumb-' +

                        //result.image + '" alt="abc" height="150"> </div>');

                        $('#title').append(

                            '<input id="EditId"  type="hidden"   name="EditId">');

                        $('#EditId').val(result.id);

                        $('#title').val(result.title);

                        $('#fromdate').val(moment(result.fromdate).format('DD-MM-YYYY'));

                        $('#todate').val(moment(result.fromdate).format('DD-MM-YYYY'));

                        // $('#todate').val(result.todate);

                        $('#finalfromdate').val(result.fromdate);

                        // $('#finaltodate').val(result.todate);

                        $('#finaltodate').val(result.fromdate);

                        $('#time').val(result.time);

                        $('#cost').val(result.cost);

                        $('#ckeditor').val(result.desc);

                        $('#phone_no').val(result.phone_no);

                        $('#email').val(result.email);

                        $('#address').val(result.address);

                        $('#map').val(result.map);

                        if(result.status == 1){
                            var html_opt = '<option value="1" selected>Active</option> <option value="0" >Inactive</option>';
                        }else{
                            var html_opt = '<option value="1">Active</option> <option value="0" selected>Inactive</option>';
                        }

                        $('#status').append(html_opt);

                        $('#MyModel').modal('show');

                    }

                });

            });



            $('#myForm').on('submit', function(event) {

                event.preventDefault();

                //url = "{{ url('manageevent') }}";

                var checkForm = $('#EditId').val();

                if (checkForm) {

                    url = "{{ route('updateevent') }}";

                } else {

                    url = "{{ route('addevent') }}";

                }



                $(':input[type="submit"]').prop('disabled', true);

                $.ajax({

                    url: url,

                    type: "POST",

                    data: new FormData(this),

                    contentType: false,

                    processData: false,

                    success: function(data) {

                        $('#MyModel').modal('hide');

                        $('#myTable').DataTable().ajax.reload();

                        if (!checkForm) {

                            swal({

                                position: 'top-end',

                                title: "Good job!",

                                text: "Event Added Successfully!",

                                icon: "success",

                                showConfirmButton: false,

                            });

                        } else {

                            swal({

                                position: 'top-end',

                                title: "Good job!",

                                text: "Event Updated Successfully!",

                                icon: "success",

                                showConfirmButton: false,

                            });

                        }

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

                                url: "{{ url('manageevent') }}/" + Id,

                                method: 'DELETE',

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



            /*$(document).on('click','#fromdate',function(){

                $('#fromdate').val('');

            });*/

        });
    </script>



@stop
