<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        else{
            return back()->with('message', 'Hatalı Giriş');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function signup_post(Request $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->role = "2";
        $user->password = bcrypt(request()->password);
        $user->save();

        toastr()->success('Kullanıcı Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('anasayfa');
    }
}
