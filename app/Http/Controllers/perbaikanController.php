<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class perbaikanController extends Controller
{
    public function index(Request $request)
    {
        $loggedInsp = Dosen::find(auth()->user()->dosen_id);

        if (!$loggedInsp) {
            toast('Gagal Not Found!', 'error');
            return back();
        }


        $pengajuans = $loggedInsp->Pengajuan()
            ->where('verifikasi_prodi_id', 1)
            ->where('verifikasi_akademik_id', 1)
            ->with(['User', 'Dosen'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.perbaikan.index', compact('pengajuans'));
    }
}
