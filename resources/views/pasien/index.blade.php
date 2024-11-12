@extends('template')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 style="text-align: center">RIWAYAT KESEHATAN PASIEN</h3>
            <div class="section">
                <div class="content">
                    <h4 style="padding-top: 5%">I. Identitas Pasien</h4>
                    <table>
                        @foreach ($pasien as $dt)
                            
                        <tr>
                            <td> <p>Nama</p> </td> <td> <p>: {{ $dt->user->name }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Usia</p> </td> <td> <p>: {{ $dt->usia }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Jenis Kelamin</p> </td> <td> <p>: {{ $dt->jenis_kelamin }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Pekerjaan</p> </td> <td> <p>: {{ $dt->pekerjaan }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Alamat</p> </td> <td> <p>: {{ $dt->alamat }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Penanggung Jawab</p> </td> <td> <p>: {{ $dt->penanggungjawab }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Hubungan dengan Pasien</p> </td> <td> <p>: {{ $dt->hubungan }}</p> </td>
                        </tr>
                        <tr>
                            <td> <p>Nomor Telepon</p> </td> <td> <p>: {{ $dt->no_hp }}</p> </td>
                        </tr>
                        
                        @endforeach
                    </table>
        
                    <h4 style="padding-top: 2%">II. Riwayat Penyakit Sekarang</h4>
                    <table class="w-100">
                        @foreach ($riwayat_kesehatans as $riwayat)
                            <tr class="pt-4">
                                <td> <p>Dokter yang Menangani</p> </td> 
                                <td> <p>: {{ $riwayat->dokter->user->name }}</p> </td>
                            </tr>
                            <tr>
                                <td> <p>Diagnosa</p> </td> 
                                <td> <p>: {{ $riwayat->diagnosa }}</p> </td>
                            </tr>
                            <tr>
                                <td> <p>Tanggal Pemeriksaan</p> </td> 
                                <td> <p>: {{ $riwayat->tanggal }}</p> </td>
                            </tr>
                            <tr>
                                <td> <p>Tindakan yang Dilakukan</p> </td> 
                                <td> <p>: {{ $riwayat->tindakan }}</p> </td>
                            </tr>
                            <tr>
                                <td> <p>Obat yang Dikonsumsi</p> </td> 
                                <td> <p>: {{ $riwayat->obat }}</p> </td>
                            </tr>
                            <tr style="border-bottom: 1px solid">
                                <td> <p>Keterangan</p> </td> 
                                <td> <p>: {{ $riwayat->keterangan }}</p> </td>
                            </tr>
                        @endforeach
                        {{-- <hr> --}}
                    </table>
                </div>
            </div>
            </div>
          </div>

          
        </div>
      </div>
@endsection
