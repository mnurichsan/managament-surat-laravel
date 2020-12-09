<?php

namespace App\Http\Controllers;

use App\SuratKeluar;
use App\SuratMasuk;
use Illuminate\Http\Request;

class GaleriFileController extends Controller
{
    public function galeriSuratMasuk()
    {
        $title = null;
        $galeri = SuratMasuk::select('file', 'isi', 'id')->get();
        return view('galerifile.suratmasuk', compact('galeri', 'title'));
    }

    public function galeriSuratKeluar()
    {
        $title = null;
        $galeri = SuratKeluar::select('file', 'isi', 'id')->get();
        return view('galerifile.suratkeluar', compact('galeri', 'title'));
    }

    public function detailSuratMasuk($id)
    {
        $galeri = SuratMasuk::findOrFail($id)->select('file', 'isi')->first();
        return view('galerifile.detailsuratmasuk', compact('galeri'));
    }
    public function detailSuratKeluar($id)
    {
        $galeri = SuratKeluar::findOrFail($id)->select('file', 'isi')->first();
        return view('galerifile.detailsuratkeluar', compact('galeri'));
    }

    public function getDataFileMasuk(Request $request)
    {
        $this->validate($request, [
            'dari_tgl' => 'required',
            'sampai_tgl' => 'required'
        ]);
        $dari = $request->dari_tgl;
        $sampai = $request->sampai_tgl;

        $title = "File Surat dari tanggal $dari sampai tanggal $sampai";
        $galeri = SuratMasuk::whereDate('tgl_surat', '>=', $dari)->whereDate('tgl_surat', '<=', $sampai)->orderBy('tgl_surat', 'desc')->get();

        return view('galerifile.suratmasuk', compact('galeri', 'title'));
    }

    public function getDataFileKeluar(Request $request)
    {
        $this->validate($request, [
            'dari_tgl' => 'required',
            'sampai_tgl' => 'required'
        ]);
        $dari = $request->dari_tgl;
        $sampai = $request->sampai_tgl;

        $title = "File Surat dari tanggal $dari sampai tanggal $sampai";
        $galeri = SuratKeluar::whereDate('tgl_surat', '>=', $dari)->whereDate('tgl_surat', '<=', $sampai)->orderBy('tgl_surat', 'desc')->get();

        return view('galerifile.suratkeluar', compact('galeri', 'title'));
    }
}
