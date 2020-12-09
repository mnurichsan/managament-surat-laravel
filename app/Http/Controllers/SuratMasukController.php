<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use Exception;
use Validator;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return view('suratmasuk.index', compact('suratMasuk'));
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
            'asal_surat' => 'required',
            'indeks' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'isi' => 'required',
            'keterangan' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $file->move('asset_backend/surat-masuk/', $fileName);

        $data = $request->all();
        $data['file'] = $fileName;
        $data['tgl_diterima'] = now();
        $data['id_user'] = Auth()->user()->id;
        try {
            SuratMasuk::create($data);
            toast('Data berhasil di tambah', 'success');
            return redirect()->route('surat-masuk.index');
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sm = SuratMasuk::findOrFail($id);
        return view('suratmasuk.edit', compact('sm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_agenda' => 'required',
            'kode' => 'required',
            'asal_surat' => 'required',
            'indeks' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'isi' => 'required',
            'keterangan' => 'required'
        ]);

        $data = $request->all();
        if ($request->has('file')) {
            $suratK = SuratMasuk::select('file')->where('id', $id)->first();
            $file_path = "asset_backend/surat-masuk/$suratK->file";
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $file->move('asset_backend/surat-masuk/', $fileName);
            $data['file'] = $fileName;
        }
        try {
            SuratMasuk::findOrFail($id)->update($data);
            toast('Data berhasil di update', 'success');
            return redirect()->route('surat-masuk.index');
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratK = SuratMasuk::select('file')->where('id', $id)->first();
        $file_path = "asset_backend/surat-masuk/$suratK->file";
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        SuratMasuk::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('surat-masuk.index');
    }
}
