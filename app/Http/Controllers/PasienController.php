<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatKesehatan;
use App\Models\Dokter;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', operator: $user->id)->get()[0];
        $riwayat_kesehatans = RiwayatKesehatan::where('pasien_id', operator: $pasien->id)->get();
        // dd($riwayat_kesehatans[0]->dokter->user->name);
        // $dokter = Dokter::where('user_id', operator: $user->id)->get()[0];
        $role = $user->role;    
        $userRoles = UserRole::where('role', $role)->get();
        
        $data =[
            'menu' => $userRoles,
            'name' => $user->name,
            'role' => $user->role,
            'title' => 'Dashboard',
            'pasien' => compact('pasien'),
            'riwayat_kesehatans' => compact('riwayat_kesehatans')
        ];  
        
        return view('pasien.index', compact('riwayat_kesehatans'), $data);
    }

    
    

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'usia' => 'required|integer',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'kontak' => 'required',
        ]);

        Pasien::create($validatedData);
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan');
    }
}
