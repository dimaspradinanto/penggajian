<!-- resources/views/gaji/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Gaji</h1>
    <a href="{{ route('gaji.create') }}" class="btn btn-primary mb-3">Tambah Gaji</a>
    <a href="{{ route('laporan.gaji') }}" class="btn btn-dark mb-3">Unduh Laporan</a>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Tanggal</th>
                <th>Jumlah Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gajis as $gaji)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $gaji->karyawan->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($gaji->tanggal)->format('d M Y') }}</td>
                <td>Rp. {{ number_format($gaji->jumlah_gaji, 2, ',', '.') }}</td>
                <td>
                    <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST">
                        <a href="{{ route('gaji.show', $gaji->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('gaji.edit', $gaji->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gaji ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $gajis->links() !!}
</div>
@endsection
