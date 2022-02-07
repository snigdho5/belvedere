<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    function blank()                                {return view('admin.pages.blank');}
    function searchresults()                        {return view('admin.pages.searchresults');}
    function profile()                              {return view('admin.pages.profile');}
    function invoices()                             {return view('admin.pages.invoices');}
    function invoicesview()                         {return view('admin.pages.invoicesview');}
    function gallery()                              {return view('admin.pages.gallery');}
    function timeline()                             {return view('admin.pages.timeline');}
    function pricing()                              {return view('admin.pages.pricing');}
    function settings()                             {return view('admin.pages.settings');}
}