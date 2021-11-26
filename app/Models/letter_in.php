<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter_in extends Model
{
    protected $fillable = [
        'tanggal_terima', 'tanggal_surat', 'nomor_surat', 'pengirim', 'klasifikasi', 'perihal', 'lampiran'
    ];
    public $timestamps = false;
}
