<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable = [
        'title', 'gambar', 'description', 'matter', 'created_at', 'updated_at'
    ];

}
