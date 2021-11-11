<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    function index()                        {return view('admin.dashboard.index');}
    function cryptocurrency()               {return view('admin.dashboard.cryptocurrency');}
    function campaign()                     {return view('admin.dashboard.campaign');}
    function ecommerce()                    {return view('admin.dashboard.ecommerce');}
}
  