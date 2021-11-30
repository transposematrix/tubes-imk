<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    public function achievements()
    {
        return $this->hasMany('App\Models\achievement');
    }
    public function afterglows()
    {
        return $this->hasMany('App\Models\afterglow');
    }
}
