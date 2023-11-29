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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Pesawat</h5>

		<form method="post" action="{{ route('pesawat.update', $data->id_hangar) }}">
			@csrf
            <div class="mb-3">
                <label for="id_pesawat" class="form-label">ID Pesawat</label>
                <input type="text" class="form-control" id="id_pesawat" name="id_pesawat" value="{{ $data->id_pesawat }}">
            </div>
			<div class="mb-3">
                <label for="maskapai" class="form-label">Maskapai</label>
                <input type="text" class="form-control" id="maskapai" name="maskapai" value="{{ $data->maskapai }}">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $data->tipe }}">
            </div>
            <div class="mb-3">
                <label for="id_hangar" class="form-label">ID Hangar</label>
                <input type="number" class="form-control" id="id_hangar" name="id_hangar" value="{{ $data->id_hangar }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop