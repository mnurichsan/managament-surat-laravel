<?php

namespace App\Http\Controllers;

use App\detail_transportasi;
use App\Penumpang;
use Illuminate\Http\Request;

class DetailTransportasiController extends Controller
{
    //penerbangan
    public function penerbanganIndex()
    {
        $penumpang = Penumpang::where('id_transportasi', 1)->get();
        $penerbangan =  detail_transportasi::where('id_transportasi', 1)->get();
        return view('data.data_penerbangan.index', compact('penerbangan', 'penumpang'));
    }

    public function penerbanganStore(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required'
        ]);

        $total = $request->berangkat + $request->datang;

        $data = [
            'id_transportasi' => 1,
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'total' => $total
        ];

        detail_transportasi::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('penerbangan.index');
    }

    public function editPenerbangan($id)
    {
        $penerbangan = detail_transportasi::where('id_transportasi', 1)->where('id', $id)->first();


        return view('data.data_penerbangan.edit', compact('penerbangan'));
    }

    public function updatePenerbangan(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required'
        ]);

        $total = $request->berangkat + $request->datang;

        $data = [
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'total' => $total
        ];

        detail_transportasi::FindOrFail($id)->update($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('penerbangan.index');
    }

    public function deletePenerbangan($id)
    {
        detail_transportasi::findOrFail($id)->delete();
        toast('Data berhasil di delete', 'success');
        return redirect()->route('penerbangan.index');
    }

    //penumpang

    public function penerbanganPenumpangStore(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required',
            'transit' => 'required'
        ]);

        $total = $request->berangkat + $request->datang  + $request->transit;

        $data = [
            'id_transportasi' => 1,
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'transit' => $request->transit,
            'total' => $total
        ];

        Penumpang::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('penerbangan.index');
    }

    public function editPenerbanganPenumpangEdit($id)
    {
        $penumpang = Penumpang::where('id_transportasi', 1)->where('id', $id)->first();


        return view('data.data_penerbangan.edit_penumpang', compact('penumpang'));
    }

    public function updatePenerbanganPenumpang(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required',
            'transit' => 'required'
        ]);

        $total = $request->berangkat + $request->datang + $request->transit;

        $data = [
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'transit' => $request->transit,
            'total' => $total
        ];

        Penumpang::findOrFail($id)->update($data);
        toast('Data berhasil di update', 'success');
        return redirect()->route('penerbangan.index');
    }

    public function deletePenerbanganPenumpang($id)
    {
        Penumpang::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('penerbangan.index');
    }

    //data pelabuhan
    public function pelabuhanIndex()
    {
        $pelabuhan = detail_transportasi::where('id_transportasi', 2)->get();
        $penumpang = Penumpang::where('id_transportasi', 2)->get();
        return view('data.data_pelabuhan.index', compact('pelabuhan', 'penumpang'));
    }

    public function pelabuhanStore(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required'
        ]);

        $total = $request->berangkat + $request->datang;

        $data = [
            'id_transportasi' => 2,
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'total' => $total
        ];

        detail_transportasi::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('pelabuhan.index');
    }

    public function editPelabuhan($id)
    {
        $pelabuhan = detail_transportasi::where('id_transportasi', 2)->where('id', $id)->first();


        return view('data.data_pelabuhan.edit', compact('pelabuhan'));
    }

    public function updatePelabuhan(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required'
        ]);

        $total = $request->berangkat + $request->datang;

        $data = [
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'total' => $total
        ];

        detail_transportasi::FindOrFail($id)->update($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('pelabuhan.index');
    }

    public function deletePelabuhan($id)
    {
        detail_transportasi::findOrFail($id)->delete();
        toast('Data berhasil di delete', 'success');
        return redirect()->route('pelabuhan.index');
    }

    //penumpang

    public function pelabuhanPenumpangStore(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required',
            'transit' => 'required'
        ]);

        $total = $request->berangkat + $request->datang  + $request->transit;

        $data = [
            'id_transportasi' => 2,
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'transit' => $request->transit,
            'total' => $total
        ];

        Penumpang::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('pelabuhan.index');
    }

    public function editPelabuhanPenumpangEdit($id)
    {
        $penumpang = Penumpang::where('id_transportasi', 2)->where('id', $id)->first();


        return view('data.data_pelabuhan.edit_penumpang', compact('penumpang'));
    }

    public function updatePelabuhanPenumpang(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'berangkat' => 'required',
            'datang' => 'required',
            'transit' => 'required'
        ]);

        $total = $request->berangkat + $request->datang + $request->transit;

        $data = [
            'tanggal' => $request->tanggal,
            'berangkat' => $request->berangkat,
            'datang' => $request->datang,
            'transit' => $request->transit,
            'total' => $total
        ];

        Penumpang::findOrFail($id)->update($data);
        toast('Data berhasil di update', 'success');
        return redirect()->route('pelabuhan.index');
    }

    public function deletePelabuhanPenumpang($id)
    {
        Penumpang::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('pelabuhan.index');
    }
}
