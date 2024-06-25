@extends('layout.main')

@section('title', 'Edit Lagu')

@section('content')
<div class="container">
    <h2>Edit Lagu</h2>
    <form action="{{ route('lagus.update', $lagu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul Lagu</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $lagu->title }}">
        </div>
        <div class="form-group">
            <label for="artist_id">Artis</label>
            <select class="form-control" id="artist_id" name="artist_id">
                @foreach($artists as $artist)
                <option value="{{ $artist->id }}" {{ $lagu->artist_id == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="album">Album</label>
            <input type="text" class="form-control" id="album" name="album" value="{{ $lagu->album }}">
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="{{ $lagu->genre }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('lagus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
