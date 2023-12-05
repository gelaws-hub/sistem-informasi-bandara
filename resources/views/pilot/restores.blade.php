@extends('navbar')

@section('content')

    <h4 class="mt-5">Data Pilot</h4>

    <a href="{{ route('pilot.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
    <a href="{{ route('pilot.index') }}" type="button" class="btn btn-success rounded-3">Daftar Pilot</a>
    <p> </p><br>

    <div class="pb-3">
        <form class="d-flex" action="{{ url('pilot-all') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                placeholder="Masukkan Nama Maskapai atau tipe ...." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jam Terbang</th>
                <th>ID Pesawat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id_pilot }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jam_terbang }} jam</td>
                    <td>{{ $data->id_pesawat }}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal{{ $data->id_pilot }}">
                            Hapus
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="hapusModal{{ $data->id_pilot }}" tabindex="-1"
                            aria-labelledby="hapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('pilot.delete', $data->id_pilot) }}">
                                        @csrf
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#softhapusModal{{ $data->id_pilot }}">
                            Restore
                        </button>

                        <div class="modal fade" id="softhapusModal{{ $data->id_pilot }}" tabindex="-1"
                            aria-labelledby="softhapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="GET" action="{{ route('pilot.restore') }}">
                                        @csrf
                                        <div class="modal-body">
                                            Apakah anda yakin ingin merestore {{ $data->nama }} ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@stop
