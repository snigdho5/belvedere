@extends('admin.layout.master')

@section('parentPageTitle', 'Forms')

@section('title', 'Editors')





@section('content')

    <!-- Page header section  -->

    <div class="block-header">

        <div class="row clearfix">

            <div class="col-xl-5 col-md-5 col-sm-12">

                <h1>Sending Newsletter</h1>

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

                                @if ($message = Session::get('warning'))
                                    <div class="alert alert-warning alert-block">

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

                        </div>

                        <form action="newsletter/subscription" id="myForm" method="post">

                            @csrf

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group c_form_group">

                                        <label>e-Mail Template</label>

                                        <div class="input-group">

                                            <select id="tempchange" class="form-control tempchange" name="template">

                                                <option value="">Select e-Mail Template</option>

                                                @if (!empty($template_data))
                                                    @foreach ($template_data as $item)
                                                        <div>
                                                            <option value="{{ $item->temp_id }}"
                                                                data-tmpname="{{ $item->template_name }}">
                                                                {{ $item->template_name }}</option>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>

                                        <span id="title_error" class="error"></span>

                                    </div>

                                </div>

                                <input type="hidden" name="template" value="1" />

                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>e-Mail List</label>

                                        <div class="input-group">

                                            <select name="templateno" class="form-control">

                                                <option value="">choose subscription list</option>

                                                @foreach (subscriberlist() as $listName)
                                                    <option value="<?php echo $listName->id; ?>">
                                                        <?php echo $listName->list_name; ?>
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <span id="title_error" class="error"></span>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>e-Mail Subject</label>

                                        <div class="input-group">

                                            <textarea class="form-control" id="title" name="mailSubject"
                                                aria-label="With textarea" style="resize: none;"></textarea>

                                        </div>

                                        <span id="title_error" class="error"></span>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group c_form_group">

                                        <label>e-Mail Body</label>

                                        {{-- <div class=""> --}}

                                        <textarea class="form-control ckeditor" id="mailBody" name="mailBody"
                                            aria-label="With textarea" placeholder="Choose template.."
                                            style="resize: none;"></textarea>

                                        {{-- </div> --}}

                                        <span id="description_error" class="error"></span>

                                    </div>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary theme-bg gradient" id="ModelButton">Send
                                Newsletter</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



@stop



@section('page-styles')

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/sweetalert/sweetalert.css') }}">

@stop



@section('vendor-script')

    {{-- <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script src="{{ secure_url('assets/js/pages/ckfinder/ckfinder.js') }}"></script>

    <script src="{{ secure_url('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

@stop



@section('page-script')

    <script src="{{ secure_url('assets/js/pages/forms/editors.js') }}"></script>

    <script type="text/javascript">
        //snigdho
        var editor = CKEDITOR.replace('mailBody');
        CKFinder.setupCKEditor(editor);
    </script>

    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('change', '.tempchange', function() {

                //snigdho
                var template = $(this).val();

                //console.log(template);

                if (template != '' && template > 0) {
                    $('.temp-del-div').hide();

                    $.ajax({

                        url: "{{ url('gettemplate') }}/" + template,

                        method: 'get',

                        success: function(result) {

                            if (result) {
                                CKEDITOR.instances.mailBody.setData(result.temphtml);
                            }

                        }

                    });

                } else {

                    CKEDITOR.instances.mailBody.setData('');
                }

                //var message = CKEDITOR.instances.mailBody.getData();
                //console.log(message);

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
