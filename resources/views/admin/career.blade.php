@extends('admin.layout.master')

@section('parentPageTitle', 'Tables')

@section('title', 'Jquery Datatables')





@section('content')



<!-- Page header section  -->

<div class="block-header">

    <div class="row clearfix">

        <div class="col-xl-5 col-md-5 col-sm-12">

            <h1>Manage Careers</h1>

           

        </div>            

        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">

            

        </div>

    </div>

</div>



<div class="row clearfix">

    <div class="col-lg-12">

        <div class="card">

            <div class="header">

                <h2>Basic Table <small>Basic example without any additional modification classes</small></h2>

                <ul class="header-dropdown dropdown">

                    

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                    <li class="dropdown">

                        <a href="javascript:void(0);" class="AddNew" data-toggle="" role="button"

                            aria-haspopup="true" aria-expanded="false" style="font-size: 22px"><i

                                class="icon-plus"></i></a>

                    </li>

                </ul>

            </div>

            <div class="body">

                <div class="table-responsive">

                    <table id="myTable" class="table table-hover js-basic-example dataTable table-custom spacing5">

                        <thead>

                            <tr>

                                <th>Title</th>

                                <th>Date</th>

                                <th>category</th>

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

              <h5 class="modal-title h4" id="ModelTitle"> </h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

                      aria-hidden="true">×</span></button>

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

                                      <input name="title" id="title" type="text" class="form-control" 

                                          aria-describedby="basic-addon3">

                                  </div>

                              </div>

                          </div>



                          <div class="col-lg-6">

                            <div class="form-group c_form_group">

                                <label for="basic-url">email</label>

                                <div class="input-group">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon3"></span>

                                    </div>

                                    <input name="email" id="email" type="text" class="form-control" 

                                        aria-describedby="basic-addon3">

                                </div>

                            </div>

                        </div>



                         <div class="col-lg-6">



                                    <div class="form-group c_form_group">

                                        <label>Date</label>

                                        <div class="input-group">

                                            <input name="date" id="date" type="date"   class="form-control"

                                                >

                                        </div>

                                    </div>

                                </div>



                          <div class="col-lg-6">

                              <div class="form-group c_form_group">

                                  <label for="basic-url">Location</label>

                                  <div class="input-group">

                                      <div class="input-group-prepend">

                                          <span class="input-group-text" id="basic-addon3"></span>

                                      </div>

                                      <input name="location" id="location" type="text" class="form-control" 

                                          aria-describedby="basic-addon3">

                                  </div>

                              </div>

                          </div>



                          <div class="col-lg-6">

                            <div class="form-group c_form_group">

                                <label for="basic-url">Category</label>

                                <div class="input-group">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon3"></span>

                                    </div>

                                    <input name="category" id="category" type="text" class="form-control"

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

                          

                          <div class="col-lg-6">

                              <div class="form-group c_form_group">

                                  <label>Description</label>

                                  <div class="input-group">

                                      <textarea name="desc" id="desc"  class="form-control" aria-label="With textarea"></textarea>

                                  </div>

                              </div>

                          </div>



                      </div>



              </div>





          </div>

          <div class="modal-footer">

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              <button type="submit" class="btn btn-primary theme-bg gradient" id="ModelButton"></button>

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

 <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

 <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">

 <link rel="stylesheet" href="{{ secure_url('assets/vendor/multi-select/css/multi-select.css') }}">

 <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

 <link rel="stylesheet" href="{{ secure_url('assets/vendor/nouislider/nouislider.min.css') }}">



 <link rel="stylesheet" type="text/css" href="{{ secure_url('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css') }}">





@stop

@section('vendor-script')

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



  $("#myTable").DataTable({

      "responsive": true,

      "autoWidth": false,

      "processing": true,

      "serverSide": true,

      "bDestroy": true,

      "Access-Control-Allow-Origin": "*",

      "ajax": {

          "url": "{{ route('managecareer.index') }}",

      },

      "columns": [{

              data: 'title',

              name: 'title'

          },

          {

              data: 'date',

              name: 'date'

          },

          {

              data: 'category',

              name: 'category',

               

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

      $('#ModelTitle').html('Add Careers');

      $('#ModelButton').html('Save');

      $('#MyModel').modal('show');

      $("#myForm")[0].reset();

  });

  $(document).on("click", "#EditModel", function() {

      $('.error').html('');

      var Id = $(this).attr('data-id');

      $('#Model_title').html('Edit Event');

      $('#ModelButton').html('Edit');

      $.ajax({

          url: "{{ url('managecareer') }}/" + Id,

          method: 'get',

          success: function(result) {

              $('#MyForm').trigger("reset");

              $('#EditId').remove();

              $('#imageview').remove();



              // $('#imageappendhere').append(

              //     '<div id="imageview"><img src="public/images/admin/thumb-' +

              //     result.image + '" alt="abc" height="150"> </div>');



              $('#title').append(

                  '<input id="EditId"  type="hidden"   name="EditId">');

              $('#EditId').val(result.id);

              

              $('#title').val(result.title);

              $('#email').val(result.email);

              $('#date').val(result.date);

              $('#location').val(result.location);

              $('#category').val(result.category);

              $('#desc').val(result.desc);

              



              

              $('#MyModel').modal('show');

          }

      });

  });

  $('#myForm').on('submit', function(event) {

      event.preventDefault();

      url = "{{ url('managecareer') }}"

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

                      url: "{{ url('managecareer') }}/" + Id,

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