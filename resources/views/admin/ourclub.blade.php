@extends('admin.layout.master')

@section('parentPageTitle', 'Tables')

@section('title', 'Event')



@section('content')



    <!-- Page header section  -->

    <div class="block-header">

        <div class="row clearfix">

            <div class="col-xl-5 col-md-5 col-sm-12">

                <h1>Manage OurClub</h1>



            </div>

            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">



            </div>

        </div>

    </div>



    <div class="row clearfix">

        <div class="col-lg-12">

            <div class="card">

                <div class="header">

                    <br/>

                    <ul class="header-dropdown dropdown">

                        <h4>

                            <li>

                                <a href="javascript:void(0);" class="full-screen">

                                    <i class="icon-frame" style="font-size: 22px"></i>

                                </a>

                            </li>

                            <li class="dropdown">

                                <a href="javascript:void(0);" class="AddNew" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 22px">

                                    <i class="icon-plus"></i>

                                </a>

                            </li>

                        </h4>

                    </ul>

                </div>

                <div class="body">

                    <div class="table-responsive">

                        <table class="table table-hover js-basic-example dataTable table-custom spacing5">

                            <thead>

                                <tr>

                                    <th>Title</th>

                                    <th>Link</th>

                                    <th>Donate Link</th>

                                    <th>Action</th>



                                </tr>

                            </thead>

                            <tfoot>

                                <tr>

                                    <th>Title</th>

                                    <th>Link</th>

                                    <th>Action</th>



                                </tr>

                            </tfoot>

                            <tbody>

                                @foreach ($data as $item)

                                <tr>

                                    <td>{{ $item->title }}</td>

                                    <td>{{ $item->link }}</td>

                                    <td>{{ $item->link }}</td>

                                    <td>

                                        <h5>

                                            <a href="javascript:void(0);" id="ViewModel" data-id="{{ $item->id }}"><i class="fa fa-eye" style="color:#0062cc;"></i></a>&nbsp;

                                            <a href="javascript:void(0);" class="EditModel" id="EditModel" data-id="{{ $item->id }}"><i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp;

                                            <a href="javascript:void(0);" id="DeletModel" data-id="{{ $item->id }}"><i class="fa fa-trash-o" style="color: #bd2130"></i></a>

                                        </h5>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>





<!-- Modal with btn -->

<div class="modal fade bd-example-modal-lg" id="MyModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title h4" id="myLargeModalLabel">Large modal</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

            </div>

            <form id="myForm">

                <div class="modal-body">

                    <div class="body">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group c_form_group">

                                    <label>Title</label>

                                    <div class="input-group">

                                        <textarea class="form-control" id="title" name="title" aria-label="With textarea">{{isset($data->title)?$data->title:''}}</textarea>

                                    </div>

                                    <span id="title_error" class="error"></span>

                                </div>

                            </div>

                            <input type="hidden" id="id" name="id">

                            <div class="col-lg-12">

                                <div class="form-group c_form_group">

                                    <label>Link</label>

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="link" name="link" aria-label="With" value="{{isset($data->link)?$data->link:''}}"></textarea>

                                    </div>

                                    <span id="link_error" class="error"></span>

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







@stop



@section('page-styles')

{{-- datatable css --}}

<link rel="stylesheet" href="{{ secure_url('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/sweetalert/sweetalert.css') }}">





<link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/multi-select/css/multi-select.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

<link rel="stylesheet" href="{{ secure_url('assets/vendor/nouislider/nouislider.min.css') }}">



<link rel="stylesheet" type="text/css" href="{{ secure_url('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css') }}">



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





<script src="{{ secure_url('assets/bundles/datatablescripts.bundle.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>



<script src="{{ secure_url('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

<script src="{{ secure_url('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>

<script src="{{ secure_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>

<script src="{{ secure_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ secure_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

<script src="{{ secure_url('assets/vendor/nouislider/nouislider.js') }}"></script>



<script type="text/javascript" src="{{ secure_url('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js') }}"></script>

<script type="text/javascript">

    $('.clockpicker').clockpicker();

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











        $(document).on("click", ".AddNew", function() {





            // $('.error').html('');

            // $('.error').html('');

            // $('#imageview').remove();

            // $('#EditId').remove();

            $('#myForm').trigger("reset");

            $('#ModelTitle').html('Add Event');

            $('#ModelButton').html('Save');

            $('#MyModel').modal('show');

            $("#myForm")[0].reset();

        });

        $(document).on("click", ".EditModel", function() {

            $('.error').html('');

            var Id = $(this).attr('data-id');

            $('#Model_title').html('Edit Category');

            $('#ModelButton').html('Edit');

            $.ajax({

                url: "{{ url('ourclub') }}/" + Id,

                method: 'get',

                success: function(result) {

                    $('#MyForm').trigger("reset");

                    $('#id').val(result.data.id);

                    $('#title').val(result.data.title);

                    $('#link').val(result.data.link);

                    $('#MyModel').modal('show');

                }

            });

        });



        $('#myForm').on('submit', function(event) {

            event.preventDefault();

            url = "{{ url('ourclub/addedit') }}"

            $(':input[type="submit"]').prop('disabled', true);

            $(".error").html("");

            $.ajax({

                url: url,

                type: "POST",

                data: new FormData(this),

                contentType: false,

                processData: false,

                success: function(data) {

                    $('#MyModel').modal('hide');

                    location.reload();



                },

                error: function(reject) {

                    if (reject.status === 422) {

                        var errors = $.parseJSON(reject.responseText);

                        $.each(errors.errors, function(key, val) {

                            vkey = key.split(".")[0];

                            if (vkey != "gallery_image") {

                                vkey = key.replace(".", "_");

                            }

                            $("#" + vkey + "_error").html(val[0]);

                        });

                        $(':input[type="submit"]').prop('disabled', false);

                    }

                }

            })

            return false;

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

                            url: "{{ url('addcategory') }}/" + Id,

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

    });

</script>



@stop