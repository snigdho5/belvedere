<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartsController extends Controller
{
    function apex()                        {return view('admin.charts.apex');}
    function c_chart()                     {return view('admin.charts.c_chart');}
    function morris()                      {return view('admin.charts.morris');}
    function flot()                        {return view('admin.charts.flot');}
    function chartjs()                     {return view('admin.charts.chartjs');}
    function knob()                        {return view('admin.charts.knob');}
    function sparkline()                   {return view('admin.charts.sparkline');}
}