<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achievement extends Model
{
    public function names()
    {
        return $this->belongsTo('App\Models\User', 'name');
    }
    public function faculties()
    {
        return $this->belongsTo('App\Models\User', 'faculty');
    }
    public function batches()
    {
        return $this->belongsTo('App\Models\User', 'batch');
    }
    public function photos()
    {
        return $this->belongsTo('App\Models\User', 'photo');
    }
    public function competitions()
    {
        return $this->belongsTo('App\Models\competition', 'competition');
    }

}
