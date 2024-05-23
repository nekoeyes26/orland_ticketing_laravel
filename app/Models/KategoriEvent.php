<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriEvent extends Model
{
    use HasFactory;

    protected $table = 'kategori_event';
    protected $fillable = ['nama_kategori_event'];
    protected $primaryKey = 'id_kategori_event';

    public function event(){
        return $this->hasMany('App\Models\Event', 'id_kategori_event');
    }
}
