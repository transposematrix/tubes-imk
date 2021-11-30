<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = [
        'title', 'sidebar_title', 'photo', 'excerpt', 'article', 'publicate_date', 'created_at', 'updated_at'
    ];


    public function comment()
    {
        return $this->hasMany('App\Models\comment');
    }
}
