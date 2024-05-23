<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatEvent extends Model
{
    use HasFactory;

    protected $table = 'format_event';
    protected $fillable = ['nama_format_event'];
    protected $primaryKey = 'id_format_event';

    public function event(){
        return $this->hasMany('App\Models\Event', 'id_format_event');
    }
}
