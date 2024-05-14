<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'rayon', 
        'keterangan', 
        'deskripsi',
        'tanggal_pinjam',
        'guru',
        'done_time',
        'status',

    ];
}
