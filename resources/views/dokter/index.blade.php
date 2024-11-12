@extends('template')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Advanced Table</p>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="display expandable-table" style="width:100%">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Pasien</th>
                          {{-- <th>Nama Dokter</th> --}}
                          <th>Diagnosa</th>
                          <th>Tanggal</th>
                          <th>Tindakan</th>
                          <th>Obat</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($riwayat_kesehatans as $index => $riwayat)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $riwayat->pasien->user->name ?? 'Tidak Diketahui' }}</td>
                              {{-- <td>{{ $riwayat->dokter->user->name ?? 'Tidak Diketahui' }}</td> --}}
                              <td>{{ $riwayat->diagnosa }}</td>
                              <td>{{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d-m-Y') }}</td>
                              <td>{{ $riwayat->tindakan }}</td>
                              <td>{{ $riwayat->obat }}</td>
                              <td>{{ $riwayat->keterangan }}</td>
                          </tr>
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
