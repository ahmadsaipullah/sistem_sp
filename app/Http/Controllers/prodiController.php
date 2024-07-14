<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class prodiController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['User', 'Dosen'])->get();
        return view('pages.prodi.index', compact('pengajuans'));
    }
}
