@extends('admin.layout.master')
@section('parentPageTitle', 'Forms')
@section('title', 'Editors')
@section('content')

    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>Dashboard</h1>
            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            
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