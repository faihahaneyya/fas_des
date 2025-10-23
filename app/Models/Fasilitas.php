<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_fasilitas',
        'kapasitas',
        'lokasi',
        'status',
        'deskripsi'
    ];

    protected $casts = [
        'kapasitas' => 'integer'
    ];
}
