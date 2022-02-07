<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WidgetsController extends Controller
{
    function widget()                        {return view('admin.widgets.widget');}
}
