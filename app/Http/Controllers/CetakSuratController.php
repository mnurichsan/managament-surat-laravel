<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use Illuminate\Http\Request;
use PDF;

class CetakSuratController extends Controller
{
    public function cetakDisposisi($id)
    {
        $surat = SuratMasuk::with('disposisi')->findOrFail($id);
        $pdf = PDF::loadview('suratmasuk.cetak', ['surat' => $surat]);
        return $pdf->stream();
        // return view('suratmasuk.cetak', compact('surat'));
    }

    public function cetakAgendaMasuk()
    {
        //
    }
}
