@extends('admin.layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Event')

 
@section('content')

    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>Manage Sponsors</h1>

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
                                    <th>Title</th>
                                    <th>Image</th>
                                    
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
                                        <label for="basic-url">Title</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <input name="title" type="text" class="form-control" id="title" aria-describedby="basic-addon3"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Link</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"></span>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                            <input name="link" type="text" class="form-control" id="link" aria-describedby="basic-addon3"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group c_form_group">
                                        <label for="basic-url">Image</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon3"></span> </div>
                                            <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
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
                    "url": "{{ route('managesponsors.index') }}",
                },
                "columns": [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        "render": function(data, type, full, meta) {
                            //return "<img src=\"public/images/thumb-" + data + "\" height=\"50\"/>";
                            return "<img src=\"{{ url('/') }}/imagess/thumbnail/" + data + "\" height=\"50\"/>";
                        }
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
                    url     :   "{{ url('editsponsor') }}/" + Id,
                    method: 'get',
                    success: function(result){
                        $('#MyForm').trigger("reset");
                        $('#EditId').remove();
                        $('#imageview').remove();
                        // $('#imageappendhere').append(
                        //     '<div id="imageview"><img src="public/images/admin/thumb-' +
                        //     result.image + '" alt="abc" height="150"> </div>');
                        $('#title').append('<input id="EditId" type="hidden" name="EditId">');
                        $('#EditId').val(result.id);                        
                        $('#title').val(result.title);
                        $('#link').val(result.link);                        
                        $('#MyModel').modal('show');
                    }
                });
            });
            $('#myForm').on('submit', function(event) {
                event.preventDefault();
                url = "{{ url('managesponsors') }}"
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
