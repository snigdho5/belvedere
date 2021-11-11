<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    function inbox()                        {return view('admin.apps.inbox');}
    function inboxdetail()                  {return view('admin.apps.inboxdetail');}
    function inboxcompose()                 {return view('admin.apps.inboxcompose');}

    function chat()                         {return view('admin.apps.chat');}
    function calendar()                     {return view('admin.apps.calendar');}
    function events()                       {return view('admin.apps.events');}
    function todolist()                     {return view('admin.apps.todolist');}
    function filemanager()                  {return view('admin.apps.filemanager');}
    function contacts()                     {return view('admin.apps.contacts');}
    function scrumboard()                   {return view('admin.apps.scrumboard');}
    function blog()                         {return view('admin.apps.blog');}
    function social()                       {return view('admin.apps.social');}
}
