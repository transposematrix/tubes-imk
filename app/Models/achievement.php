<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achievement extends Model
{
    protected $fillable = [
        'users_id', 'competitions_id', 'champion_description'
        ]; 

    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function competitions()
    {
        return $this->belongsTo('App\Models\competition', 'competitions_id');
    }

}
