@extends('main')

@section('title', 'Ubah Periode')

@section('content')
    <form action="{{ route('periode.update', $periode->id) }}" method="post">
        @method('PUT')
        <div class="form-group">
            <label for="">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik') ?? $periode->tahun_akademik }}">
        </div>
        @error('tahun_akademik')
            <div class="text-danger"> {{ $message }} </div>
        @enderror

        <div class="form-group">
            <label for="">Semester</label>
            <input type="number" min="1" max="3" name="semester" class="form-control" value="{{ old('semester') ?? $periode->semester }}">
        </div>
        @error('semester')
            <div class="text-danger"> {{ $message }} </div>
        @enderror

        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
@endsection