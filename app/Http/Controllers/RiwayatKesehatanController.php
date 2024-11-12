<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKesehatan;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RiwayatKesehatanController extends Controller
{
    public function index()
    {
        $riwayats = RiwayatKesehatan::with(['pasien', 'dokter'])->get();
        return view('riwayat.index', compact('riwayats'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('riwayat.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'diagnosis' => 'required',
            'tindakan' => 'required',
            'catatan_tambahan' => 'nullable',
        ]);

        RiwayatKesehatan::create($validatedData);
        return redirect()->route('riwayat.index')->with('success', 'Riwayat kesehatan berhasil ditambahkan');
    }
}
