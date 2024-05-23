<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $table = 'creator';
    protected $fillable = ['email', 'nama_organizer', 'alamat', 'nomor_ponsel', 'tentang', 'nomor_ktp'];

    public function users(){
        return $this->belongsTo('App\Models\Users', 'email');
    }

    public function event(){
        return $this->hasManyo('App\Models\Event', 'email');
    }
}
