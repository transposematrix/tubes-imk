<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter_out extends Model
{
    protected $fillable = [
        'tanggal_surat', 'penerima', 'klasifikasi', 'perihal', 'lampiran', 'no_surat'
    ];
    public $timestamps = false;
}
