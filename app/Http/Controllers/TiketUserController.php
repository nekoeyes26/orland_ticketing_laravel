<?php

namespace App\Http\Controllers;

use App\Models\TiketUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketUserController extends Controller
{
    public function userTicket(){
        if (!Auth::user()) {
            return redirect('/');
        }
        $user = Auth::user();
        $email = $user->email;
        $tiket_user = TiketUser::where('email', $email)->get();
        return view('user_ticket', compact('tiket_user'));
    }

    public function update(Request $request, $id){
        $tiket_user = TiketUser::find($id);
        $tiket_user->status = 0;
        $tiket_user->update();
        return redirect('tiket-saya');
    }
}
