<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function indexUser()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $data_user = Users::where('role', 0)->orderBy('id', 'asc')->simplePaginate(10);
        return view('admin.user.user', compact('data_user'));
    }
    public function indexCreator()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $data_creator = Creator::orderBy('id', 'asc')->simplePaginate(10);
        return view('admin.user.creator', compact('data_creator'));
    }
    
    public function account(){
        if (!Auth::user()) {
            return redirect('/');
        }

        $user = Auth::user();
        $email = $user->email;
        $data_akun = Users::where('email', $email)->first();
        return view('users.detail_akun', compact('data_akun'));
    }

    public function updateInfo(Request $request){
        $user = Auth::user();
        $email = $user->email;
        $akun = Users::where('email', $email)->first();
        $akun->nama = $request->nama;
        $akun->nomor_ponsel = $request->nomor_ponsel;
        $akun->tanggal_lahir = $request->tanggal_lahir;
        $akun->update();
        session()->flash('flash_message', 'Perubahan informasi akun berhasil disimpan');
        return redirect('detail_akun');
    }

    public function mauCreator(Request $request){
        if (!Auth::user()) {
            return redirect('/');
        }
        
        $user = Auth::user();
        $email = $user->email;
        $data_akun = Users::where('email', $email)->first();
        return view('users.jadi_creator', compact('data_akun'));
    }

    public function jadiCreator(Request $request){
        $user = Auth::user();
        $email = $user->email;
        if(Creator::where('email', '=', $email)->first()){
            $creatornya = Creator::where('email', '=', $email)->first();
            $creator = Creator::find($creatornya->id);
            $creator->nama_organizer = $request->nama_organizer;
            $creator->alamat = $request->alamat;
            $creator->nomor_ponsel = $request->nomor_ponsel;
            $creator->tentang = $request->tentang;
            $creator->nomor_ktp = $request->nomor_ktp;
            $creator->update();
            session()->flash('flash_message', 'Data creator berhasil diperbarui');
            return redirect('/');
        }
        $creator = new Creator();
        $creator->email = $email;
        $creator->nama_organizer = $request->nama_organizer;
        $creator->alamat = $request->alamat;
        $creator->nomor_ponsel = $request->nomor_ponsel;
        $creator->tentang = $request->tentang;
        $creator->nomor_ktp = $request->nomor_ktp;
        $creator->save();

        $akun = Users::where('email', $email)->first();
        $akun->status_creator = 1;
        $akun->update();
        session()->flash('flash_message', 'Berhasil beralih ke mode creator');
        return redirect('/');
    }
}
