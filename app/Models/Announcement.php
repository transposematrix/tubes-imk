<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title', 'gambar', 'content', 'description', 'kategori_id', 'created_at', 'updated_at'
    ];
}
