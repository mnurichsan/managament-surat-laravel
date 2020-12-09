@extends('layouts.dashboard')
@section('title','Edit Klasifikasi Surat')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <a href="{{route('referensi.index')}}" class="btn btn-success btn-sm rounded">Back</a>
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
        <form action="{{route('referensi.update',$klasifikasi->id)}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputKode">Kode</label>
                        <input type="text" name="kode" class="form-control" id="inputKode" value="{{$klasifikasi->kode}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{$klasifikasi->nama}}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="uraian">Uraian</label>
                    <textarea type="text" name="uraian" class="form-control" id="uraian">{{$klasifikasi->uraian}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection