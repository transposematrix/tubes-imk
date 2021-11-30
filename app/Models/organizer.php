<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organizer extends Model
{
    protected $fillable = [
        'user_id', 'position', 'period'
        ];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function positions()
    {
        return $this->belongsTo('App\Models\position', 'position');
    }
}
