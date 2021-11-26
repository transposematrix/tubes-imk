<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi_assignment extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function absen()
    {
        return $this->belongsTo('App\Models\Absensi', 'absensi_id');
    }
}
