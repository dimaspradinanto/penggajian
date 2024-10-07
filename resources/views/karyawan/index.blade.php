<!-- resources/views/karyawan/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->jabatan }}</td>
                <td>Rp. {{ number_format($karyawan->gaji_pokok, 2, ',', '.') }}</td>
                <td>
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST">
                        <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $karyawans->links() !!}
</div>
@endsection
