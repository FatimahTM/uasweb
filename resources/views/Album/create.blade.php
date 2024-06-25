@extends('layout.main')
@section('title', 'Tambah Album')
@section('content')
    <h2>Tambah Album</h2>
    <p>Ini Halaman Tambah Album</p>

    <form action="{{ route('albums.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Album</h4>
                        <p class="card-description">
                            Formulir Tambah Album
                        </p>
                        <div class="forms-sample">
                            <div class="form-group">
                                <label for="nama">Nama Album</label>
                                <input type="text" name="nama" id="nama" value="{{old('nama')}}" class="form-control">
                                @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="artist_id">Artist</label>
                                <select name="artist_id" id="artist_id" class="form-control">
                                    @foreach ($artist as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                                @error('artist_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tahun_keluar">Tahun Keluar</label>
                                <input type="date" name="tahun_keluar" id="tahun_keluar" value="{{old('tahun_keluar')}}" class="form-control">
                                @error('tahun_keluar')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{url('albums')}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <p>©2024</p>
@endsection
