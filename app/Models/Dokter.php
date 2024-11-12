<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'spesialisasi', 'kontak'];

    public function riwayatKesehatan()
    {
        return $this->hasMany(RiwayatKesehatan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
