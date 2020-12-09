@extends('layouts.dashboard')
@section('title','Surat Keluar')
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
                                <th>Tujuan</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratKeluar as $suratke => $sk)
                            <tr>
                                <td>{{$sk->no_agenda}}</td>
                                <td>{{$sk->kode}}</td>
                                <td>{{$sk->isi}}</td>
                                <td>{{$sk->file}}</td>
                                <td>{{$sk->tujuan}}</td>
                                <td>{{$sk->no_surat}}</td>
                                <td>{{$sk->tgl_surat->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{ route('surat-keluar.edit', $sk->id) }}" class="btn btn-sm btn-primary edit-btn-surat mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>

                                    <a href="{{route('surat-keluar.destroy',$sk->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title" id="tambahSuratLabel">Tambah Data Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('surat-keluar.store')}}" method="post" enctype="multipart/form-data">
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
                            <label for="inputTujuan">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="inputTujuan" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNoSurat4">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control" id="inputNoSurat4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTanggalSurat4">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" class="form-control" id="inputTanggalSurat4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputKeterangan4">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="inputKeterangan4" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputIsiRingkas4">Isi Ringkas</label>
                        <input type="text" name="isi" class="form-control" id="inputIsiRingkas4" />
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