@extends('admin.layout.master')
@section('parentPageTitle', 'Forms')
@section('title', 'Editors')


@section('content')
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Add New Member</h1>
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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="body">
                    <form action="{{url('insertuser')}}" id="myForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Password</label>
                                    <div class="">
                                        <input type="password" class="form-control" id="password" name="password" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Company</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="company" name="company"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Title</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="title" name="title" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Phone No.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="phone_no" name="phone_no"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>Industry</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="industry" name="industry" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group c_form_group">
                                    <label>User Type</label>
                                    <div class="">
                                        <input type="radio" id="usertype" name="usertype" value="member"/><label for="member">member</label>
                                        <input type="radio" id="usertype" name="usertype" value="sponser"/><label for="sponser">sponser</label>
                                        <input type="radio" id="usertype" name="usertype" value="advertiser"/><label for="advertiser">advertiser</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group c_form_group">
                                    <label for="basic-url">Image</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"></span>
                                        </div>
                                        <input type="file" name="image" class="form-control" aria-describedby="basic-addon3"/>
                                    </div>
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

@stop