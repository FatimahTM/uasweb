@extends('layout.main')

@section('title', 'Tambah Lagu')

@section('content')
<div class="container">
    <h2>Tambah Lagu</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('lagus.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Lagu</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="artist_id">Artis</label>
                    <select class="form-control" id="artist_id" name="artist_id">
                        @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}" {{ old('artist_id') == $artist->id ? 'selected' : '' }}>
                            {{ $artist->nama}}
                        </option>
                        @endforeach
                    </select>
                    @error('artist_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="album">Album</label>
                    <input type="text" class="form-control" id="album" name="album" value="{{ old('album') }}">
                    @error('album')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}">
                    @error('genre')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('lagus.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
