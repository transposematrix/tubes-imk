<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regulartraining extends Model
{
    protected $fillable = [
        'photo', 'title'
    ];
    public $timestamps = false;
}
