<?php

namespace App\Http\Controllers;

use App\Disposisi;
use App\SuratMasuk;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index($id)
    {
        $disposisi = Disposisi::where('id_surat', $id)->get();
        $title = SuratMasuk::where('id', $id)->first();
        return view('disposisi.index', compact('disposisi', 'title'));
    }

    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'tujuan' => 'required',
            'batas_waktu' => 'required',
            'isi' => 'required',
            'catatan' => 'required',
            'sifat' => 'required'
        ]);

        $data = [
            'tujuan' => $request->tujuan,
            'batas_waktu' => $request->batas_waktu,
            'isi' => $request->isi,
            'catatan' => $request->catatan,
            'sifat' => $request->sifat,
            'id_surat' => $id,
            'id_user' => Auth()->user()->id
        ];
        Disposisi::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('disposisi.index', $id);
    }

    public function edit($id)
    {
        $disposisi = Disposisi::where('id', $id)->first();
        return view('disposisi.edit', compact('disposisi'));
    }

    public function update(Request $request, $id, $surat)
    {
        $this->validate($request, [
            'tujuan' => 'required',
            'batas_waktu' => 'required',
            'isi' => 'required',
            'catatan' => 'required',
            'sifat' => 'required'
        ]);

        $data = [
            'tujuan' => $request->tujuan,
            'batas_waktu' => $request->batas_waktu,
            'isi' => $request->isi,
            'catatan' => $request->catatan,
            'sifat' => $request->sifat
        ];

        Disposisi::findOrFail($id)->update($data);
        toast('Data berhasil di update', 'success');
        return redirect()->route('disposisi.index', $surat);
    }

    public function destroy($id)
    {
        Disposisi::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->back();
    }
}
