<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    function vectormap()                        {return view('admin.map.vectormap');}}
