@extends('admin.layout.master')

@section('parentPageTitle', 'Forms')

@section('title', 'Editors')





@section('content')

    <!-- Page header section  -->

    <div class="block-header">

        <div class="row clearfix">

            <div class="col-xl-5 col-md-5 col-sm-12">

                <h1>Manage CMS About</h1>

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

                        </h4>

                    </ul>

                </div>

                <div class="body">

                    <div class="body">



                        <form action="aboutadded" id="myForm" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <input type="hidden" name="page_type" value="about">



                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>Title</label>

                                        <div class="input-group">

                                            <textarea class="form-control" id="title" name="title"
                                                aria-label="With textarea">{{ isset($data->title) ? $data->title : '' }}</textarea>

                                        </div>

                                        <span id="title_error" class="error"></span>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    {{-- <div class="form-group c_form_group">

                                        <label for="basic-url">Image</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon3"></span>

                                            </div>

                                            <input type="file" class="custom-file-input" id="about_image" name="about_image"
                                                accept="image/*">

                                            <label class="custom-file-label" for="about_image">Choose file</label>

                                        </div>

                                        <span id="about_image_error" class="error"></span>
                                        <img src="{{ isset($data->about_image) ? $data->about_image : '' }}"
                                            id="about_image_preview" class="img-preview">
                                    </div> --}}

                                    <div class="form-group c_form_group">

                                    <label>Image Link</label>

                                    <div class="input-group">

                                        <input class="form-control" id="video_link" name="video_link" value="{{isset($data->video_link)?$data->video_link:''}}">

                                    </div>

                                    <span id="title_error" class="error"></span>

                                </div>

                                </div>



                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>Description</label>

                                        <div class="">

                                        <textarea class="
                                            form-control" id="ckeditor" name="description" aria-label="With textarea">
                                            {{ isset($data->description) ? $data->description : '' }}</textarea>

                                        </div>

                                        <span id="description_error" class="error"></span>

                                    </div>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary theme-bg gradient" id="ModelButton">Save</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>



    </div>



@stop



@section('page-styles')

    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">

@stop



@section('vendor-script')

    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

@stop



@section('page-script')

    <script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>

    <script>
        $(function() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });


            $('#about_image').on('change', function() {

                var reader = new FileReader();

                reader.onload = function(event) {

                    $("#about_image_preview").attr("src", event.target.result)

                }

                reader.readAsDataURL(this.files[0]);

            });



            // $('#myForm').on('submit', function(event) {

            //     event.preventDefault();

            //     url = "{{ url('cms/addeditcms') }}"

            //     $(':input[type="submit"]').prop('disabled', true);

            //     $(".error").html("");

            //     $.ajax({

            //         url: url,

            //         type: "POST",

            //         data: new FormData(this),

            //         contentType: false,

            //         processData: false,

            //         success: function(data) {

            //             $('#MyModel').modal('hide');

            //             swal({

            //                 position: 'top-end',

            //                 title: "Successfully!",

            //                 text: "Record save Successfully!",

            //                 icon: "success",

            //                 showConfirmButton: true,

            //             });

            //             $(':input[type="submit"]').prop('disabled', false);



            //         },

            //         error: function(reject) {

            //             if (reject.status === 422) {

            //                 var errors = $.parseJSON(reject.responseText);

            //                 $.each(errors.errors, function(key, val) {

            //                     vkey = key.split(".")[0];

            //                     if (vkey != "gallery_image") {

            //                         vkey = key.replace(".", "_");

            //                     }

            //                     $("#" + vkey + "_error").html(val[0]);

            //                 });

            //                 $(':input[type="submit"]').prop('disabled', false);

            //             }

            //         }

            //     })

            //     return false;

            // });



        });
    </script>

@stop
