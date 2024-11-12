<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RiwayatKesehatan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Seeder untuk tabel `pasiens`
        // $pasiens = [
        //     [
        //         // 'nama' => 'Putri',
        //         'user_id' => 7,
        //         'usia' => 22,
        //         'jenis_kelamin' => 'Perempuan',
        //         'pekerjaan' => 'Mahasiswa',
        //         'alamat' => 'Jl. Kebon Jeruk No. 21, Jakarta',
        //         'penanggungjawab' => 'Bapak Putri',
        //         'hubungan' => 'Orang tua',
        //         'no_hp' => '081234567890',
        //     ],
        //     [
        //         // 'nama' => 'Kak Kev',
        //         'user_id' => 8,
        //         'usia' => 35,
        //         'jenis_kelamin' => 'Laki-laki',
        //         'pekerjaan' => 'Pegawai Negeri Sipil',
        //         'alamat' => 'Jl. Mangga Dua No. 45, Bandung',
        //         'penanggungjawab' => 'Istri Kak Kev',
        //         'hubungan' => 'Pasangan',
        //         'no_hp' => '081987654321',
        //     ],
        //     [
        //         // 'nama' => 'Ahmad Hidayat',
        //         'user_id' => 9,
        //         'usia' => 7,
        //         'jenis_kelamin' => 'Laki-laki',
        //         'pekerjaan' => 'Pelajar',
        //         'alamat' => 'Jl. Merdeka No. 10, Surabaya',
        //         'penanggungjawab' => 'Bapak Ahmad Hidayat',
        //         'hubungan' => 'Orang tua',
        //         'no_hp' => '082345678901',
        //     ],
        // ];

        // foreach ($pasiens as $data) {
        //     Pasien::create($data);
        // }

        // // Seeder untuk tabel `dokters`
        // $dokters = [
        //     [
        //         // 'nama' => 'Dr. Alex Wijaya',
        //         'user_id' => 3,
        //         'spesialis' => 'Dokter Umum',
        //         'kontak' => '081223344556',
        //     ],
        //     [
        //         // 'nama' => 'Dr. Siti Halimah',
        //         'user_id' => 4,
        //         'spesialis' => 'Dokter Anak',
        //         'kontak' => '081334455667',
        //     ],
        //     [
        //         // 'nama' => 'Dr. Cindy Rahmawati',
        //         'user_id' => 5,
        //         'spesialis' => 'Dokter Gigi',
        //         'kontak' => '081445566778',
        //     ],
        // ];

        // foreach ($dokters as $data) {
        //     Dokter::create($data);
        // }

        // Seeder untuk tabel `riwayat_kesehatans`
        $riwayat_kesehatans = [
            [
                'pasien_id' => 1,
                'dokter_id' => 1,
                'diagnosa' => 'Demam dan flu',
                'tanggal' => Carbon::parse('2024-01-10'),
                'tindakan' => 'Pemeriksaan fisik dan pemberian obat',
                'obat' => 'Paracetamol, Vitamin C',
                'keterangan' => 'Diminta istirahat 3 hari',
            ],
            [
                'pasien_id' => 2,
                'dokter_id' => 3,
                'diagnosa' => 'Gigi berlobang',
                'tanggal' => Carbon::parse('2024-01-10'),
                'tindakan' => 'Penambalan gigi',
                'obat' => 'Paracetamol',
                'keterangan' => 'Jaga kebersihan gigi dan kontrol ulang',
            ],
            [
                'pasien_id' => 3,
                'dokter_id' => 2,
                'diagnosa' => 'Batuk berdahak',
                'tanggal' => Carbon::parse('2024-02-15'),
                'tindakan' => 'Pemberian resep obat batuk',
                'obat' => 'Ambroxol, Vitamin C',
                'keterangan' => 'Hindari minuman dingin',
            ],
            [
                'pasien_id' => 3,
                'dokter_id' => 3,
                'diagnosa' => 'Sakit gigi',
                'tanggal' => Carbon::parse('2024-03-20'),
                'tindakan' => 'Pemeriksaan gigi dan pembersihan',
                'obat' => 'Ibuprofen',
                'keterangan' => 'Jaga kebersihan gigi dan kontrol ulang',
            ],
        ];

        foreach ($riwayat_kesehatans as $data) {
            RiwayatKesehatan::create($data);
        }
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
