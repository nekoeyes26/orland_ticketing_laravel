<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['email', 'nama', 'password', 'nomor_ponsel', 'tanggal_lahir', 'status_creator', 'role'];

    public function creator(){
        return $this->hasOne('App\Models\Creator', 'email');
    }

    public function tiket_user(){
        return $this->hasMany('App\Models\TiketUser', 'email');
    }
    
    public function pembelian(){
        return $this->hasMany('App\Models\Pembelian', 'email');
    }
}
