<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketUser extends Model
{
    use HasFactory;

    protected $table = 'tiket_user';
    protected $fillable = ['email', 'id_tiket', 'kuantitas', 'status'];

    public function tiket(){
        return $this->belongsTo('App\Models\Tiket', 'id_tiket');
    }

    public function users(){
        return $this->belongsTo('App\Models\Users', 'email');
    }
}
