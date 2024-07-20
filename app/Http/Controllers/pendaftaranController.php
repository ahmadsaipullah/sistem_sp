<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pendaftaranController extends Controller
{
    public function index()
    {
        $matkuls = MataKuliah::with('Dosen')->orderBy('matkul', 'asc')->get();
        return view('pages.pendaftaran.index', compact('matkuls'));
    }

    public function status()
    {
        $userId = Auth::user()->id;
        $pengajuans = Pengajuan::with(['User', 'Dosen'])->where('user_id', $userId)->get();
        return view('pages.pendaftaran.status', compact('pengajuans'));
    }

    public function create($id)
    {
        // Ambil ID pengguna yang sedang login
        $user = Auth::user();
        // Ambil mata kuliah berdasarkan ID yang diberikan
        $matkul = MataKuliah::find($id);

        return view('pages.pendaftaran.create', compact('matkul', 'user'));
    }



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
        return redirect()->route('pendaftaran.status');

    }
}
