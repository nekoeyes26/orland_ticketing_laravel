<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $fillable = ['id_event', 'nama_tiket', 'deskripsi_tiket', 'harga_tiket',
                            'stock_tiket', 'batas_waktu', 'status_tiket'];
    protected $primaryKey = 'id_tiket';

    public function event(){
        return $this->belongsTo('App\Models\Event', 'id_event');
    }

    public function pembelian(){
        return $this->hasMany('App\Models\Pembelian', 'id_tiket');
    }

    public function tiket_user(){
        return $this->hasMany('App\Models\TiketUser', 'id_tiket');
    }
}
