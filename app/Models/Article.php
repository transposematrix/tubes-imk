<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = [
        'title', 'gambar', 'content', 'description', 'kategori_id', 'created_at', 'updated_at'
    ];

    public function kategoris()
    {
        return $this->belongsTo('App\Models\kategori', 'kategori_id');
    }
    
}