<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authLogin()
    {
        if(isset($_POST['authLogin']))
        {
            
        }
        else
        {
            return view('auth.login');
        }
    }

    public function authRegister()
    {
        if(isset($_POST['authRegister']))
        {
            
        }
        else
        {
            return view('auth.register');
        }
    }
}
