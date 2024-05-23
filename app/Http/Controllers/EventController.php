<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FormatEvent;
use App\Models\KategoriEvent;
use App\Models\Tiket;
use App\Models\TopikEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        // $data_event = Event::all()->sortByDesc('id_event');
        $data_event = Event::orderBy('id_event', 'desc')->simplePaginate(10);
        return view('admin.event.index', compact('data_event'));
    }

    public function belumAdaTiket()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $idEventsInTiket = Tiket::pluck('id_event')->toArray();

        $data_event = Event::whereNotIn('id_event', $idEventsInTiket)->orderBy('id_event', 'desc')->simplePaginate(10);
        return view('admin.event.belum_ada_tiket', compact('data_event'));
    }

    public function tersedia()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
    
        $data_event = Event::where('status_event', 0)->orderBy('id_event', 'desc')->simplePaginate(10);
        return view('admin.event.tersedia', compact('data_event'));
    }

    public function lampau()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
    
        $data_event = Event::where('status_event', 1)->orderBy('id_event', 'desc')->simplePaginate(10);
        return view('admin.event.lampau', compact('data_event'));
    }

    public function create()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $topik_event = TopikEvent::pluck('nama_topik_event', 'id_topik_event');
        $format_event = FormatEvent::pluck('nama_format_event', 'id_format_event');
        $kategori_event = KategoriEvent::pluck('nama_kategori_event', 'id_kategori_event');
        return view('admin.event.create', compact('topik_event', 'format_event', 'kategori_event'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_event' => 'required',
            'id_format_event' => 'required',
            'id_topik_event' => 'required',
            'id_kategori_event' => 'required',
            'waktu_event' => 'required',
            'lokasi_provinsi_event' => 'required',
            'lokasi_kota_event' => 'required',
            'lokasi_detail_event' => 'required',
            'deskripsi_event' => 'required',
            // 'banner_event' => 'required',
            'status_event' => 'required',
        ]);

        $this->validate($request, [
            'banner_event' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $banner_event = $request->banner_event;
        $nama_file = time().'.'.$banner_event->getClientOriginalExtension();
        $banner_event->move('banner_event/', $nama_file);
        $waktu_start = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('waktu_event'));

        $data_event = new Event;
        $data_event->nama_event = $request->nama_event;
        $data_event->id_format_event = $request->id_format_event;
        $data_event->id_topik_event = $request->id_topik_event;
        $data_event->id_kategori_event = $request->id_kategori_event;
        $data_event->waktu_event = $waktu_start;
        $data_event->lokasi_provinsi_event = app('App\Http\Controllers\RajaOngkirController')->getProvinceName($request->lokasi_provinsi_event);
        $data_event->lokasi_kota_event = app('App\Http\Controllers\RajaOngkirController')->getCityName($request->lokasi_kota_event);
        $data_event->lokasi_detail_event = $request->lokasi_detail_event;
        $data_event->deskripsi_event = $request->deskripsi_event;
        $data_event->banner_event = $nama_file;
        $data_event->status_event = $request->status_event;
        $data_event->email = $request->email;
        $data_event->save();

        session()->flash('flash_message', 'Data event berhasil disimpan');

        return redirect('/admin/tiket/create');
    }

    public function edit($id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $event = Event::findOrFail($id);
        $topik_event = TopikEvent::pluck('nama_topik_event', 'id_topik_event');
        $format_event = FormatEvent::pluck('nama_format_event', 'id_format_event');
        $kategori_event = KategoriEvent::pluck('nama_kategori_event', 'id_kategori_event');
        return view('admin.event.edit', compact('event', 'topik_event', 'format_event', 'kategori_event'));
    }

    public function update(Request $request, $id)
    {
        $data_event = Event::find($id);
        $waktu_start = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('waktu_event'));
        if ($request->has('banner_event')) {
            $banner_event = $request->banner_event;
            $nama_file = time().'.'.$banner_event->getClientOriginalExtension();
            $banner_event->move('banner_event/', $nama_file);

            $data_event->nama_event = $request->nama_event;
            $data_event->id_format_event = $request->id_format_event;
            $data_event->id_topik_event = $request->id_topik_event;
            $data_event->id_kategori_event = $request->id_kategori_event;
            $data_event->waktu_event = $waktu_start;
            $data_event->lokasi_provinsi_event = app('App\Http\Controllers\RajaOngkirController')->getProvinceName($request->lokasi_provinsi_event);
            $data_event->lokasi_kota_event = app('App\Http\Controllers\RajaOngkirController')->getCityName($request->lokasi_kota_event);
            $data_event->lokasi_detail_event = $request->lokasi_detail_event;
            $data_event->deskripsi_event = $request->deskripsi_event;
            $data_event->banner_event = $nama_file;
            $data_event->status_event = $request->status_event;
            // $data_event->email = $request->email;
            $data_event->update();
        } else {
            $data_event->nama_event = $request->nama_event;
            $data_event->id_format_event = $request->id_format_event;
            $data_event->id_topik_event = $request->id_topik_event;
            $data_event->id_kategori_event = $request->id_kategori_event;
            $data_event->waktu_event = $waktu_start;
            $data_event->lokasi_provinsi_event = app('App\Http\Controllers\RajaOngkirController')->getProvinceName($request->lokasi_provinsi_event);
            $data_event->lokasi_kota_event = app('App\Http\Controllers\RajaOngkirController')->getCityName($request->lokasi_kota_event);
            $data_event->lokasi_detail_event = $request->lokasi_detail_event;
            $data_event->deskripsi_event = $request->deskripsi_event;
            $data_event->status_event = $request->status_event;
            // $data_event->email = $request->email;
            $data_event->update();
        }

        session()->flash('flash_message', 'Data event berhasil diupdate');
        return redirect('/admin/event');
    }
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/admin/event');
    }

    public function indexCreator()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->status_creator != 1) {
            return redirect('/');
        }
        $user = Auth::user();
        $email = $user->email;
        $data_event = Event::where('email', $email)->orderBy('id_event', 'desc')->get();
        return view('creator.event.index', compact('data_event', 'user'));
    }

    public function detailEvent($id)
    {
        $event = Event::findOrFail($id);
        $data_tiket = Tiket::where('id_event', $id)->get();
        return view('event_detail', compact('event', 'data_tiket'));
    }

    public function home()
    {
        $idEventsInTiket = Tiket::pluck('id_event')->toArray();
        $event_carousel = Event::whereIn('id_event', $idEventsInTiket)
                                ->whereNotNull('banner_event')
                                ->where('status_event', 0)
                                ->orderBy('id_event', 'desc')
                                ->take(4)
                                ->get();
        $event_terlama = Event::whereIn('id_event', $idEventsInTiket)
                                ->whereNotNull('banner_event')
                                ->where('status_event', 0)
                                ->take(4)
                                ->get();
        $event_random = Event::whereIn('id_event', $idEventsInTiket)
                                ->whereNotNull('banner_event')
                                ->where('status_event', 0)
                                ->inRandomOrder()
                                ->take(4)
                                ->get();
        $today = Carbon::now();
        $weekAhead = $today->addDays(7);

        $event_terdekat = Event::whereIn('id_event', $idEventsInTiket)
                            ->whereNotNull('banner_event')
                            ->where('status_event', 0)
                            ->whereDate('waktu_event', '<', $weekAhead)
                            ->take(4)
                            ->get();
        return view('index', compact('event_carousel', 'event_terlama', 'event_random', 'event_terdekat'));
    }

    public function jelajah()
    {
        $idEventsInTiket = Tiket::pluck('id_event')->toArray();
        $data_event = Event::whereIn('id_event', $idEventsInTiket)->whereNotNull('banner_event')->where('status_event', 0)->get();
        return view('jelajah', compact('data_event'));
    }

    public function creatorCreate()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->status_creator != 1) {
            return redirect('/');
        }
        $topik_event = TopikEvent::pluck('nama_topik_event', 'id_topik_event');
        $format_event = FormatEvent::pluck('nama_format_event', 'id_format_event');
        $kategori_event = KategoriEvent::pluck('nama_kategori_event', 'id_kategori_event');
        return view('creator.event.create', compact('topik_event', 'format_event', 'kategori_event'));
    }

    public function creatorStore(Request $request)
    {
        $this->validate($request, [
            'nama_event' => 'required',
            'id_format_event' => 'required',
            'id_topik_event' => 'required',
            'id_kategori_event' => 'required',
            'waktu_event' => 'required',
            'lokasi_provinsi_event' => 'required',
            'lokasi_kota_event' => 'required',
            'lokasi_detail_event' => 'required',
            'deskripsi_event' => 'required',
            // 'banner_event' => 'required',
            'status_event' => 'required',
        ]);

        $this->validate($request, [
            'banner_event' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $banner_event = $request->banner_event;
        $nama_file = time().'.'.$banner_event->getClientOriginalExtension();
        $banner_event->move('banner_event/', $nama_file);
        $waktu_start = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('waktu_event'));

        $data_event = new Event;
        $data_event->nama_event = $request->nama_event;
        $data_event->id_format_event = $request->id_format_event;
        $data_event->id_topik_event = $request->id_topik_event;
        $data_event->id_kategori_event = $request->id_kategori_event;
        $data_event->waktu_event = $waktu_start;
        $data_event->lokasi_provinsi_event = app('App\Http\Controllers\RajaOngkirController')->getProvinceName($request->lokasi_provinsi_event);
        $data_event->lokasi_kota_event = app('App\Http\Controllers\RajaOngkirController')->getCityName($request->lokasi_kota_event);
        $data_event->lokasi_detail_event = $request->lokasi_detail_event;
        $data_event->deskripsi_event = $request->deskripsi_event;
        $data_event->banner_event = $nama_file;
        $data_event->status_event = $request->status_event;
        $data_event->email = $request->email;
        $data_event->save();

        session()->flash('flash_message', 'Data event berhasil disimpan');

        return redirect('/creator/event');
    }

    public function creatorEdit($id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        if (Auth::user()->status_creator != 1) {
            return redirect('/');
        }
        $event = Event::findOrFail($id);
        $topik_event = TopikEvent::pluck('nama_topik_event', 'id_topik_event');
        $format_event = FormatEvent::pluck('nama_format_event', 'id_format_event');
        $kategori_event = KategoriEvent::pluck('nama_kategori_event', 'id_kategori_event');
        return view('creator.event.edit', compact('event', 'topik_event', 'format_event', 'kategori_event'));
    }

    public function creatorUpdate(Request $request, $id)
    {
        $data_event = Event::find($id);
        $waktu_start = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('waktu_event'));
        if ($request->has('banner_event')) {
            $banner_event = $request->banner_event;
            $nama_file = time().'.'.$banner_event->getClientOriginalExtension();
            $banner_event->move('banner_event/', $nama_file);

            $data_event->nama_event = $request->nama_event;
            $data_event->id_format_event = $request->id_format_event;
            $data_event->id_topik_event = $request->id_topik_event;
            $data_event->id_kategori_event = $request->id_kategori_event;
            $data_event->waktu_event = $waktu_start;
            $data_event->lokasi_provinsi_event = app('App\Http\Controllers\RajaOngkirController')->getProvinceName($request->lokasi_provinsi_event);
            $data_event->lokasi_kota_event = app('App\Http\Controllers\RajaOngkirController')->getCityName($request->lokasi_kota_event);
            $data_event->lokasi_detail_event = $request->lokasi_detail_event;
            $data_event->deskripsi_event = $request->deskripsi_event;
            $data_event->banner_event = $nama_file;
            $data_event->status_event = $request->status_event;
            // $data_event->email = $request->email;
            $data_event->update();
        } else {
            $data_event->nama_event = $request->nama_event;
            $data_event->id_format_event = $request->id_format_event;
            $data_event->id_topik_event = $request->id_topik_event;
            $data_event->id_kategori_event = $request->id_kategori_event;
            $data_event->waktu_event = $waktu_start;
            $data_event->lokasi_provinsi_event = app('App\Http\Controllers\RajaOngkirController')->getProvinceName($request->lokasi_provinsi_event);
            $data_event->lokasi_kota_event = app('App\Http\Controllers\RajaOngkirController')->getCityName($request->lokasi_kota_event);
            $data_event->lokasi_detail_event = $request->lokasi_detail_event;
            $data_event->deskripsi_event = $request->deskripsi_event;
            $data_event->status_event = $request->status_event;
            // $data_event->email = $request->email;
            $data_event->update();
        }

        session()->flash('flash_message', 'Data event berhasil diupdate');
        return redirect('/creator/event');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $idEventsInTiket = Tiket::pluck('id_event')->toArray();
        $data_event = Event::whereIn('id_event', $idEventsInTiket)
                            ->whereNotNull('banner_event')
                            ->where('status_event', 0)
                            ->where('nama_event', 'LIKE', "%$keyword%")
                            ->get();
        return view('search-results', compact('data_event'));
    }
}
