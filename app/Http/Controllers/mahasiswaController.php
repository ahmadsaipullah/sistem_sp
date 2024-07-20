<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mahasiswaController extends Controller
{
    public function index()
    {
        // Mahasiswa yang login
        $mahasiswa = Auth::user();
        // Ambil tugas yang diberikan untuk mahasiswa ini
        $tugass = Tugas::where('user_id', $mahasiswa->id)->get();

        return view('pages.mahasiswa.tugas', compact('tugass'));
    }

    public function submitForm($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('pages.tugas.submit', compact('tugas'));
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,zip'
        ]);

        $tugas = Tugas::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($tugas->file_path) {
                Storage::delete($tugas->file_path);
            }
            $tugas->file_path = $request->file('file')->store('tugas','public');
        }

        $tugas->save();

        if ($tugas) {
            toast('Tugas berhasil Submit.', 'success');
        } else {
            toast('Tugas gagal Submit.', 'error');
        };
        return redirect()->route('daftartugas.index');
    }
}
