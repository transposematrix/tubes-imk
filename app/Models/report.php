<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
       'creator', 'event', 'perihal',  'tgl_laporan', 'file_laporan', 'tgl_pengesahan'
    ];
    public $timestamps = false;
}
