@extends('layouts.dashboard')
@section('title','Renstra')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambahRef"><i class="fas fa-plus"></i> Tambah Data</button>
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
                                <th>Nama Kegiatan</th>
                                <th>Sub Kegiatan</th>
                                <th>Jumlah Anggaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($renstra as $rens => $r)
                            <tr>
                                <td>{{$r->nama_kegiatan}}</td>
                                <td>{{$r->sub_kegiatan}}</td>
                                <td>{{$r->jumlah_anggaran}}</td>
                                <td>
                                    <a href="{{route('renstra.edit',$r->id)}}" class="btn btn-sm btn-primary edit-btn-surat mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('renstra.destroy',$r->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahRef" tabindex="-1" role="dialog" aria-labelledby="tambahReferensiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahReferensiLabel">Tambah Data Renstra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('renstra.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="uraian">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">Sub Kegiatan</label>
                        <input type="text" name="sub_kegiatan" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">Jumlah Anggaran</label>
                        <input type="number" name="jumlah_anggaran" class="form-control" />
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