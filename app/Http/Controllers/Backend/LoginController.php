<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function authenticate(Request $request)
    {
        $login = $request->only('email','password');

        if(Auth::attempt($login))
        {
            return redirect(route('admin.Index'));
        }
        else
        {
            $request->flash();
            return back()->with('error','E-mail veya Şifre yanlış');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin_Login'));
    }
}
