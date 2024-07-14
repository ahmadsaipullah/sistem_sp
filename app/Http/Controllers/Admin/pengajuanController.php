<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\MataKuliah;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class pengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::with(['User', 'Dosen'])->get();
        return view('pages.admin.pengajuan.index', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $matkuls = MataKuliah::all();
        return view('pages.admin.pengajuan.create', compact('matkuls','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'dosen_id' => 'required|exists:dosens,id',
            'matkul_id' => 'required|string|max:255',
            'sks' => 'required|integer',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'verifikasi_prodi_id' => 'nullable|exists:users,id',
            'verifikasi_akademik_id' => 'nullable|exists:users,id',
        ]);

        $userId = $request->input('user_id');
        $newSks = $request->input('sks');
        $currentSks = Pengajuan::userSKS($userId);

        if ($currentSks + $newSks > 9) {
            alert('SKS yang diajukan melebihi batas maksimal 9 SKS per tahun');
            return back();
        }

        $data = $request->all();
        Pengajuan::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pengajuan.index');

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
        $users = User::all();
        $matkuls = MataKuliah::all();
        $pengajuan = Pengajuan::find($id);
        return view('pages.admin.pengajuan.edit', compact('pengajuan','users','matkuls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'dosen_id' => 'required|exists:dosens,id',
        'matkul_id' => 'required|string|max:255',
        'sks' => 'required|integer',
        'harga' => 'required|integer',
        'deskripsi' => 'nullable|string',
        'verifikasi_prodi_id' => 'nullable|exists:users,id',
        'verifikasi_akademik_id' => 'nullable|exists:users,id',
    ]);

    $pengajuan = Pengajuan::findOrFail($id);
    $oldSks = $pengajuan->sks;
    $newSks = $request->input('sks');
    $userId = $request->input('user_id');

    // Menghitung total SKS saat ini, mengurangkan SKS pengajuan lama dan menambahkan SKS pengajuan baru
    $currentSks = Pengajuan::where('user_id', $userId)
                           ->whereYear('created_at', now()->year)
                           ->sum('sks') - $oldSks + $newSks;

    if ($currentSks > 9) {
        alert('SKS yang diajukan melebihi batas maksimal 9 SKS per tahun');
        return back();
    }

    $data = $request->all();
    $pengajuan->update($data);

    if ($pengajuan) {
        toast('Data berhasil diupdate', 'success');
    } else {
        toast('Data Gagal Diupdate', 'error');
    }

    return redirect()->route('pengajuan.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();
        if ($pengajuan) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('pengajuan.index');
    }



}
