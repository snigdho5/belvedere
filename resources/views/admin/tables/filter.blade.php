@extends('admin.layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Table filter')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <button type="button" class="btn btn-default btn-filter" data-target="all">All</button>
            <button type="button" class="btn btn-success btn-filter" data-target="approved">Approved</button>
            <button type="button" class="btn btn-warning btn-filter" data-target="suspended">Suspended</button>
            <button type="button" class="btn btn-info btn-filter" data-target="pending">Pending</button>
            <button type="button" class="btn btn-danger btn-filter" data-target="blocked">Blocked</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card bg-clear">
            <div class="header">
                <h2>Table Filter</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu theme-bg">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <table class="table table-hover table-custom spacing5 mb-0">
                    <tbody>
                        <tr data-status="approved">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar1.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 1</a>
                                <p class="mb-0">Scott Ortega</p>
                            </td>
                            <td>
                                <span>Lorem Ipsum is dummy text of the and typesetting industry.</span>
                            </td>
                            <td class="text-right">11,200</td>
                            <td class="text-right">$83</td>
                            <td class="text-right"><strong>$22,520</strong></td>
                        </tr>
                        <tr data-status="suspended">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 2</a>
                                <p class="mb-0">Louis Little</p>
                            </td>
                            <td>
                                <span>Lorem Ipsum is simply text of the printing and typesetting industry.</span>
                            </td>
                            <td class="text-right">119</td>
                            <td class="text-right">$66</td>
                            <td class="text-right"><strong>$135</strong></td>
                        </tr>
                        <tr data-status="blocked">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar3.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 3</a>
                                <p class="mb-0">Mike</p>
                            </td>                                    
                            <td>
                                <span>Lorem is simply dummy text of the printing and typesetting industry.</span>
                            </td>
                            <td class="text-right">12,111</td>
                            <td class="text-right">$93</td>
                            <td class="text-right"><strong>$17,700</strong></td>
                        </tr>
                        <tr data-status="approved">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar4.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 4</a>
                                <p class="mb-0">Lori Kelley</p>
                            </td>
                            <td>
                                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                            </td>
                            <td class="text-right">18,200</td>
                            <td class="text-right">$178</td>
                            <td class="text-right"><strong>$17,700</strong></td>
                        </tr>
                        <tr data-status="pending">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar5.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 5</a>
                                <p class="mb-0">David McCoy</p>
                            </td>
                            <td>
                                <span>Lorem Ipsum is simply dummy text of the printing and industry.</span>
                            </td>
                            <td class="text-right">12,315</td>
                            <td class="text-right">$93</td>
                            <td class="text-right"><strong>$1,700</strong></td>
                        </tr>
                        <tr data-status="suspended">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 2</a>
                                <p class="mb-0">Louis Little</p>
                            </td>
                            <td>
                                <span>Lorem Ipsum is simply text of the printing and typesetting industry.</span>
                            </td>
                            <td class="text-right">11,200</td>
                            <td class="text-right">$66</td>
                            <td class="text-right"><strong>$13,205</strong></td>
                        </tr>
                        <tr data-status="blocked">
                            <td class="w60">
                                <img src="{{ secure_url('assets/images/xs/avatar7.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded-circle">
                            </td>
                            <td>
                                <a href="javascript:void(0);" title="">Project 3</a>
                                <p class="mb-0">Mike</p>
                            </td>                                    
                            <td>
                                <span>Lorem is simply dummy text of the printing and typesetting industry.</span>
                            </td>
                            <td class="text-right">12,280</td>
                            <td class="text-right">$93</td>
                            <td class="text-right"><strong>$2,700</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')

@stop
@section('vendor-script')

@stop

@section('page-script')
<script src="{{ secure_url('assets/js/pages/tables/table-filter.js') }}"></script>
@stop