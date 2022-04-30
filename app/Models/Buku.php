<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    public $timestamps = true;


    protected $fillable = [
        'isbn',
        'judul',
        'kategori',
        'tingkatan',
        'gambar',
        'file',
    ];
}
