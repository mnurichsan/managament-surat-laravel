<?php

namespace App\Http\Controllers;

use App\Referensi;
use Illuminate\Http\Request;

class ReferensiController extends Controller
{
    public function index()
    {
        $klasifikasi = Referensi::all();
        return view('referensi.index', compact('klasifikasi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'uraian' => 'required'
        ]);

        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'uraian' => $request->uraian,
            'id_user' => Auth()->user()->id
        ];

        Referensi::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('referensi.index');
    }

    public function edit($id)
    {
        $klasifikasi = Referensi::findOrFail($id);
        return view('referensi.edit', compact('klasifikasi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'uraian' => 'required'
        ]);

        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'uraian' => $request->uraian
        ];

        Referensi::findOrFail($id)->update($data);
        toast('Data berhasil di update', 'success');
        return redirect()->route('referensi.index');
    }

    public function destroy($id)
    {
        Referensi::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('referensi.index');
    }
}
