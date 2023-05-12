<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // login sayfasinin acilmasi icin function
    public function login(){
        return view('back.auth.login');
    }

    // postdan gelen email sifrenin dogruluguna gore login yonlendirme function
    public function loginPost(Request $request){
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route("admin.dashboard");
        }
        return redirect()->route('admin.login')->withErrors('Email ve ya Sifre hatali!'); // login zamani sifre ve ya email hatasi yakalama
    }

    //logout icin function
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
