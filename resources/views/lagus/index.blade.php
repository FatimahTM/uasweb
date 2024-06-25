@extends('layout.main')

@section('title', 'Daftar Lagu')

@section('content')

<div class="container">

    <h2>Daftar Lagu</h2>

    <div class="mt-6 row">
        <a href="{{ route('lagus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add New Song</a>
    </div>
    <div class="row">

        <div class="col-md-12">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>Judul Lagu</th>

                        <th>Artis</th>

                        <th>Album</th>

                        <th>Genre</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($lagus as $lagu)

                    <tr>

                        <td>{{ $lagu->title }}</td>

                        <td>{{ $lagu->artist->name ?? 'Artis Tidak Diketahui' }}</td>
                        
                        <td>{{ $lagu->album }}</td>

                        <td>{{ $lagu->genre }}</td>

                        <td>

                            <a href="{{ route('lagus.edit', $lagu->id) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('lagus.destroy', $lagu->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
