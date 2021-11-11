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

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame" style="font-size: 22px"></i></a></li>

                    </h4>

                </ul>

            </div>

            <div class="body">

                <div class="body">



                    <form id="myForm" method="post">

                        <div class="row">



                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Header Logo</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="hidden" name="id">

                                        <input type="file" class="custom-file-input" id="header_logo" name="header_logo" accept="image/*">

                                        <label class="custom-file-label" for="header_logo">Choose file</label>

                                    </div>

                                    <span id="header_logo_error" class="error"></span>

                                </div>



                                <div class="form-group">

                                    <div class="img-preview-container logo_preview-container">

                                        <img src="{{isset($data->header_logo)?$data->header_logo:''}}" id="header_logo_preview" class="img-preview">

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Footer Logo</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="file" class="custom-file-input" id="footer_logo" name="footer_logo" accept="image/*">

                                        <label class="custom-file-label" for="footer_logo">Choose file</label>

                                    </div>

                                    <span id="footer_logo_error" class="error"></span>

                                </div>

                                <div class="form-group">

                                    <div class="img-preview-container logo_preview-container">

                                        <img src="{{isset($data->footer_logo)?$data->footer_logo:''}}" id="footer_logo_preview" class="img-preview">

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

                                        <input type="text" value="{{isset($data->mail)?$data->mail:''}}" class="form-control" id="mail" name="mail" aria-describedby="basic-addon3">

                                    </div>



                                    <span id="mail_error" class="error"></span>

                                </div>

                            </div>



                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Phone No.</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="text" class="form-control" value="{{isset($data->phone_no)?$data->phone_no:''}}" id="phone_no" name="phone_no" aria-describedby="basic-addon3">

                                    </div>

                                    <span id="phone_no_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label>Footer Description 1</label>

                                    <div class="input-group">

                                        <textarea class="form-control" id="footer_desc1" name="footer_desc1" aria-label="With textarea">{{isset($data->footer_desc1)?$data->footer_desc1:''}}</textarea>

                                    </div>

                                    <span id="footer_desc1_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label>Footer Description 2</label>

                                    <div class="input-group">

                                        <textarea class="form-control" id="footer_desc2" name="footer_desc2" aria-label="With textarea">{{isset($data->footer_desc2)?$data->footer_desc2:""}}</textarea>

                                    </div>

                                    <span id="footer_desc2_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label>Footer Description 3</label>

                                    <div class="input-group">

                                        <textarea class="form-control" name="footer_desc3" id="footer_desc3" aria-label="With textarea">{{isset($data->footer_desc3)?$data->footer_desc3:''}}</textarea>

                                    </div>

                                    <span id="footer_desc3_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label>Location</label>

                                    <div class="input-group">

                                        <textarea class="form-control" name="location" id="location" aria-label="With textarea">{{isset($data->location)?$data->location:''}}</textarea>

                                    </div>

                                    <span id="location_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label>Become Member Description</label>

                                    <div class="input-group">

                                        <textarea class="form-control" name="become_member_desc" id="become_member_desc" aria-label="With textarea">{{isset($data->become_member_desc)?$data->become_member_desc:''}}</textarea>

                                    </div>

                                    <span id="become_member_desc_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Twit Link.</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="text" class="form-control" id="twit_link" value="{{isset($data->twit_link)?$data->twit_link:''}}" name="twit_link" aria-describedby="basic-addon3">

                                    </div>

                                    <span id="twit_link_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">FaceBook Link</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="text" class="form-control" id="fb_link" value="{{isset($data->fb_link)?$data->fb_link:''}}" name="fb_link" aria-describedby="basic-addon3">

                                    </div>

                                    <span id="fb_link_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Google Link</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="text" class="form-control" id="google_link" value="{{isset($data->google_link)?$data->google_link:''}}" name="google_link" aria-describedby="basic-addon3">

                                    </div>

                                    <span id="google_link_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Linkedin Link</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="text" class="form-control" id="linkedin_link" value="{{isset($data->linkedin_link)?$data->linkedin_link:''}}" name="linkedin_link" aria-describedby="basic-addon3">

                                    </div>

                                    <span id="linkedin_link_error" class="error"></span>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group c_form_group">

                                    <label for="basic-url">Youtube Link</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text" id="basic-addon3"></span>

                                        </div>

                                        <input type="text" class="form-control" id="youtube_link" value="{{isset($data->youtube_link)?$data->youtube_link:''}}" name="youtube_link" aria-describedby="basic-addon3">

                                    </div>

                                    <span id="youtube_link_error" class="error"></span>

                                </div>



                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary theme-bg gradient" id="ModelButton">Save</button>



                </div>

            </div>

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

        $('#header_logo').on('change', function() {

            var reader = new FileReader();

            reader.onload = function(event) {

                $("#header_logo_preview").attr("src", event.target.result)

            }

            reader.readAsDataURL(this.files[0]);

        });

        $('#footer_logo').on('change', function() {

            var reader = new FileReader();

            reader.onload = function(event) {

                $("#footer_logo_preview").attr("src", event.target.result)

            }

            reader.readAsDataURL(this.files[0]);

        });

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        $('#myForm').on('submit', function(event) {

            event.preventDefault();

            url = "{{ url('layout/addeditlayout') }}"

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

                    swal({

                        position: 'top-end',

                        title: "Successfully!",

                        text: "Layout data save Successfully!",

                        icon: "success",

                        showConfirmButton: true,

                    });

                    $(':input[type="submit"]').prop('disabled', false);



                },

                error: function(reject) {

                    if (reject.status === 422) {

                        var errors = $.parseJSON(reject.responseText);

                        $.each(errors.errors, function(key, val) {

                            vkey = key.split(".")[0];

                            if (vkey != "gallery_image") {

                                vkey = key.replace(".", "_");

                            }

                            // $("#" + vkey).next('span').remove();

                            // console.log(vkey);

                            // html = "<span class='error'>" + val[0] + "</span>";

                            // console.log("html", html)



                            $("#" + vkey + "_error").html(val[0]);





                        });

                        $(':input[type="submit"]').prop('disabled', false);

                    }

                }

            })

            return false;

        });



    });

</script>



@stop