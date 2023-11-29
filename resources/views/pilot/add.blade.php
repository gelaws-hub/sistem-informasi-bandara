@extends('navbar')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

    <h5 class="card-title fw-bolder mb-3">Tambah Pilot Baru</h5>

		<form method="post" action="{{ route('pilot.store') }}">
			@csrf
            <!-- <div class="mb-3">
                <label for="id_pilot" class="form-label">ID pilot</label>
                <input type="number" class="form-control" id="id_pilot" name="id_pilot">
            </div> -->
			<div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="jam_terbang" class="form-label">Jam Terbang</label>
                <input type="number" class="form-control" id="jam_terbang" name="jam_terbang">
            </div>
            <div class="mb-3">
                <label for="id_pesawat" class="form-label">ID Pesawat</label>
                <input type="number" class="form-control" id="id_pesawat" name="id_pesawat">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop