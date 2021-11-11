@extends('layouts.user')

@push('css')

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>

        .borde {

            border-radius: 0.55rem !important;



        }



        .table td {

            border-top-width: 0px !important;

            border-top: 0px !important;

        }



        .pagination {

            display: inline-block;

        }



        .pagination li {

            color: black;

            float: left;

            padding: 8px 16px;

            text-decoration: none;

        }



        .pagination li.active {

            background-color: #4caf5000;

            color: white;

            border-radius: 5px;

        }



        .pagination li:hover:not(.active) {

            background-color: #ddd;

            border-radius: 5px;

        }



    </style>

@endpush

@section('content')



 
<script
src="https://www.paypal.com/sdk/js?client-id=AdSuJbD9cyJpGbooPSf3Z963eDNCJ1TXJVmHEB6oOXJKqpbI9S0TYyB1vHT4wuZdNtPUmP6u9LwXNUOA&disable-funding=credit,card&currency=EUR">
</script>



    <div class="xt-page-title-area">

        <div class="xt-page-title">

            <div class="container">

                <h1 class="entry-title">DashBoard</h1>

            </div>

        </div>

        <div class="xt-breadcrumb-wrapper">

            <div class="container">

                <nav class="xt-breadcrumb">

                    <ul>

                        <li><a href="#">Home</a></li>

                        <li class="current">DashBoard</li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>



    <div class="container">

        <div class="theme-main-content-inner row justify-content-center">

            <div class="row profile_page_container">

                @include('user.include.dheader')

                <div class="col-md-12 left_section_container">

                    <div class="row">

                        <br>

                            <div class="col-md-12">

                                <h3 style="text-align: left;"><i class="fa  fa-money" aria-hidden="true"></i>My Transaction</h3>



                                <table class="table table-borderless">

                                    <thead>

                                        <tr>

                                            <th scope="col">Date</th>

                                            <th scope="col">Type</th>

                                            <th scope="col">Order Id</th>

                                            <th scope="col">Amount</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($data as $item)

                                            <tr>

                                                <td>{{ $item->start_date }}</td>

                                                <td>{{ $item->type }}</td>

                                                <td>{{ $item->username }}</td>

                                                <td>€{{ $item->price }}</td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                            <div class="col-md-12 paginax">

                                {{ $data->links() }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection

@push('js')



@endpush

