<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $fillable = [
        'id', 'position_name'
        ];

    public function organizers()
    {
        return $this->hasMany('App\Models\organizer');
    }

}
