<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
 


use Illuminate\Routing\Controller as BaseController;

class AuthenticationController extends BaseController
{
    function login()                { return view('admin.authentication.login');}
    function register()             { return view('admin.authentication.register');}
    function forgotpassword()       { return view('admin.authentication.forgotpassword');}
    function error404()             { return view('admin.authentication.error404');}
}