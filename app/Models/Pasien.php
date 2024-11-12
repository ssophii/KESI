<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = 
                           ['user_id', 
                            'usia', 
                            'jenis_kelamin', 
                            'pekerjaan', 
                            'alamat', 
                            'penanggungjawab', 
                            'hubungan',
                            'no_hp'
                           ];

    public function riwayatKesehatan()
    {
        return $this->hasMany(RiwayatKesehatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
