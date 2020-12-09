@extends('layouts.dashboard')
@section('title','Surat Masuk')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambahSurat"><i class="fas fa-plus"></i> Tambah Data</button>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Agenda</th>
                                <th>Kode</th>
                                <th>Isi Ringkas</th>
                                <th>File</th>
                                <th>Asal Surat</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratMasuk as $suratma => $sm)
                            <tr>
                                <td>{{$sm->no_agenda}}</td>
                                <td>{{$sm->kode}}</td>
                                <td>{{$sm->isi}}</td>
                                <td>{{$sm->file}}</td>
                                <td>{{$sm->asal_surat}}</td>
                                <td>{{$sm->no_surat}}</td>
                                <td>{{$sm->tgl_surat->format('d-m-Y')}}</td>
                                <td class="d-flex">
                                    <div>
                                        <a href="{{route('surat-masuk.edit',$sm->id)}}" class="btn btn-sm btn-primary mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('disposisi.index',$sm->id)}}" class="btn btn-sm btn-success" style="width:35px;height:30px;" title="klik untuk menambahkan disposisi surat"><i class="fas fa-file-alt"></i></a>
                                    </div>
                                    <div>
                                        <a target="_blank" href="{{route('cetak.surat',$sm->id)}}" class="btn btn-sm btn-warning mr-1 mb-1" style="width:35px;height:30px;" title="PRINT"><i class="fas fa-print"></i></a>
                                        <a href="{{route('surat-masuk.destroy',$sm->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="tambahSurat" tabindex="-1" role="dialog" aria-labelledby="tambahSuratLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSuratLabel">Tambah Data Surat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('surat-masuk.store')}}" method="post" enctype="multipart/form-data">
                <div class=" modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNoAgenda4">Nomor Agenda</label>
                            <input type="text" name="no_agenda" class="form-control" id="inputNoAgenda4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputKodeK4">Kode Klasifikasi</label>
                            <input type="text" name="kode" class="form-control" id="inputKodeK4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAsalSurat4">Asal Surat</label>
                            <input type="text" name="asal_surat" class="form-control" id="inputAsalSurat4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputIndeksBerkas4">Indeks Berkas</label>
                            <input type="text" name="indeks" class="form-control" id="inputIndeksBerkas4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNoSurat4">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control" id="inputNoSurat4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTanggalSurat4">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" class="form-control" id="inputTanggalSurat4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIsiRingkas4">Isi Ringkas</label>
                            <input type="text" name="isi" class="form-control" id="inputIsiRingkas4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputKeterangan4">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="inputKeterangan4" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFile">File</label>
                        <input type="file" name="file" class="form-control-file" id="inputFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection