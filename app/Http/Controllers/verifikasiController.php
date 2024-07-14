<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class verifikasiController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['User', 'Dosen'])->get();
        return view('pages.akademik.index', compact('pengajuans'));
    }

// approve
    public function ApproveProdi(Request $request, $id)

    {
        $data       = array();
        $data['verifikasi_prodi_id']   = $request->verifikasi_prodi_id;

        Pengajuan::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function ApproveAkademik(Request $request, $id)

    {
        $data       = array();
        $data['verifikasi_akademik_id']   = $request->verifikasi_akademik_id;

        Pengajuan::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
//rejected
    public function RejectedProdi(Request $request, $id)

    {
        $data       = array();
        $data['verifikasi_prodi_id']   = $request->verifikasi_prodi_id;

        Pengajuan::where('id', $id)->update($data);

        if ($data) {
            toast('Rejected Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedAkademik(Request $request, $id)

    {
        $data       = array();
        $data['verifikasi_akademik_id']   = $request->verifikasi_akademik_id;

        Pengajuan::where('id', $id)->update($data);

        if ($data) {
            toast('Rejected Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

}
