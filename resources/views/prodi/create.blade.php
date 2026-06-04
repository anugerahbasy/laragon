@extends('main')

@section('title', 'Tambah Program Studi')

@section('content')
    <form action="{{ route('prodi.store') }}" method="post">
        <div class="form-group">
            <label for="">Nama Program Studi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}">
        </div>
        @error('nama_prodi')
            <div class="text-danger"> {{ $message }} </div>
        @enderror

        <div class="form-group">
            <label for="">Singkatan</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}">
        </div>
        @error('singkatan')
            <div class="text-danger"> {{ $message }} </div>
        @enderror

        <div class="form-group">
            <label for="">Kepala Program Studi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi') }}">
        </div>
        @error('kaprodi')
            <div class="text-danger"> {{ $message }} </div>
        @enderror

        <div class="form-group">
            <label for="">Fakultas</label>
            <select name="fakultas_id" class="form-control">
                <option value="">Pilih Fakultas</option>
                @foreach($fakultas as $row)
                    <option value="{{ $row->id }}" 
                        {{ old('fakultas_id') == $row->id ? 'selected' : '' }} >
                        {{ $row->nama_fakultas }}
                    </option>
                @endforeach
            </select>
        </div> 
        @error('fakultas_id')
            <div class="text-danger"> {{ $message }} </div>
        @enderror 

        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
@endsection