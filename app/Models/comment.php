<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'blog_id', 'name', 'email', 'comment', 'created_at'
    ];
    public function blogs()
    {
        return $this->belongsTo('App\Models\blog', 'blog_id');
    }
}
