<!-- resources/views/gaji/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Gaji</h1>

    <div class="card">
        <div class="card-header">
            {{ $gaji->karyawan->nama }} - Rp. {{ number_format($gaji->jumlah_gaji, 2, ',', '.') }}
        </div>
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($gaji->tanggal)->format('d M Y') }}</p>
            <p><strong>Jumlah Gaji:</strong> Rp. {{ number_format($gaji->jumlah_gaji, 2, ',', '.') }}</p>
            <p><strong>Karyawan:</strong> {{ $gaji->karyawan->nama }} ({{ $gaji->karyawan->jabatan }})</p>
        </div>
    </div>

    <a href="{{ route('gaji.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
