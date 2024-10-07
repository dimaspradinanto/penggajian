<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;


class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gajis = Gaji::with('karyawan')->paginate(10);
        return view('gaji.index', compact('gajis'))
               ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('gaji.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'jumlah_gaji' => 'required|numeric',
        ]);

        Gaji::create($request->all());

        return redirect()->route('gaji.index')
                         ->with('success', 'Gaji berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {      
        return view('gaji.show',compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        $karyawans = Karyawan::all();
        return view('gaji.edit', compact('gaji', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'jumlah_gaji' => 'required|numeric',
        ]);

        $gaji->update($request->all());

        return redirect()->route('gaji.index')
                         ->with('success', 'Gaji berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();

        return redirect()->route('gaji.index')
                         ->with('success', 'Gaji berhasil dihapus.');
    }

    public function laporan()
    {

        \Log::info('Laporan method called');
        // ...
        $gajis = Gaji::with('karyawan')->get();
        $pdf = PDF::loadView('gaji.laporan', compact('gajis'));
        return $pdf->download('laporan_gaji.pdf');

    }

    
}
