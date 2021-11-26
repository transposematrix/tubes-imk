<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = [
        'user_id', 'detail', 'task',  'date', 'start_time', 'date_due', 'time_due', 'collect_time'
    ];

    public $timestamps = false;

    public function user()
    {
     return $this->belongsTo('App\User', 'user_id');
    }
}
