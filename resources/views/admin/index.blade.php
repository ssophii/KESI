@extends('template')

@section('content')
    <h1>Halaman admin</h1>
    <p>Ini adalah halaman admin</p>
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
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Kontak</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($dokters as $dokter)
                          <tr>
                              <td>{{ $dokter->user->name ?? 'Tidak Diketahui' }}</td>
                              <td>{{ $dokter->spesialis }}</td>
                              <td>{{ $dokter->kontak }}</td>
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
