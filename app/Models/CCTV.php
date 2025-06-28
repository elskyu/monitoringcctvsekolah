<?php

namespace App\Models;
// ini buat data cctv
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cctv extends Model
{
    protected $fillable = [
        'namaWilayah',
        'namaTitik',
        'link',
    ];
    use HasFactory;
}
