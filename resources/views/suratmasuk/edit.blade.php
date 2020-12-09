@extends('layouts.dashboard')
@section('title','Edit Surat Masuk')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <a href="{{route('surat-masuk.index')}}" class="btn btn-success btn-sm">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('surat-masuk.update',$sm->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="noAgenda">Nomor Agenda</label>
                        <input type="text" name="no_agenda" class="form-control" id="noAgenda" value="{{$sm->no_agenda}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kodeKlasifikasi">Kode Klasifikasi</label>
                        <input type="text" name="kode" class="form-control" id="kodeKlasifikasi" value="{{$sm->kode}}" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="asalSurat">Asal Surat</label>
                        <input type="text" name="asal_surat" class="form-control" id="asalSurat" value="{{$sm->asal_surat}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="indeksBerkas">Indeks Berkas</label>
                        <input type="text" name="indeks" class="form-control" id="indeksBerkas" value="{{$sm->indeks}}" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="noSurat">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" id="noSurat" value="{{$sm->no_surat}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tglSurat">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" id="tglSurat" value="{{$sm->tgl_surat}}" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="isiRingkas">Isi Ringkas</label>
                        <input type="text" name="isi" class="form-control" id="isiRingkas" value="{{$sm->isi}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$sm->keterangan}}" />
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="file">File</label><br>
                    <p>Nama File : {{$sm->file}}</p>
                    <input type="file" name="file" class="form-control-file" id="file" />
                </div>
            </div>
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection