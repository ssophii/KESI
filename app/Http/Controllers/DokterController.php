<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\UserRole;
use App\Models\RiwayatKesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokter = Dokter::where('user_id', operator: $user->id)->get()[0];
        $riwayat_kesehatans = RiwayatKesehatan::where('dokter_id', operator: $dokter->id)->get();
        $role = $user->role;    
        $userRoles = UserRole::where('role', $role)->get();
        
        $data =[
            'menu' => $userRoles,
            'name' => $user->name,
            'role' => $user->role,
            'title' => 'Dashboard',
            'dokter' => compact('dokter'),
            'riwayat_kesehatans' => compact('riwayat_kesehatans')
        ];
        return view('dokter.index', compact('riwayat_kesehatans'), $data);
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'kontak' => 'required',
        ]);

        Dokter::create($validatedData);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan');
    }
}
