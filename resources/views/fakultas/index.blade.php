@extends('main')

@section('title', 'Fakultas')

@section('content')
    <a href="{{ route('fakultas.create')}}" class="btn btn-primary">Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Singkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
                <tr>
                    <td> {{ $item->nama_fakultas }} </td>
                    <td> {{ $item->singkatan }} </td>
                    <td>
                        <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-warning btn-rounded">Ubah</a>

                        <form method="POST" action="{{ route('fakultas.destroy', $item->id) }}" class="d-inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->nama_fakultas }}'>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection