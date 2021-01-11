@extends('layouts.dashboard')
@section('title','Edit Resntra')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <a href="{{route('renstra.index')}}" class="btn btn-success btn-sm rounded">Back</a>
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
        <form action="{{route('renstra.update',$renstra->id)}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="uraian">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" value="{{$renstra->nama_kegiatan}}" />
                </div>
                <div class="form-group">
                    <label for="uraian">Sub Kegiatan</label>
                    <input type="text" name="sub_kegiatan" class="form-control" value="{{$renstra->sub_kegiatan}}" />
                </div>
                <div class="form-group">
                    <label for="uraian">Jumlah Anggaran</label>
                    <input type="number" name="jumlah_anggaran" class="form-control" value="{{$renstra->jumlah_anggaran}}" />
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