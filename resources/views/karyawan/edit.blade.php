<!-- resources/views/karyawan/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

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

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" class="form-control" placeholder="Nama Karyawan" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $karyawan->email }}" class="form-control" placeholder="Email Karyawan" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan:</label>
            <input type="text" name="jabatan" value="{{ $karyawan->jabatan }}" class="form-control" placeholder="Jabatan Karyawan" required>
        </div>

        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok:</label>
            <input type="number" name="gaji_pokok" value="{{ $karyawan->gaji_pokok }}" class="form-control" placeholder="Gaji Pokok Karyawan" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
</div>
@endsection

