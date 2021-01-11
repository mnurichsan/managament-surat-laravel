<?php

namespace App\Http\Controllers;

use App\renstra;
use Illuminate\Http\Request;

class RenstraController extends Controller
{
    public function index()
    {
        $renstra = renstra::all();
        return view('renstra.index', compact('renstra'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kegiatan' => 'required',
            'sub_kegiatan' => 'required',
            'jumlah_anggaran' => 'required'
        ]);

        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'sub_kegiatan' => $request->sub_kegiatan,
            'jumlah_anggaran' => $request->jumlah_anggaran,
        ];

        renstra::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('renstra.index');
    }

    public function edit($id)
    {
        $renstra = Renstra::findOrFail($id);
        return view('renstra.edit', compact('renstra'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kegiatan' => 'required',
            'sub_kegiatan' => 'required',
            'jumlah_anggaran' => 'required'
        ]);

        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'sub_kegiatan' => $request->sub_kegiatan,
            'jumlah_anggaran' => $request->jumlah_anggaran,
        ];

        renstra::findOrFail($id)->update($data);
        toast('Data berhasil di edit', 'success');
        return redirect()->route('renstra.index');
    }

    public function delete($id)
    {
        Renstra::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('renstra.index');
    }
}
