<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';
    protected $fillable = ['id_event', 'id_tiket', 'email'];

    public function event(){
        return $this->belongsTo('App\Models\Event', 'id_event');
    }

    public function tiket(){
        return $this->belongsTo('App\Models\Tiket', 'id_tiket');
    }

    public function users(){
        return $this->belongsTo('App\Models\Users', 'email');
    }
}
