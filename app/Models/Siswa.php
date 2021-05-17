<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table='coba_siswa';

    protected $fillable=[
        'nisn',
        'nama',
        'jenis_kelamin',
        'tgl_lahir',
        'no_handphone'
    ];
}
