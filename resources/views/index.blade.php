<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Airport - Database</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">AIRPORT - DB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="pilot-all">Pilot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesawat-all">Pesawat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hangar-all">Hangar</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Konten -->
    <div class="container">
        <h4 class="mt-5">Data AIRPORT-INDONESIA</h4>

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Nama Pilot</th>
                    <th>Jam Terbang</th>
                    <th>Maskapai</th>
                    <th>Tipe</th>
                    <th>Hanggar</th>
                    <th>Terminal</th>
                    <th>Bandara</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joins as $joins1)
                <tr>
                    <td>{{ $joins1->nama }}</td>
                    <td>{{ $joins1->jam_terbang }} jam</td>
                    <td>{{ $joins1->maskapai }}</td>
                    <td>{{ $joins1->tipe }}</td>
                    <td>{{ $joins1->nama_hangar }}</td>
                    <td>{{ $joins1->terminal }}</td>
                    <td>{{ $joins1->bandara }}</td>
                    @endforeach
            </tbody>
        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>