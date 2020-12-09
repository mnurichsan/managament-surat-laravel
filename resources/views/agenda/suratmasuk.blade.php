@extends('layouts.dashboard')
@section('title','Cetak Agenda Surat Masuk')
@section('content')
<div class="card shadow">
    <form action="{{route('agenda-suratmasuk.periode')}}" method="get">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dariTanggal">Dari Tanggal</label>
                    <input type="date" name="dari_tgl" class="form-control" id="dariTanggal" />
                </div>
                <div class="form-group col-md-6">
                    <label for="sampaiTanggal">Sampai Tanggal</label>
                    <input type="date" name="sampai_tgl" class="form-control" id="sampaiTanggal" />
                </div>
            </div>
            <div class="float-right mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@if($suratMasuk != null)
<div class="row mt-3">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="text-left">{{$title}}</div>
                <!-- <div class="text-right">
                    <button type="button" class="btn btn-flat btn-danger"><i class="fas fa-file-pdf"></i> Cetak</button>
                </div> -->
            </div>
            <div class="card-body">
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($suratMasuk as $suratma => $sm)
                                <td>{{$sm->no_agenda}}</td>
                                <td>{{$sm->kode}}</td>
                                <td>{{$sm->isi}}</td>
                                <td>{{$sm->file}}</td>
                                <td>{{$sm->asal_surat}}</td>
                                <td>{{$sm->no_surat}}</td>
                                <td>{{$sm->tgl_surat->format('d-m-Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection