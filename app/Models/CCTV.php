<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cctv extends Model
{
    protected $fillable = [
        'namaWilayah',
        'namaTitik',
        'nomorKamera',
        'link',
    ];
    use HasFactory;
}
