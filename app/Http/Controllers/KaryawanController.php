<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {   
    $karyawans = Karyawan::paginate(10); // Menampilkan 10 karyawan per halaman
    return view('karyawan.index', compact('karyawans'))
             ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email',
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')
                         ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,'.$karyawan->id,
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')
                         ->with('success', 'Karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')
                         ->with('success', 'Karyawan berhasil dihapus.');
    }

}
