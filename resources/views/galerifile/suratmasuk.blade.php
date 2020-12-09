@extends('layouts.dashboard')
@section('title','Galeri File Surat Masuk')
@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow">
            <form action="{{route('galerimasuk.periode')}}" method="get">
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
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if($title != null)
<div class="row mb-4">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center">{{$title}}</div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    @foreach($galeri as $g)
    <div class="col-4">
        <div class="card shadow">
            <div class="text-center mt-2">
                <img class="img-fluid" width="200px" src="{{asset('asset_backend/img/pdflogo.png')}}" alt="Card image cap">
            </div>
            <div class="card-body">
                <p class="card-text">{{$g->isi}}</p>
                <p><a href="{{ route('detail.masuk',$g->id) }}" class="btn btn-success">Lihat isi Surat</a></p>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection