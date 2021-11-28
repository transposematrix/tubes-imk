<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organizer extends Model
{
    protected $fillable = [
        'name', 'faculty', 'batch', 'photo', 'position', 'period'
        ];

    public $timestamps = false;

    public function faculties()
    {
     return $this->belongsTo('App\User', 'faculty');
    }

    public function names()
    {
        return $this->belongsTo('App\User', 'name');
    }

    public function batches()
    {
        return $this->belongsTo('App\User', 'batch');
    }

    public function photos()
    {
        return $this->belongsTo('App\User', 'photo');
    }

    public function positions()
    {
        return $this->belongsTo('App\Models\position', 'position');
    }
}
