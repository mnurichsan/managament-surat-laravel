<?php

namespace App\Http\Controllers;

use App\SuratKeluar;
use App\SuratMasuk;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function suratMasukIndex()
    {

        $suratMasuk = null;
        return view('agenda.suratmasuk', compact('suratMasuk'));
    }

    public function getDatasurat(Request $request)
    {
        $this->validate($request, [
            'dari_tgl' => 'required',
            'sampai_tgl' => 'required'
        ]);
        $dari = $request->dari_tgl;
        $sampai = $request->sampai_tgl;

        $title = "Surat Masuk dari tanggal $dari sampai tanggal $sampai";
        $suratMasuk = SuratMasuk::whereDate('tgl_surat', '>=', $dari)->whereDate('tgl_surat', '<=', $sampai)->orderBy('tgl_surat', 'desc')->get();

        return view('agenda.suratmasuk', compact('suratMasuk', 'title'));
    }

    public function suratKeluarIndex()
    {
        $suratKeluar = null;
        return view('agenda.suratkeluar', compact('suratKeluar'));
    }

    public function getDatasuratKeluar(Request $request)
    {
        $this->validate($request, [
            'dari_tgl' => 'required',
            'sampai_tgl' => 'required'
        ]);
        $dari = $request->dari_tgl;
        $sampai = $request->sampai_tgl;

        $title = "Surat Keluar dari tanggal $dari sampai tanggal $sampai";
        $suratKeluar = SuratKeluar::whereDate('tgl_surat', '>=', $dari)->whereDate('tgl_surat', '<=', $sampai)->orderBy('tgl_surat', 'desc')->get();

        return view('agenda.suratkeluar', compact('suratKeluar', 'title'));
    }
}
