<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';
    protected $fillable = ['nama_event', 'id_format_event', 'id_topik_event', 'id_kategori_event', 'waktu_event', 'lokasi_provinsi_event',
                            'lokasi_kota_event', 'lokasi_detail_event', 'deskripsi_event', 'banner_event', 'status_event'];
    protected $primaryKey = 'id_event';

    public function tiket()
    {
        return $this->hasMany('App\Models\Tiket', 'id_event');
    }

    public function pembelian()
    {
        return $this->hasMany('App\Models\Pembelian', 'id_event');
    }

    public function format_event()
    {
        return $this->belongsTo('App\Models\FormatEvent', 'id_format_event');
    }

    public function topik_event()
    {
        return $this->belongsTo('App\Models\TopikEvent', 'id_topik_event');
    }

    public function kategori_event()
    {
        return $this->belongsTo('App\Models\KategoriEvent', 'id_kategori_event');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\Creator', 'email');
    }
}
