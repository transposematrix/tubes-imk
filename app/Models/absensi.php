<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'user_id', 'detail', 'date', 'start_time', 'time_due', 'attend_time'
    ];

    public $timestamps = false;

    public function user()
    {
     return $this->belongsTo('App\User', 'user_id');
    }
    
}
