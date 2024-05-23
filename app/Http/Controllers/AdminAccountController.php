<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    public function register()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        return view('admin.account.register');
    }

    public function store(Request $request)
    {
        if(Users::where('email', '=', $request->email)->first()){
            return redirect('/admin/register');
        }
        
        $validate = $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        Users::create(array_merge($data, ['status_creator' => 1,
                                          'role' => 1]));
        Creator::create(['email' => $request->email,
                         'nama_organizer' => $request->nama]);
        return redirect('/admin/event/');
    }
}
