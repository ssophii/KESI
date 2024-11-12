@extends('template')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- Button to trigger the "Tambah" modal -->
                <button style="color: white" type="button" class="btn btn-primary card-title" data-toggle="modal" data-target="#addRiwayatModal">
                    Tambah
                </button>

                <!-- Modal -->
<div class="modal fade" id="addRiwayatModal" tabindex="-1" aria-labelledby="addRiwayatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRiwayatModalLabel">Tambah Riwayat Kesehatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.storeRiwayat') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Nama Pasien -->
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                    </div>
                    <!-- Nama Dokter -->
                    <div class="mb-3">
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" required>
                    </div>
                    <!-- Diagnosa -->
                    <div class="mb-3">
                        <label for="diagnosa" class="form-label">Diagnosa</label>
                        <input type="text" class="form-control" id="diagnosa" name="diagnosa" required>
                    </div>
                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <!-- Usia -->
                    <div class="mb-3">
                        <label for="usia" class="form-label">Usia</label>
                        <input type="number" class="form-control" id="usia" name="usia" required>
                    </div>
                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <!-- Pekerjaan -->
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    </div>
                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <!-- Penanggung Jawab -->
                    <div class="mb-3">
                        <label for="penanggungjawab" class="form-label">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" required>
                    </div>
                    <!-- Hubungan -->
                    <div class="mb-3">
                        <label for="hubungan" class="form-label">Hubungan</label>
                        <input type="text" class="form-control" id="hubungan" name="hubungan" required>
                    </div>
                    <!-- No HP -->
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <!-- Tindakan -->
                    <div class="mb-3">
                        <label for="tindakan" class="form-label">Tindakan</label>
                        <input type="text" class="form-control" id="tindakan" name="tindakan" required>
                    </div>
                    <!-- Obat -->
                    <div class="mb-3">
                        <label for="obat" class="form-label">Obat</label>
                        <input type="text" class="form-control" id="obat" name="obat" required>
                    </div>
                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                    </div>
                    <!-- Email Pasien -->
                    <div class="mb-3">
                        <label for="email_pasien" class="form-label">Email Pasien</label>
                        <input type="email" class="form-control" id="email_pasien" name="email_pasien" required>
                    </div>
                    <!-- Email Dokter -->
                    <div class="mb-3">
                        <label for="email_dokter" class="form-label">Email Dokter</label>
                        <input type="email" class="form-control" id="email_dokter" name="email_dokter" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


                <!-- Table to display records -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Diagnosa</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayatKesehatans as $index => $riwayat)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $riwayat->pasien->user->name ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $riwayat->dokter->user->name ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $riwayat->diagnosa }}</td>
                                        <td>{{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d-m-Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $riwayat->id }}">
                                                Lihat Detail
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Detail modal for each row -->
                                    <div class="modal fade" id="modal{{ $riwayat->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $riwayat->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Content for displaying details of the record -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

