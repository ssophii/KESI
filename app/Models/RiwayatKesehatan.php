<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatKesehatan extends Model
{
    use HasFactory;

    protected $fillable = [ 'pasien_id', 
                            'dokter_id', 
                            'tanggal_kunjungan', 
                            'diagnosis', 'tindakan', 
                            'catatan_tambahan'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
    
}
