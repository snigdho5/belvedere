<?php


namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FormsController extends Controller
{
    function formsbasic()                        {return view('admin.forms.formsbasic');}
    function advanced()                          {return view('admin.forms.advanced');}
    function validation()                        {return view('admin.forms.validation');}
    function wizard()                            {return view('admin.forms.wizard');}
    function dragdropupload()                    {return view('admin.forms.dragdropupload');}
    function cropping()                          {return view('admin.forms.cropping');}
    function summernote()                        {return view('admin.forms.summernote');}
    function editors()                           {return view('admin.forms.editors');}
    function markdown()                          {return view('admin.forms.markdown');}
}
