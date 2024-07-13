<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class matkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkuls = MataKuliah::with('Dosen')->orderBy('matkul', 'asc')->get();
        return view('pages.admin.matkul.index', compact('matkuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        return view('pages.admin.matkul.create', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'matkul' => 'required|string',
            'sks' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $data = $request->all();

        MataKuliah::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('matkul.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosens = Dosen::all();
        $matkul = MataKuliah::findOrFail($id);
        return view('pages.admin.matkul.edit', compact('dosens','matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'matkul' => 'required|string',
            'sks' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $data = $request->all();
        $matkul = MataKuliah::findOrFail($id);
        $matkul->update($data);
        if ($matkul) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('matkul.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matkul = MataKuliah::findOrFail($id);
        $matkul->delete();
        if ($matkul) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('matkul.index');
    }
}
