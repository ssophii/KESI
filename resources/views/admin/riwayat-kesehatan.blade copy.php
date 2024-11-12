@extends('template')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <button style="color: white" type="button" class="btn btn-primary card-title" data-toggle="modal" data-target="#tambahModal">
                Tambah
            </button>
            <!-- Modal untuk Tambah Data Baru -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.storeRiwayat') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Riwayat Kesehatan Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="mt-4">I. Identitas Pasien</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Nama Pasien</div>
                            <div class="col-md-8">
                                <input type="text" name="nama_pasien" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Email Pasien</div>
                            <div class="col-md-8">
                                <input type="email" name="email_pasien" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Usia</div>
                            <div class="col-md-8">
                                <input type="number" name="usia" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Jenis Kelamin</div>
                            <div class="col-md-8">
                                <input type="text" name="jenis_kelamin" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Pekerjaan</div>
                            <div class="col-md-8">
                                <input type="text" name="pekerjaan" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Alamat</div>
                            <div class="col-md-8">
                                <input type="text" name="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Penanggung Jawab</div>
                            <div class="col-md-8">
                                <input type="text" name="penanggungjawab" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Hubungan</div>
                            <div class="col-md-8">
                                <input type="text" name="hubungan" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Nomor HP</div>
                            <div class="col-md-8">
                                <input type="text" name="no_hp" class="form-control" required>
                            </div>
                        </div>

                        <h4 class="mt-4">II. Identitas Dokter</h4>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Nama Dokter</div>
                            <div class="col-md-8">
                                <input type="text" name="nama_dokter" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Email Dokter</div>
                            <div class="col-md-8">
                                <input type="email" name="email_dokter" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Spesialisasi</div>
                            <div class="col-md-8">
                                <input type="text" name="spesialisasi" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Kontak Dokter</div>
                            <div class="col-md-8">
                                <input type="text" name="kontak" class="form-control" required>
                            </div>
                        </div>

                        <h4 class="mt-4">III. Riwayat Kesehatan</h4>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Diagnosa</div>
                            <div class="col-md-8">
                                <input type="text" name="diagnosa" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Tanggal Kunjungan</div>
                            <div class="col-md-8">
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Tindakan</div>
                            <div class="col-md-8">
                                <input type="text" name="tindakan" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Obat</div>
                            <div class="col-md-8">
                                <input type="text" name="obat" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 font-weight-bold">Keterangan</div>
                            <div class="col-md-8">
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                                  {{-- <th>Tindakan</th>
                                  <th>Obat</th>
                                  <th>Keterangan</th> --}}
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
                                  {{-- <td>{{ $riwayat->tindakan }}</td>
                                  <td>{{ $riwayat->obat }}</td>
                                  <td>{{ $riwayat->keterangan }}</td> --}}
                                  <td>
                                      <!-- Tombol untuk memunculkan modal -->
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $riwayat->pasien_id }}">
                                          Lihat Detail
                                      </button>
                                  </td>
                              </tr>
          
                              <!-- Modal untuk setiap baris -->
                              <div class="modal fade" id="modal{{ $riwayat->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $riwayat->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Form untuk update -->
                                        <form action="{{ route('admin.updateRiwayat', $riwayat->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $riwayat->id }}">Riwayat Kesehatan Pasien</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="text-center">RIWAYAT KESEHATAN PASIEN</h3>
                            
                                                <!-- Field Identitas Pasien -->
                                                <h4 class="mt-4">I. Identitas Pasien</h4>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Nama</div>
                                                        <div class="col-md-8">{{ $riwayat->pasien->user->name ?? 'Tidak Diketahui' }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Usia</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="usia" class="form-control" value="{{ $riwayat->pasien->usia }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Jenis Kelamin</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="jenis_kelamin" class="form-control" value="{{ $riwayat->pasien->jenis_kelamin }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Pekerjaan</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="pekerjaan" class="form-control" value="{{ $riwayat->pasien->pekerjaan }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Alamat</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="alamat" class="form-control" value="{{ $riwayat->pasien->alamat }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Penanggung Jawab</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="penanggungjawab" class="form-control" value="{{ $riwayat->pasien->penanggungjawab }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Hubungan dengan Pasien</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="hubungan" class="form-control" value="{{ $riwayat->pasien->hubungan }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Nomor Telepon</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="no_hp" class="form-control" value="{{ $riwayat->pasien->no_hp }}">
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <!-- Riwayat Penyakit Sekarang -->
                                                <h4 class="mt-4">II. Riwayat Penyakit Sekarang</h4>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Dokter yang Menangani</div>
                                                        <div class="col-md-8">{{ $riwayat->dokter->user->name ?? 'Tidak Diketahui' }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Diagnosa</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="diagnosa" class="form-control" value="{{ $riwayat->diagnosa }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Tanggal Pemeriksaan</div>
                                                        <div class="col-md-8">
                                                            <input type="date" name="tanggal" class="form-control" value="{{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d-m-Y') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Tindakan yang Dilakukan</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tindakan" class="form-control" value="{{ $riwayat->tindakan }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 font-weight-bold">Obat yang Dikonsumsi</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="obat" class="form-control" value="{{ $riwayat->obat }}">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="border-bottom: 1px solid #ddd; margin-bottom: 15px;">
                                                        <div class="col-md-4 font-weight-bold">Keterangan</div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="keterangan" class="form-control" value="{{ $riwayat->keterangan }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <form action="{{ route('admin.deleteRiwayat', $riwayat->id) }}" method="POST" class="d-inline-block w-100 text-right p-3">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </form>
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
      </div>
@endsection
