@extends('layouts.dashboard')
@section('title','Edit Penerbangan')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <a href="{{route('penerbangan.index')}}" class="btn btn-success btn-sm rounded">Back</a>
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
        <form action="{{route('pesawat.update',$penerbangan->id)}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="uraian">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $penerbangan->tanggal }}" />
                </div>
                <div class="form-group">
                    <label for="uraian">jumlah Datang</label>
                    <input type="text" name="datang" class="form-control" value="{{$penerbangan->datang}}" />
                </div>
                <div class="form-group">
                    <label for="uraian">Jumlah Keberangkatan</label>
                    <input type="number" name="berangkat" class="form-control" value="{{$penerbangan->berangkat}}" />
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