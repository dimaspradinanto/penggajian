<!-- resources/views/karyawan/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>

    <div class="card">
        <div class="card-header">
            {{ $karyawan->nama }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $karyawan->email }}</p>
            <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
            <p><strong>Gaji Pokok:</strong> Rp. {{ number_format($karyawan->gaji_pokok, 2, ',', '.') }}</p>
        </div>
    </div>

    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
