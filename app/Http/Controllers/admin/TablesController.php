<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TablesController extends Controller
{
    function normal()                        {return view('admin.tables.normal');}
    function datatable()                     {return view('admin.tables.datatable');}
    function editable()                      {return view('admin.tables.editable');}
    function tablecolor()                    {return view('admin.tables.tablecolor');}
    function filter()                        {return view('admin.tables.filter');}
    function dragger()                       {return view('admin.tables.dragger');}
}
