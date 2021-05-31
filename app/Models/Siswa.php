<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table='siswa';

    protected $fillable=[
        'NISN',
        'Nama',
        'Alamat',
        'Asal_sekolah',
        'email',
        'No_telp'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
