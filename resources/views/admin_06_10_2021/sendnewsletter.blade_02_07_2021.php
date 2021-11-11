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

                                                <option value="1">Template 1</option>

                                                <option value="2">Template 2</option>

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

                                                    <option
                                                        value="<?php echo $listName->id; ?>">
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

    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">

@stop



@section('vendor-script')

    {{-- <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

@stop



@section('page-script')

    <script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>

    <script type="text/javascript">
        //snigdho
        CKEDITOR.replace('mailBody');
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

                if (template == 1) {

                    var temp_html = '<main class="container"><div class="body"><h2>Dear [[name]],</h2><p> Websites that autoplay video can be super annoying. You didnt select the video to play &mdash; it was started for you. <i>Hurumph!</i> will now stop that from happening, putting you in control. If youd like to hear or see a video, just click on the play button to watch it.</p><p>with <a>Block Autoplay</a>: the way online video should be</p><button>FIND OUT MORE</button></div></main><footer class="container"><p>Thanks for reading!</p><p>Youre receiving this email because we think you’re neat, AND you subscribed to hear from us. If our emails aren’t sparking joy, we’ll understand if you  <a>unsubscribe.</a></p><div><a>Please Donate</a><p>331 E. Evelyn Avenue Mountain View CA 94041</p><P><a>Legal</a> <span>•</span> <a>Privacy</a></P></div></footer>';

                    // $('#mailBody').html('<p>Hello World</p>');
                    CKEDITOR.instances.mailBody.setData(temp_html);

                } else if (template == 2) {
                    var temp2_html = '<main class="container"><div class="body"><h2>Dear [[name]],</h2><p> This is a test..</p></div></main><footer class="container"><p>Thanks for reading!</p></footer>';

                    CKEDITOR.instances.mailBody.setData(temp2_html);

                } else {

                    CKEDITOR.instances.mailBody.setData('');
                }

                var message = CKEDITOR.instances.mailBody.getData();
                console.log(message);

            })



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
