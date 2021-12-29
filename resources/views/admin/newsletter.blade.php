@extends('admin.layout.master')

@section('parentPageTitle', 'Tables')

@section('title', 'Event')



@section('content')

    <!-- Page header section  -->

    <div class="block-header">

        <div class="row clearfix">

            <div class="col-xl-5 col-md-5 col-sm-12">

                <h1>Subscription Management</h1>

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

                    <!-- <div class="row"> 

                                                                                                    <div class="radio radio-primary col-sm-2">

                                                                                                        <input type="radio" class="TestRadio" name="radioName" id="radio4" value="All"  checked>

                                                                                                        <label for="radio4">

                                                                                                            ALL

                                                                                                        </label>

                                                                                                    </div>



                                                                                                    <div class="radio radio-primary col-sm-2">

                                                                                                        <input type="radio" class="TestRadio" name="radioName" id="radio4" value="member">

                                                                                                        <label for="radio4">

                                                                                                            Member

                                                                                                        </label>

                                                                                                    </div>



                                                                                                    <div class="radio radio-primary col-sm-2">

                                                                                                        <input type="radio" class="TestRadio" name="radioName" id="radio4" value="advertiser">

                                                                                                        <label for="radio4">

                                                                                                            Advertiser

                                                                                                        </label>

                                                                                                    </div>



                                                                                                    <div class="radio radio-primary col-sm-2">

                                                                                                        <input type="radio" class="TestRadio" name="radioName" id="radio4" value="sponsor">

                                                                                                        <label for="radio4">

                                                                                                            Sponser

                                                                                                        </label>

                                                                                                    </div>

                                                                                                </div> -->



                    <!-- <ul class="header-dropdown dropdown">

                                                                                                    <h4>

                                                                                                        {{-- <li>

                                <a href="{{url('export_renewal_data')}}">

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

                                                                                                </ul> -->



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



                        {{-- <div class="col-md-2">

                        <a class="btn btn-primary" href="{{ secure_url('exportformat/import_news.xlsx') }}">Download
                            Import format</a>

                    </div> --}}

                        <div class="col-md-12">

                            <form method="post" enctype="multipart/form-data"
                                action="{{ url('/import_excel/subscribers') }}">

                                @csrf

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="radio radio-primary col-sm-3">

                                                <input type="radio" class="TestRadio " name="radioName" id="radio1"
                                                    value="excel" />

                                                <label for="radio1">

                                                    Upload By Excel

                                                </label>

                                            </div>

                                            <div class="radio radio-primary col-sm-3">


                                                <input type="radio" class="TestRadio" name="radioName" id="radio7"
                                                    value="manual">

                                                <label for="radio7">

                                                    Add Manual Entry

                                                </label>

                                            </div>

                                            <div class="radio radio-primary col-sm-3">

                                                <input type="radio" class="TestRadio" name="radioName" id="radio9"
                                                    value="filter" />

                                                <label for="radio9">

                                                    By Filter and select

                                                </label>

                                            </div>

                                            <div class="radio radio-primary col-sm-3">

                                                <input type="radio" class="TestRadio" name="radioName" id="radio10"
                                                    value="multi_member" />

                                                <label for="radio10">

                                                    By Multiple User Type

                                                </label>

                                            </div>

                                            <div class="radio radio-primary col-sm-12">

                                                <hr>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="row">

                                    <div class="radio radio-primary col-sm-4 excel-div">

                                        <input type="radio" class="TestRadio " name="radioName" id="radio1"
                                            value="none" />

                                        <label for="radio1">

                                            Upload By Excel

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 excel-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio2"
                                            value="member" />

                                        <label for="radio2">

                                            Member

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 excel-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio3"
                                            value="advertiser" />

                                        <label for="radio3">

                                            Advertiser

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 excel-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio4"
                                            value="sponser">

                                        <label for="radio4">

                                            Sponser

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 excel-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio5"
                                            value="events">

                                        <label for="radio5">

                                            Event Attendee

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 excel-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio6" value="old">

                                        <label for="radio6">

                                            Old Database

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 manual-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio7"
                                            value="manual">

                                        <label for="radio7">

                                            Add Manual Entry

                                        </label>

                                    </div>

                                    <div class="radio radio-primary col-sm-4 manual-div">

                                        <input type="radio" class="TestRadio" name="radioName" id="radio8"
                                            value="addlist">

                                        <label for="radio8">

                                            Add Subscription List

                                        </label>

                                    </div>



                                </div> --}}

                                <div class="row filter-div">

                                    <div class="radio radio-primary col-sm-2">

                                        <input type="radio" class="filterRad" name="filterRad" id="filterRad"
                                            value="All" checked>

                                        <label for="filterRad">

                                            ALL

                                        </label>

                                    </div>



                                    <div class="radio radio-primary col-sm-2">

                                        <input type="radio" class="filterRad" name="filterRad" id="filterRad"
                                            value="member">

                                        <label for="filterRad">

                                            Member

                                        </label>

                                    </div>



                                    <div class="radio radio-primary col-sm-2">

                                        <input type="radio" class="filterRad" name="filterRad" id="filterRad"
                                            value="advertiser">

                                        <label for="filterRad">

                                            Advertiser

                                        </label>

                                    </div>



                                    <div class="radio radio-primary col-sm-2">

                                        <input type="radio" class="filterRad" name="filterRad" id="filterRad"
                                            value="sponsor">

                                        <label for="filterRad">

                                            Sponser

                                        </label>

                                    </div>

                                </div>

                                <div class="col-md-6 filter-div">



                                    <form method="post" action="{{ url('export_primium_data') }}">

                                        @csrf

                                        <div class="form-group">

                                            <input type="text" name="fromdate" id="fromdate" data-provide="datepicker"
                                                data-date-autoclose="true" class="form-control"
                                                placeholder="Select From date" />

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="todate" id="todate" data-provide="datepicker"
                                                data-date-autoclose="true" class="form-control"
                                                placeholder="Select To date" />

                                        </div>

                                        <div class="form-group">

                                            <select class="form-control" name="filter_type" id="filter_type">
                                                <option value="">Select Column</option>
                                                {{-- <option value="type">Type</option> --}}
                                                <option value="useremail">User email</option>
                                                <option value="username">User name</option>
                                                <option value="month">Month</option>
                                                <option value="enddate">Enddate</option>
                                                <option value="year_left">Year Left</option>
                                                <option value="company">Company</option>
                                                <option value="title">Title</option>
                                                <option value="phone_no">Phone</option>
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

                                            <input type="button" name="export" class="btn btn-primary search-btn"
                                                value="Submit" />

                                        </div>

                                    </form>

                                </div>

                                <div class="subs-div filter-div">
                                    <table class="table table-hover" border="2">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;" colspan="3">
                                                    <h3>Manage Subscription List</h3>
                                                    <p>To add members to subscription list, select members and the
                                                        subscription list name and then click Submit</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="text-align: center;">
                                                <td>
                                                    {{-- <input type="checkbox" class="check-all" value=""> Check All --}}
                                                    <select id="sel_members" class="sel_members" multiple="multiple">

                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="subs_id" id="subs_id" class="form-control subs_id"
                                                        style="max-width:300px;">

                                                        <option value="">Choose Subscription List</option>

                                                        @foreach (subscriberlist() as $listName)

                                                            <option value="<?php echo $listName->id; ?>">
                                                                <?php echo $listName->list_name; ?>
                                                            </option>

                                                        @endforeach

                                                    </select>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-primary sms-btn">Submit</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="body filter-div">

                                </div>

                                <div class="row multi-member-div">

                          
                                    <div class="radio radio-primary col-sm-2">

                                        <input type="checkbox" class="multi_mem" name="multi_mem" id="multi_mem"
                                            value="member">

                                        <label for="multi_mem">

                                            Member

                                        </label>

                                    </div>



                                    <div class="radio radio-primary col-sm-2">

                                        <input type="checkbox" class="multi_mem" name="multi_mem" id="multi_mem"
                                            value="advertiser">

                                        <label for="multi_mem">

                                            Advertiser

                                        </label>

                                    </div>



                                    <div class="radio radio-primary col-sm-2">

                                        <input type="checkbox" class="multi_mem" name="multi_mem" id="multi_mem"
                                            value="sponsor">

                                        <label for="multi_mem">

                                            Sponser

                                        </label>

                                    </div>

                                </div>
                                

                                <div class="body multi-member-div">
                                    <div class="col-sm-6 mt-2">

                                        <label for="email">Save To :</label>

                                        <div class="row">
                                            <div class="col-sm-1 mt-1">
                                                <input id="s2n" type="radio" class="form-control" name="save2"
                                                    value="savetonew" />
                                            </div>

                                            <div class="col-sm-11"><label for="s2n">

                                                    Add New

                                                </label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-1 mt-1">
                                                <input id="s2e" type="radio" class="form-control" name="save2"
                                                    value="savetoexist" />
                                            </div>

                                            <div class="col-sm-11">
                                                <label for="s2e">

                                                    Add to existing

                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tempDiv" class="col-sm-12">

                                        <label for="chooseTempo">Choose List :</label>

                                        <select id="tempodropd" name="templateno" class="form-control">

                                            <option value="">Choose List</option>

                                            @foreach (subscriberlist() as $listName)

                                                <option value="<?= $listName->id ?>"><?= $listName->list_name ?></option>

                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div id="manualInput" class="row">

                                    <div class="col-sm-6">

                                        <label for="firstName">First Name :</label>

                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="Enter First Name" />

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="lastName">Last Name :</label>

                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Enter Last Name" />

                                    </div>

                                    <div class="col-sm-6 mt-2">

                                        <label for="email">Email :</label>

                                        <input type="text" class="form-control" name="email" placeholder="Enter Email" />

                                    </div>

                                    <div class="col-sm-6 mt-2">

                                        <label for="email">Save To :</label>

                                        <div class="row">
                                            <div class="col-sm-1 mt-1">
                                                <input id="s2n" type="radio" class="form-control" name="save2"
                                                    value="savetonew" />
                                            </div>

                                            <div class="col-sm-11"><label for="s2n">

                                                    Add New

                                                </label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-1 mt-1">
                                                <input id="s2e" type="radio" class="form-control" name="save2"
                                                    value="savetoexist" />
                                            </div>

                                            <div class="col-sm-11">
                                                <label for="s2e">

                                                    Add to existing

                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tempDiv" class="col-sm-12">

                                        <label for="chooseTempo">Choose List :</label>

                                        <select id="tempodropd" name="templateno" class="form-control">

                                            <option value="">Choose List</option>

                                            @foreach (subscriberlist() as $listName)

                                                <option value="<?= $listName->id ?>"><?= $listName->list_name ?></option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div id="dateRng" class="row">

                                    <div class="col-sm-6">

                                        <label for="fromDate">From Date</label>

                                        <input type="text" class="form-control" name="dateFrom"
                                            placeholder="Enter from year" />

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="toDate">To Date</label>

                                        <input type="text" class="form-control" name="dateTo"
                                            placeholder="Enter to year" />

                                    </div>

                                </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <table class="table tab-div">

                                    <tr>

                                        <td width="100%" class="bltdl-file"
                                            style="border-bottom:solid 1px #fff; border-top:solid 1px #fff;">
                                            <a class="btn btn-primary"
                                                href="{{ secure_url('exportformat/import_news.xlsx') }}">Download
                                                Import format</a>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="bltdl " width="100%" align="left">

                                            <label>Enter Your List Name</label><br>
                                            <input type="text" class="form-control" name="list_name"
                                                placeholder="List Name" />

                                        </td>

                                        <!--<td class="bltdl" width="30%">

                                                                                                <input type="text" class="form-control" name="list_name"
                                                                                                    placeholder="List Name" />

                                                                                            </td> 
                                                              
                                                              <td width="30%" align="left">

                                                                &nbsp;

                                                                                            </td>-->
                                    </tr>

                                    <tr>

                                        <td class="bltdl bltdl-file" width="40%" align="right">

                                            <label>Select File for Upload</label>

                                        </td>

                                        <td class="bltdl bltdl-file" width="30%">

                                            <input type="file" name="select_file" />

                                        </td>

                                        <td width="30%" align="left">

                                            <input type="submit" name="upload" class="btn btn-primary import-btn"
                                                value="Import" />

                                        </td>

                                    </tr>

                                </table>

                            </div>
                        </div>

                        </form>

                    </div>

                    <div class="col-md-2">



                    </div>

                </div>

                <div class="body">

                    <div class="table-responsive">

                        <table id="myTable" class="table table-hover js-basic-example dataTable table-custom spacing5">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>List Name</th>

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



    <script type="text/javascript" src="{{ secure_url('clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js') }}">
    </script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker();

        $("#expofromdate").datepicker({
            format: 'dd-mm-yyyy'
        });

        $("#expotodate").datepicker({
            format: 'dd-mm-yyyy'
        });
    </script>

@stop



@section('page-script')

    <script src="{{ secure_url('assets/js/pages/tables/jquery-datatable.js') }}"></script>

    <script src="{{ secure_url('assets/js/pages/forms/advanced-form-elements.js') }}"></script>

    <script>
        $(function() {
            getMembers();
            $('#dateRng,#manualInput,#tempDiv').hide();

            $('.bltdl-file').hide();
            $('.tab-div').hide();
            $('.filter-div').hide();
            $('.multi-member-div').hide();
            $('.excel-div').hide();

        });

        $(document).on('click', '#radio1,#radio2,#radio3,#radio4,#radio5,#radio7,#radio8', function() {

            $('#dateRng').hide();

        });

        $(document).on('click', '#radio6', function() {

            $('#dateRng').show();

        });

        $(document).on('click', '#radio1,#radio2,#radio3,#radio4,#radio5,#radio6,#radio8', function() {

            $('#manualInput').hide();

        });

        $(document).on('click', '#radio7', function() {

            $('#manualInput').show();



        });

        $(document).on('click', '#s2e', function() {

            $('#tempDiv').show();

            $('.bltdl').hide();

        });

        $(document).on('click', '#s2n', function() {

            $('.bltdl').show();

            $('#tempDiv').hide();

            $('#tempodropd').prop('selectedIndex', 0);

        });



        $(document).on("change", ".TestRadio", function(e) {

            // console.log(testRedioss);

            // testRedioss = $('input[name=radioName]:checked').val()

            // console.log(testRedioss);

            $('.tab-div').show();

            $('#myTable').DataTable().ajax.reload();

            // alert("test");
            var radioval = $(this).val();

            // console.log(radioval);

            if (radioval == 'excel') {
                $('.bltdl-file').show();
                $('.filter-div').hide();
                $('.multi-member-div').hide();
                $('.excel-div').show();
                $('.import-btn').show();
            } else if (radioval == 'addlist' || radioval == 'manual') {
                $('.filter-div').hide();
                $('.multi-member-div').hide();
                $('.excel-div').hide();
                $('.bltdl-file').hide();
                $('.import-btn').show();
            } else if (radioval == 'multi_member') {
                $('#manualInput').hide();
                $('.bltdl').hide();
                $('.bltdl-file').hide();
                $('.excel-div').hide();
                $('.filter-div').hide();
                $('.import-btn').hide();
                $('.multi-member-div').show();
            } else {
                $('#manualInput').hide();
                $('.bltdl').hide();
                $('.bltdl-file').hide();
                $('.excel-div').hide();
                $('.filter-div').hide();
                $('.multi-member-div').hide();
                $('.import-btn').hide();
                $('.filter-div').show();
            }


        });




        // $(document).on("click", ".radio_top", function(e) {

        //     var radioval = $(this).val();
        //     // console.log(radioval);

        //     $('.tab-div').hide();
        //     $('#dateRng,#manualInput,#tempDiv').hide();

        //     if (radioval == 'excel') {
        //         $('.manual-div').hide();
        //         $('.filter-div').hide();
        //         $('.excel-div').show();
        //     } else if (radioval == 'manual') {
        //         $('.filter-div').hide();
        //         $('.excel-div').hide();
        //         $('.manual-div').show();
        //     } else {
        //         $('.excel-div').hide();
        //         $('.manual-div').hide();
        //         $('.filter-div').show();
        //     }

        // });



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

                    "url": "{{ route('subscriberslist') }}",

                    "data": function(d) {

                        //d.myKey = $('input[name=radioName]:checked').val() 

                    }

                },

                "columns": [

                    {

                        data: 'id',

                        name: 'id'

                    },

                    {

                        data: 'list_name',

                        name: 'list_name'

                    },

                    {

                        data: 'action',

                        name: 'action'

                    }

                ]



            });


            $(document).on("click", ".search-btn", function(e) {

                var fromdate = $('#fromdate').val();
                var todate = $('#todate').val();
                var search_key = $('#search_key').val();
                var filter_type = $("select#filter_type option").filter(":selected").val();
                var set_status = $("select#set_status option").filter(":selected").val();
                var filterRad = $('input[name="filterRad"]:checked').val();

                $.ajax({

                    /*url: "{{ secure_url('managesponsors') }}/" + Id,

                    method: 'get',*/

                    url: "{{ secure_url('filter_member') }}",

                    method: 'POST',

                    data: {

                        fromdate: fromdate,
                        todate: todate,
                        search_key: search_key,
                        filter_type: filter_type,
                        set_status: set_status,
                        filterRad: filterRad

                    },

                    success: function(result) {

                        var response = JSON.parse(result);
                        $('#sel_members').html('');

                        $('#sel_members').multiselect('destroy');

                        $.each(response, function(key, val) {
                            $('#sel_members').append('<option value="' + val[
                                    'user_id'] +
                                '">' + val['username'] + ' (' + val['useremail'] +
                                ', ' + val['type'] + ')' + '</option>');
                        });

                        // $('#sel_members').multiselect('rebuild');
                        $('#sel_members').multiselect({
                            includeSelectAllOption: true,
                            enableFiltering: true,
                            maxHeight: 150
                        });

                    }

                });


            });


            $(document).on("click", ".AddNew", function() {

                $('.error').html('');

                $('.error').html('');

                // $('#imageview').remove();

                $('#EditId').remove();

                $('#myForm').trigger("reset");

                $('#ModelTitle').html('Add Member');

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

                    /*url: "{{ url('managesponsors') }}/" + Id,

                    method: 'get',*/

                    url: "{{ route('edituserdata') }}",

                    method: 'POST',

                    data: {
                        userid: Id
                    },

                    success: function(result) {

                        var response = JSON.parse(result);

                        //console.log(response.phone_no);

                        $('#editForm').trigger("reset");

                        $('#EditId').remove();

                        $('#imageview').remove();

                        $('#usrXid').val(response.id);

                        $('#editcompany').val(response.company);

                        $('#edittitle').val(response.title);

                        $('#editphone').val(response.phone_no);

                        $('#editindustry').val(response.industry);

                        //$('#imageappendhere').append(

                        //'<div id="imageview"><img src="public/images/admin/thumb-' +

                        //result.image + '" alt="abc" height="150"> </div>');

                        /*$('#title').append('<input id="EditId" type="hidden" name="EditId">');

                        $('#EditId').val(result.id);

                        $('#title').val(result.title);

                        $('#date').val(result.date);

                        $('#time').val(result.time);

                        $('#cost').val(result.cost);

                        $('#desc').val(result.desc);

                        $('#phone_no').val(result.phone_no);

                        $('#email').val(result.email);

                        $('#address').val(result.address);

                        $('#map').val(result.map);*/

                        $('#edituserModel').modal('show');

                    }

                });

            });



            $(document).on("click", "#updateUser", function(x) {

                x.preventDefault();

                var formData = $('#editForm').serialize();

                //console.log(formData);

                $(':input[type="submit"]').prop('disabled', true);

                $.ajax({

                    url: "{{ route('updateuserinfo') }}",

                    type: "POST",

                    data: formData,

                    success: function(data) {

                        $('#edituserModel').modal('hide');

                        $('#myTable').DataTable().ajax.reload();

                        swal({

                            position: 'top-end',

                            title: "Good job!",

                            text: "User Updated Successfully!",

                            icon: "success",

                            showConfirmButton: false,

                        });

                        $(':input[type="submit"]').prop('disabled', false);

                        $("#editForm")[0].reset();

                    }

                })

                /*$('.error').html('');

                var Id = $(this).attr('data-id');

                $('#Model_title').html('Edit Sponsors');

                $('#ModelButton').html('Edit');

                $.ajax({

                    url: "{{ route('edituserdata') }}",

                    method: 'POST',

                    data : { userid : Id },

                    success: function(result){                        

                        var response = JSON.parse(result);

                        console.log(response.id);

                        $('#editForm').trigger("reset");

                        $('#EditId').remove();

                        $('#imageview').remove();

                        $('#editcompany').val(response.company);

                        $('#edittitle').val(response.title);

                        $('#editphone').val(response.phone);

                        

                        $('#edituserModel').modal('show');

                    }

                });*/

            });



            $('#myForm').on('submit', function(event) {

                event.preventDefault();

                var formData = $('#myForm').serialize();

                //console.log(formData);

                url = "{{ url('addnewuser') }}"

                $(':input[type="submit"]').prop('disabled', true);

                $.ajax({

                    url: url,

                    type: "POST",

                    data: formData,

                    success: function(data) {

                        $('#MyModel').modal('hide');

                        $('#myTable').DataTable().ajax.reload();

                        swal({

                            position: 'top-end',

                            title: "Good job!",

                            text: "User Added Successfully!",

                            icon: "success",

                            showConfirmButton: false,

                        });

                        $(':input[type="submit"]').prop('disabled', false);

                        $("#myForm")[0].reset();

                    }

                })

                //url = "{{ url('managesponsors') }}"

                //$(':input[type="submit"]').prop('disabled', true);                

                /*$.ajax({

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

                })*/

            });



            $(document).on("click", "#DeleteModel", function() {

                var Id = $(this).attr('data-id');

                var email = $(this).attr('data-email');

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

                                //method: 'DELETE',

                                url: "{{ route('deleteuser') }}",

                                method: 'POST',

                                data: {
                                    userid: Id
                                },

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

            $(document).on('click', '.sms-btn', function() {

                var i = 0;
                var arr = {};

                var subs_id = $("select#subs_id option").filter(":selected").val();


                $('#sel_members :selected').each(function(i, sel) {
                    arr[i] = {};
                    arr[i] = $(sel).val();
                    i++;
                });

                var jArr = JSON.stringify(arr);
                // console.log(jArr);

                if (subs_id != '' && jArr != '{}') {
                    $.ajax({

                        url: "{{ secure_url('addtosubslist') }}",
                        method: 'POST',
                        data: {
                            arr: arr,
                            subs_id: subs_id
                        },
                        success: function(result) {
                            if (result.success == '1') {
                                swal(result.msg, {
                                    icon: "success",
                                });
                            } else {
                                swal(result.msg, {
                                    icon: "error",
                                });
                            }
                        }

                    });
                } else {
                    swal("Please choose members and subscription list first!", {
                        icon: "error",
                    });
                }




            });


        });

        function getMembers() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            var fromdate = $('#fromdate').val();
            var todate = $('#todate').val();
            var search_key = $('#search_key').val();
            var filter_type = $("select#filter_type option").filter(":selected").val();
            var set_status = $("select#set_status option").filter(":selected").val();
            var filterRad = $('input[name="filterRad"]:checked').val();


            $.ajax({

                /*url: "{{ secure_url('managesponsors') }}/" + Id,

                method: 'get',*/

                url: "{{ secure_url('filter_member') }}",

                method: 'POST',

                data: {

                    fromdate: fromdate,
                    todate: todate,
                    search_key: search_key,
                    filter_type: filter_type,
                    set_status: set_status,
                    filterRad: filterRad

                },

                success: function(result) {

                    var response = JSON.parse(result);
                    var html = '';
                    $('#sel_members').html('');

                    $('#sel_members').multiselect('destroy');

                    $.each(response, function(key, val) {
                        $('#sel_members').append('<option value="' + val['user_id'] +
                            '">' + val['username'] + ' (' + val['useremail'] +
                            ', ' + val['type'] + ')' + '</option>');
                    });

                    // $('#sel_members').multiselect('rebuild');
                    $('#sel_members').multiselect({
                        includeSelectAllOption: true,
                        enableFiltering: true,
                        maxHeight: 150
                    });

                }

            });


        }
    </script>

@stop
