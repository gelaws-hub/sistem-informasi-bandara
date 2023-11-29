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

		<form method="post" action="{{ route('hangar.update', $data->id_hangar) }}">
			@csrf
            <div class="mb-3">
                <label for="id_hangar" class="form-label">ID Hangar</label>
                <input type="number" class="form-control" id="id_hangar" name="id_hangar" value="{{ $data->id_hangar }}">
            </div>
            <div class="mb-3">
                <label for="nama_hangar" class="form-label">Nama Hangar</label>
                <input type="text" class="form-control" id="nama_hangar" name="nama_hangar" value="{{ $data->nama_hangar }}">
            </div>
            <div class="mb-3">
                <label for="terminal" class="form-label">Terminal</label>
                <input type="text" class="form-control" id="terminal" name="terminal" value="{{ $data->terminal }}">
            </div>
            <div class="mb-3">
            <label for="bandara" class="form-label">Bandara</label>
                <input type="text" class="form-control" id="bandara" name="bandara" value="{{ $data->bandara }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop