<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class tugasController extends Controller
{
    public function index()
    {
        $dosen = Auth::user();
        $tugass = Tugas::where('dosen_id', $dosen->dosen_id)->get();
        return view('pages.tugas.index', compact('tugass'));
    }

    public function create($user_id)
    {
        $mahasiswa = Pengajuan::with('User')->findOrFail($user_id);
        $dosen = Auth::user();
        return view('pages.tugas.create', compact('mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'dosen_id' => 'required|exists:users,id',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,zip'
        ]);

        $tugas = new Tugas();
        $tugas->user_id = $request->user_id;
        $tugas->dosen_id = $request->dosen_id;
        $tugas->deskripsi = $request->deskripsi;

        if ($request->hasFile('file')) {
            $tugas->file_path = $request->file('file')->store('tugas', 'public');
        }

        $tugas->save();
        if ($tugas) {
            toast('Tugas berhasil diberikan.', 'success');
        } else {
            toast('Tugas gagal diberikan.', 'error');
        };
        return redirect()->route('tugas.index');
    }

    // public function submitForm($id)
    // {
    //     $tugas = Tugas::findOrFail($id);
    //     return view('pages.tugas.submit', compact('tugas'));
    // }

    // public function submit(Request $request, $id)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:pdf,doc,docx,zip'
    //     ]);

    //     $tugas = Tugas::findOrFail($id);

    //     if ($request->hasFile('file')) {
    //         if ($tugas->file_path) {
    //             Storage::delete($tugas->file_path);
    //         }
    //         $tugas->file_path = $request->file('file')->store('tugas','public');
    //     }

    //     $tugas->save();

    //     if ($tugas) {
    //         toast('Tugas berhasil Submit.', 'success');
    //     } else {
    //         toast('Tugas gagal Submit.', 'error');
    //     };
    //     return redirect()->route('tugas.index');
    // }

    public function nilaiForm($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('pages.tugas.nilai', compact('tugas'));
    }

    public function nilai(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|string'
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->nilai = $request->nilai;
        $tugas->save();

        if ($tugas) {
            toast('Tugas berhasil dinilai.', 'success');
        } else {
            toast('Tugas gagal dinilai.', 'error');
        };
        return redirect()->route('tugas.index');
    }
}
