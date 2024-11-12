<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\UserRole;
use App\Models\Dokter;
use App\Models\Pasien;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $role = $user->role;    
        $userRoles = UserRole::where('role', $role)->get();
        $dokters = Dokter::with('user')->get();
        $data =[
            'menu' => $userRoles,
            'name' => $user->name,
            'role' => $user->role,
            'title' => 'Dashboard',
        ];

        return view('admin.index', compact('dokters'), $data);
    }
    

    public function riwayatKesehatan()
    {
        $user = Auth::user();

        $role = $user->role;    
        $userRoles = UserRole::where('role', $role)->get();
        // $pasiens = Pasien::with('user')->get();
        $riwayatKesehatans = RiwayatKesehatan::with('dokter.user', 'pasien.user')->get();
        $data =[
            'menu' => $userRoles,
            'name' => $user->name,
            'role' => $user->role,
            'title' => 'Riwayat Kesehatan',
        ];  
        return view('admin.riwayat-kesehatan', compact('riwayatKesehatans'), $data);
    }

    public function updateRiwayat(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'usia' => 'required|integer',
            'jenis_kelamin' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'penanggungjawab' => 'required|string|max:255',
            'hubungan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'diagnosa' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string|max:255',
            'obat' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            // Tambahkan validasi sesuai kebutuhan
        ]);

        // Temukan data riwayat berdasarkan ID
        $riwayat = RiwayatKesehatan::findOrFail($id);

        // Update data
        $riwayat->pasien->usia = $request->input('usia');
        $riwayat->pasien->jenis_kelamin = $request->input('jenis_kelamin');
        $riwayat->pasien->pekerjaan = $request->input('pekerjaan');
        $riwayat->pasien->alamat = $request->input('alamat');
        $riwayat->pasien->penanggungjawab = $request->input('penanggungjawab');
        $riwayat->pasien->hubungan = $request->input('hubungan');
        $riwayat->pasien->no_hp = $request->input('no_hp');
        $riwayat->diagnosa = $request->input('diagnosa');
        $riwayat->tanggal = $request->input('tanggal');
        $riwayat->tindakan = $request->input('tindakan');
        $riwayat->obat = $request->input('obat');
        // $riwayat->tindakan = $request->input('tindakan');
        $riwayat->keterangan = $request->input('keterangan');
        // Tambahkan update field lainnya
        $riwayat->save();

        return redirect()->back()->with('success', 'Riwayat kesehatan berhasil diperbarui.');
    }

    public function deleteRiwayat($id)
    {
        // Temukan dan hapus data riwayat berdasarkan ID
        $riwayat = RiwayatKesehatan::findOrFail($id);
        $riwayat->delete();

        return redirect()->back()->with('success', 'Riwayat kesehatan berhasil dihapus.');
    }

    public function storeRiwayat(Request $request)
{
    // Validasi input data
    $request->validate([
        'nama_pasien' => 'required|string|max:255',
        'nama_dokter' => 'required|string|max:255',
        'diagnosa' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'usia' => 'required|integer',
        'jenis_kelamin' => 'required|string|max:255',
        'pekerjaan' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'penanggungjawab' => 'required|string|max:255',
        'hubungan' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
        'tindakan' => 'required|string|max:255',
        'obat' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'email_pasien' => 'required|email|unique:users,email',
        'email_dokter' => 'required|email|unique:users,email',
        'spesialisasi' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
    ]);

    // Menyimpan atau mencari user pasien
    $pasienUser = \App\Models\User::firstOrCreate(
        ['email' => $request->input('email_pasien')],
        [
            'name' => $request->input('nama_pasien'),
            'password' => bcrypt('default_password'),
            'role' => 'pasien'
        ]
    );

    // Menyimpan atau mencari user dokter
    $dokterUser = \App\Models\User::firstOrCreate(
        ['email' => $request->input('email_dokter')],
        [
            'name' => $request->input('nama_dokter'),
            'password' => bcrypt('default_password'),
            'role' => 'dokter'
        ]
    );

    // Pastikan pasienUser dan dokterUser valid
    if (!$pasienUser || !$dokterUser) {
        return redirect()->back()->withErrors('Gagal menyimpan data pasien atau dokter.');
    }

    // Cek dan pastikan ada entri terkait untuk pasien dan dokter di tabel Pasien dan Dokter
    $pasien = Pasien::firstOrCreate(['user_id' => $pasienUser->id], [
        'usia' => $request->input('usia'),
        'jenis_kelamin' => $request->input('jenis_kelamin'),
        'pekerjaan' => $request->input('pekerjaan'),
        'alamat' => $request->input('alamat'),
        'penanggungjawab' => $request->input('penanggungjawab'),
        'hubungan' => $request->input('hubungan'),
        'no_hp' => $request->input('no_hp')
    ]);

    $dokter = Dokter::firstOrCreate(['user_id' => $dokterUser->id], [
        'spesialisasi' => $request->input('spesialisasi'),
        'kontak' => $request->input('kontak')
    ]);

    // Log ID untuk debug
    \Log::info('Pasien ID:', ['id' => $pasien->id]);
    \Log::info('Dokter ID:', ['id' => $dokter->id]);

    // Menyimpan data riwayat kesehatan baru
    $riwayat = new RiwayatKesehatan();
    $riwayat->pasien_id = $pasien->id;
    $riwayat->dokter_id = $dokter->id;
    $riwayat->diagnosa = $request->input('diagnosa');
    $riwayat->tanggal = $request->input('tanggal');
    $riwayat->tindakan = $request->input('tindakan');
    $riwayat->obat = $request->input('obat');
    $riwayat->keterangan = $request->input('keterangan');

    // Simpan data ke dalam database
    $riwayat->save();

    return redirect()->back()->with('success', 'Data riwayat kesehatan berhasil ditambahkan.');
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
