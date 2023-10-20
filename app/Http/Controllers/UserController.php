<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view("user/register");
    }

    public function ProsesDaftar(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate ([
            "name"                  => "required",
            "email"                 => "required|unique:Users",
            "password"              => "required|min:6",
            "password_confirmation" => "required|same:password",
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password_confirmation,
        ];
        User::create($data);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->type == 1) {
                return redirect()->intended('user');
            } else {
                return redirect()->intended('home');
            }
            
        }

    }
    
    public function login()
    {
        return view("user/login");
    }

    public function authenticate(Request $request)
    {
       $credentials =  $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->type == 1) {
                return redirect()->intended('user');
            } else {
                return redirect()->intended('home');
            }
            
        }

        return back()->withErrors('Login gagal, Periksa Inputan Anda!');
        
    }


    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect("user/login")->with('success', 'Logout Berhasil. Silakan Masuk Kembali');
}
}