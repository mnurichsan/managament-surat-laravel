<?php

namespace App\Http\Controllers;

use App\SuratKeluar;
use Exception;
use Validator;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return view('suratkeluar.index', compact('suratKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'no_agenda' => 'required',
            'kode' => 'required',
            'tujuan' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'isi' => 'required',
            'keterangan' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $file->move('asset_backend/surat-keluar/', $fileName);

        $data = $request->all();
        $data['file'] = $fileName;
        $data['tgl_catat'] = now();
        $data['id_user'] = Auth()->user()->id;
        try {
            SuratKeluar::create($data);
            toast('Data berhasil di tambah', 'success');
            return redirect()->route('surat-keluar.index');
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sk = SuratKeluar::findOrFail($id);
        return view('suratkeluar.edit', compact('sk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_agenda' => 'required',
            'kode' => 'required',
            'tujuan' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'isi' => 'required',
            'keterangan' => 'required'
        ]);
        $data = $request->all();

        if ($request->has('file')) {
            $suratK = SuratKeluar::select('file')->where('id', $id)->first();
            $file_path = "asset_backend/surat-keluar/$suratK->file";
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $file->move('asset_backend/surat-keluar/', $fileName);
            $data['file'] = $fileName;
        }
        try {
            SuratKeluar::findOrFail($id)->update($data);
            toast('Data berhasil di update', 'success');
            return redirect()->route('surat-keluar.index');
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratKeluar $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratKeluar::select('file')->where('id', $id)->first();
        $file_path = "asset_backend/surat-keluar/$data->file";
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        SuratKeluar::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('surat-keluar.index');
    }
}
