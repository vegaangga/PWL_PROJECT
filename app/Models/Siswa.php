<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table='siswa';

    protected $fillable=[
        'Id',
        'User_id',
        'NISN',
        'Nama',
        'email',
        'No_telp',
        'Foto',
        'Tgl_lahir',
        'Tempat_lahir',
        'Alamat',
        'Asal_sekolah',
        'Status_ayah',
        'Nama_ayah',
        'Nik_ayah',
        'Pekerjaan_ayah',
        'Gaji_ayah',
        'Status_ibu',
        'Nama_ibu',
        'Nik_ibu',
        'Pekerjaan_ibu',
        'Gaji_ibu'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
