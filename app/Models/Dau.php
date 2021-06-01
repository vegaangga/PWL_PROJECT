<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dau extends Model
{
    use HasFactory;

    protected $table='siswa';

    protected $fillable=[
        'NISN',
        'name',
        'email',
        'No_telp',
        'struk'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
