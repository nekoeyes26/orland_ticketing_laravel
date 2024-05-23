<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pembelian;
use App\Models\Tiket;
use App\Models\TiketUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function toBilling(Request $request){
        if (!Auth::user()) {
            return redirect('/login');
        }
        session(['jumlah_tiket' => $request->jumlah]);
        // $request->session()->flash('jumlah_tiket', $request->jumlah);
        // $jumlah = $request->session()->get('jumlah_tiket');
        $user = Auth::user();
        $email = $user->email;
        $data_user = User::where('email', $email)->first();
        $event = Event::findOrFail($request->id_event);        
        $tiket = Tiket::findOrFail($request->id_tiket);
        return view('billing', compact('data_user', 'event', 'tiket'));
    }

    public function store(Request $request){
        for($i = 0; $i < session()->get('jumlah_tiket'); $i++){
            $pembelian = new Pembelian();
            $pembelian->id_event = $request->id_event;
            $pembelian->id_tiket = $request->id_tiket;
            $pembelian->email = $request->email;
            $pembelian->save();

            $tiket = Tiket::find($request->id_tiket);
            $tiket->stock_tiket = $tiket->stock_tiket - 1;
            if($tiket->stock_tiket - 1 == 0){
                $tiket->status_tiket = 0;
            }
            $tiket->update();
        }

        $tiket_user = new TiketUser();
        $tiket_user->email = $request->email;
        $tiket_user->id_tiket = $request->id_tiket;
        $tiket_user->kuantitas = session()->get('jumlah_tiket');
        $tiket_user->status = 1;
        $tiket_user->save();

        session()->forget('jumlah_tiket');
        return redirect('tiket-saya');
    }

    public function riwayatPembelianUser(){
        if (!Auth::user()) {
            return redirect('/login');
        }
        
        $user = Auth::user();
        $email = $user->email;
        $riwayat_user = Pembelian::where('email', $email)->get();
        return view('users.riwayat_pembelian', compact('riwayat_user'));
    }
}
