<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nim', 'batch', 'category', 'phone', 'levelUser', 'levelAdmin', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function absensi()
    {
        return $this->hasMany('App\Models\absensi');
    }

    public function task()
    {
        return $this->hasMany('App\Models\task');
    }

    public function organizer()
    {
        return $this->hasMany('App\Models\organizer');
    }

    public function afterglow()
    {
        return $this->hasMany('App\Models\afterglow');
    }

    public function achievement()
    {
        return $this->hasMany('App\Models\achievement');
    }

}
