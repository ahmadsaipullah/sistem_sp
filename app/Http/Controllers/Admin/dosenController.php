<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\PengajuanDosen;
use App\Http\Controllers\Controller;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dosens = Dosen::with('User')->orderBy('name', 'asc')->get();
        return view('pages.admin.dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'required|string|max:12|unique:dosens,nidn,',
            'email' => 'required|string|email:dns|unique:dosens,email,',
            'no_hp' => 'required|string|max:13',
        ]);

        $data = $request->all();

        Dosen::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('dosen.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('pages.admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'required|string|max:12|unique:dosens,nidn,' . $id,
            'email' => 'required|string|email:dns|unique:dosens,email,' . $id,
            'no_hp' => 'required|string|max:13',
        ]);

        $data = $request->all();
        $dosen = Dosen::findOrFail($id);
        $dosen->update($data);
        if ($dosen) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        if ($dosen) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('dosen.index');
    }


}
