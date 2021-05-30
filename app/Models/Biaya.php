<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    protected $table='biaya_daftar';

    protected $fillable=[
        'nama',
        'email',
        'struk',
        'status'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
