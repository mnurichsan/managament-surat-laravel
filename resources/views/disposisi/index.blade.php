@extends('layouts.dashboard')
@section('title','Disposisi Surat')
@section('content')
<div class="row mb-3">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                Perihal Surat : {{ $title->isi }}
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('surat-masuk.index')}}" class="btn btn-success btn-sm">Back</a>
                <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambahDisposisi"><i class="fas fa-plus"></i> Tambah Data</button>
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
                                <th>No</th>
                                <th>Tujuan Disposisi</th>
                                <th>Isi Disposisi</th>
                                <th>Sifat</th>
                                <th>Batas Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($disposisi as $dis => $d)
                            <tr>
                                <td>{{$dis+1}}</td>
                                <td>{{$d->tujuan}}</td>
                                <td>{{$d->isi}}</td>
                                <td>{{$d->sifat}}</td>
                                <td>{{$d->batas_waktu}}</td>
                                <td class="d-flex">
                                    <div>
                                        <a href="{{route('disposisi.edit',$d->id)}}" class="btn btn-sm btn-primary mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('disposisi.destroy',$d->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahDisposisi" tabindex="-1" role="dialog" aria-labelledby="tambahDisposisiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSuratLabel">Tambah Data Disposisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('disposisi.store',$title->id)}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNoAgenda4">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="inputNoAgenda4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputKodeK4">Batas Waktu</label>
                            <input type="date" name="batas_waktu" class="form-control" id="inputKodeK4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIsi4">Isi Disposisi</label>
                            <input type="text" name="isi" class="form-control" id="inputIsi4" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCatatan4">Catatan</label>
                            <input type="text" name="catatan" class="form-control" id="inputCatatan4" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFile">Pilih Sifat Disposisi</label>
                        <select class="custom-select custom-select-md" name="sifat">
                            <option selected>-- Pilih Sifat Disposisi -- </option>
                            <option value="Biasa">Biasa</option>
                            <option value="Penting">Penting</option>
                            <option value="Segera">Segera</option>
                            <option value="Rahasia">Rahasia</option>
                        </select>
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