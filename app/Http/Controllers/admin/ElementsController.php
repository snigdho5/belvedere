<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ElementsController extends Controller
{
    function helperclass()                        {return view('admin.elements.helperclass');}
    function bootstrap()                          {return view('admin.elements.bootstrap');}
    function typography()                         {return view('admin.elements.typography');}
    function tabs()                               {return view('admin.elements.tabs');}
    function buttons()                            {return view('admin.elements.buttons');}
    function icons()                              {return view('admin.elements.icons');}
    function notifications()                      {return view('admin.elements.notifications');}
    function colors()                             {return view('admin.elements.colors');}
    function dialogs()                            {return view('admin.elements.dialogs');}
    function listgroup()                          {return view('admin.elements.listgroup');}
    function mediaobject()                        {return view('admin.elements.mediaobject');}
    function modals()                             {return view('admin.elements.modals');}
    function nestable()                           {return view('admin.elements.nestable');}
    function progressbars()                       {return view('admin.elements.progressbars');}
    function rangesliders()                       {return view('admin.elements.rangesliders');}
}
