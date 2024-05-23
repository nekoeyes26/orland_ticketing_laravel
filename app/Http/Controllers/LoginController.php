<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('users.login');
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        session()->flash('gagal_login', 'Email tidak terdaftar');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
 
    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }

    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        if(Users::where('email', '=', $request->email)->first()){
            session()->flash('flash_message', 'Email sudah terdaftar');
            return redirect('/register');
        }
        $validate = $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        Users::create(array_merge($data, ['status_creator' => 0,
                                          'role' => 0]));
        session()->flash('flash_message', 'Pendaftaran akun berhasil, silahkan login');
        return redirect('/login');
    }
}
