@extends('admin.layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Normal Table')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="body">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Mail" aria-label="Search Mail" aria-describedby="search-mail">
                        <div class="input-group-append">
                            <span class="input-group-text" id="search-mail"><i class="icon-magnifier"></i></span>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5 mb-0">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Team</th>
                                <th>Details</th>
                                <th class="text-right">Sales</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w60">
                                    <img src="{{ secure_url('assets/images/xs/avatar1.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
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
                            <tr>
                                <td class="w60">
                                    <img src="{{ secure_url('assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
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
                            <tr>
                                <td class="w60">
                                    <img src="{{ secure_url('assets/images/xs/avatar3.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
                                </td>
                                <td>
                                    <a href="javascript:void(0);" title="">Project 3</a>
                                    <p class="mb-0">Mike</p>
                                </td>                                    
                                <td>
                                    <span>Lorem is simply dummy text of the printing and typesetting industry.</span>
                                </td>
                                <td class="text-right">12,080</td>
                                <td class="text-right">$93</td>
                                <td class="text-right"><strong>$17,700</strong></td>
                            </tr>
                            <tr>
                                <td class="w60">
                                    <img src="{{ secure_url('assets/images/xs/avatar4.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
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
                            <tr>
                                <td class="w60">
                                    <img src="{{ secure_url('assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
                                </td>
                                <td>
                                    <a href="javascript:void(0);" title="">Project 5</a>
                                    <p class="mb-0">David McCoy</p>
                                </td>
                                <td>
                                    <span>Lorem Ipsum is simply dummy text of the printing and industry.</span>
                                </td>
                                <td class="text-right">12,080</td>
                                <td class="text-right">$93</td>
                                <td class="text-right"><strong>$17,700</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Basic Table <small>Basic example without any additional modification classes</small></h2>                            
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>USERNAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <td scope="row">4</td>
                                <td>Larry</td>
                                <td>Jellybean</td>
                                <td>@lajelly</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Larry</td>
                                <td>Kikat</td>
                                <td>@lakitkat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Striped Rows <small>Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code></small></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>USERNAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <td scope="row">4</td>
                                <td>Larry</td>
                                <td>Jellybean</td>
                                <td>@lajelly</td>
                            </tr>
                            <tr>
                                <td scope="row">5</td>
                                <td>Larry</td>
                                <td>Kikat</td>
                                <td>@lakitkat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Bordered Table <small>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</small></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>USERNAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <td scope="row">4</td>
                                <td>Larry</td>
                                <td>Jellybean</td>
                                <td>@lajelly</td>
                            </tr>
                            <tr>
                                <td scope="row">5</td>
                                <td>Larry</td>
                                <td>Kikat</td>
                                <td>@lakitkat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Hover Rows <small>Add <code>.table-hover</code> to enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.</small></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>USERNAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <td scope="row">4</td>
                                <td>Larry</td>
                                <td>Jellybean</td>
                                <td>@lajelly</td>
                            </tr>
                            <tr>
                                <td scope="row">5</td>
                                <td>Larry</td>
                                <td>Kikat</td>
                                <td>@lakitkat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

@stop