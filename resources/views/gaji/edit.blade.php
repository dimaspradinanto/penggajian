<!-- resources/views/gaji/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Gaji</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi kesalahan dalam input data.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="karyawan_id">Karyawan:</label>
            <select name="karyawan_id" class="form-control" required>
                <option value="">Pilih Karyawan</option>
                @foreach ($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}" {{ $gaji->karyawan_id == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" value="{{ $gaji->tanggal }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jumlah_gaji">Jumlah Gaji:</label>
            <input type="number" name="jumlah_gaji" value="{{ $gaji->jumlah_gaji }}" class="form-control" placeholder="Jumlah Gaji" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
</div>
@endsection
