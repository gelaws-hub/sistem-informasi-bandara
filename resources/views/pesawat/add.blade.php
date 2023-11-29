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

    <h5 class="card-title fw-bolder mb-3">Tambah Pesawat Baru</h5>

		<form method="post" action="{{ route('pesawat.store') }}">
			@csrf
            <!-- <div class="mb-3">
                <label for="id_pilot" class="form-label">ID pilot</label>
                <input type="number" class="form-control" id="id_pilot" name="id_pilot">
            </div> -->
			<div class="mb-3">
                <label for="maskapai" class="form-label">Maskapai</label>
                <input type="text" class="form-control" id="maskapai" name="maskapai">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <input type="text" class="form-control" id="tipe" name="tipe">
            </div>
            <div class="mb-3">
                <label for="id_hangar" class="form-label">ID Hangar</label>
                <input type="number" class="form-control" id="id_hangar" name="id_hangar">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop