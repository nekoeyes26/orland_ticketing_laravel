<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\TiketUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TiketController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $data_tiket = Tiket::orderBy('id_tiket', 'desc')->simplePaginate(10);
        return view('admin.tiket.index', compact('data_tiket'));
    }

    public function tersedia()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $data_tiket = Tiket::where('status_tiket', 1)->orderBy('id_tiket', 'desc')->simplePaginate(10);
        return view('admin.tiket.tersedia', compact('data_tiket'));
    }

    public function tidakTersedia()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $data_tiket = Tiket::where('status_tiket', 0)->orderBy('id_tiket', 'desc')->simplePaginate(10);
        return view('admin.tiket.tidak_tersedia', compact('data_tiket'));
    }

    public function create()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $event = Event::pluck('nama_event', 'id_event');
        return view('admin.tiket.create', compact('event'));
    }
    public function store(Request $request){
        $batas_waktu = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('batas_waktu'));
        $tiket = new Tiket();
        $tiket->id_event = $request->id_event;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->deskripsi_tiket = $request->deskripsi_tiket;
        $tiket->harga_tiket = $request->harga_tiket;
        $tiket->stock_tiket = $request->stock_tiket;
        $tiket->batas_waktu = $batas_waktu;
        $tiket->status_tiket = $request->status_tiket;
        $tiket->save();

        session()->flash('flash_message', 'tiket berhasil disimpan');
        return redirect('/admin/tiket');
    }

    public function edit($id){
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $tiket = Tiket::findOrFail($id);
        return view('admin.tiket.edit', compact('tiket'));
    }

    public function update(Request $request, $id){
        $batas_waktu = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('batas_waktu'));
        $tiket = Tiket::find($id);
        $tiket->id_event = $request->id_event;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->deskripsi_tiket = $request->deskripsi_tiket;
        $tiket->harga_tiket = $request->harga_tiket;
        $tiket->stock_tiket = $request->stock_tiket;
        $tiket->batas_waktu = $batas_waktu;
        $tiket->status_tiket = $request->status_tiket;
        $tiket->update();
        return redirect('/admin/tiket');
    }

    public function createCreator($id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->status_creator != 1) {
            return redirect('/');
        }
        $event = Event::find($id);
        return view('creator.tiket.create', compact('event'));
    }

    public function storeCreator(Request $request){
        $batas_waktu = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('batas_waktu'));
        $tiket = new Tiket();
        $tiket->id_event = $request->id_event;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->deskripsi_tiket = $request->deskripsi_tiket;
        $tiket->harga_tiket = $request->harga_tiket;
        $tiket->stock_tiket = $request->stock_tiket;
        $tiket->batas_waktu = $batas_waktu;
        $tiket->status_tiket = $request->status_tiket;
        $tiket->save();

        session()->flash('flash_message', 'tiket berhasil disimpan');
        return redirect('/creator/event');
    }

    public function editCreator($id){
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->status_creator != 1) {
            return redirect('/');
        }
        $tiket = Tiket::findOrFail($id);
        return view('creator.tiket.edit', compact('tiket'));
    }

    public function updateCreator(Request $request, $id){
        $batas_waktu = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('batas_waktu'));
        $tiket = Tiket::find($id);
        $tiket->id_event = $request->id_event;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->deskripsi_tiket = $request->deskripsi_tiket;
        $tiket->harga_tiket = $request->harga_tiket;
        $tiket->stock_tiket = $request->stock_tiket;
        $tiket->batas_waktu = $batas_waktu;
        $tiket->status_tiket = $request->status_tiket;
        $tiket->update();
        return redirect('/creator/event');
    }
}
