@extends('layouts.dashboard')
@section('title','Data Penerbangan')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3>Data Pesawat</h3>
            </div>
            <div class="card-body">
                <div class="cardmb-4">
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
                                        <th>Tanggal</th>
                                        <th>Datang</th>
                                        <th>Berangkat</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($penerbangan as $pen => $p)
                                    <tr>
                                        <td>{{$p->tanggal}}</td>
                                        <td>{{$p->datang}}</td>
                                        <td>{{$p->berangkat}}</td>
                                        <td>{{$p->total}}</td>
                                        <td>
                                            <a href="{{route('pesawat.edit',$p->id)}}" class="btn btn-sm btn-primary edit-btn-surat mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('pesawat.delete',$p->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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

    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3>Data Penumpang</h3>
            </div>
            <div class="card-body">
                <div class="cardmb-4">
                    <div class="card-header py-3">
                        <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambahPen"><i class="fas fa-plus"></i> Tambah Data</button>
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
                                        <th>Tanggal</th>
                                        <th>Datang</th>
                                        <th>Berangkat</th>
                                        <th>Transit</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($penumpang as $pen => $p)
                                    <tr>
                                        <td>{{$p->tanggal}}</td>
                                        <td>{{$p->datang}}</td>
                                        <td>{{$p->berangkat}}</td>
                                        <td>{{$p->transit}}</td>
                                        <td>{{$p->total}}</td>
                                        <td>
                                            <a href="{{route('penumpangpesawat.edit',$p->id)}}" class="btn btn-sm btn-primary edit-btn-surat mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('penumpangpesawat.delete',$p->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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

    </div>
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="tambahRef" tabindex="-1" role="dialog" aria-labelledby="tambahReferensiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahReferensiLabel">Tambah Data Penerbangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pesawat.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="uraian">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">jumlah Datang</label>
                        <input type="number" name="datang" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">Jumlah Keberangkatan</label>
                        <input type="number" name="berangkat" class="form-control" />
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

<!-- Modal -->
<div class="modal fade" id="tambahPen" tabindex="-1" role="dialog" aria-labelledby="tambahReferensiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahReferensiLabel">Tambah Data Penumpang Penerbangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('penumpangpesawat.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="uraian">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">jumlah Datang</label>
                        <input type="number" name="datang" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">Jumlah Transit</label>
                        <input type="number" name="transit" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="uraian">Jumlah Keberangkatan</label>
                        <input type="number" name="berangkat" class="form-control" />
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