@extends('admin.layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Event')

@section('content')
    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>Subscription Details</h1>
            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">

            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12"> 
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                upload validation error<br/>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                        @if($message = Session::get('warning'))
                            <div class="alert alert-warning alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                    </div>
                    <input type="radio" name="radioName" style="display:none;" checked />
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover js-basic-example dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th>Serial ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($data as $value){
                                        ?>
                                            <tr>
                                                <td><?= $value->newsletter_user_id ?></td>
                                                <td><?= $value->first_name ?></td>
                                                <td><?= $value->last_name ?></td>
                                                <td><?= $value->email ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        {{ $data->links() }}
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
        $("#expofromdate").datepicker({format: 'dd-mm-yyyy'});
        $("#expotodate").datepicker({format: 'dd-mm-yyyy'});
    </script>
@stop

@section('page-script')
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
@stop