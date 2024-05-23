<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikEvent extends Model
{
    use HasFactory;

    protected $table = 'topik_event';
    protected $fillable = ['nama_topik_event'];
    protected $primaryKey = 'id_topik_event';

    public function event(){
        return $this->hasMany('App\Models\Topik', 'id_topik_event');
    }
}
