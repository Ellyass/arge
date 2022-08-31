<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use Illuminate\Support\Facades\View;

class DefaultController extends Controller
{
    public function index()
    {
        return view('backend.default.index');
    }

    public function login()
    {
        return view('backend.default.login');
    }


    public function  authenticate(Request $request)
    {
        $offers = Offer::all();
        $request->flash();

        $credentials=$request->only('email','password');
        $remember_me=$request->has('remember_me') ? true : false  ;

        if (Auth::attempt($credentials,$remember_me))
        {
            return view('backend.default.index')->with('success','Giriş Başarılı');
        } else {
            return back()->with('error','Hatalı Giriş');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('admin_Login'))->with('success','Güvenli Çıkış Yapıldı');
    }
}

