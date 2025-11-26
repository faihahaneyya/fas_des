<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas'; // table
    protected $primaryKey = 'id';
    protected $fillable = [ // yg bisa terisi

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
