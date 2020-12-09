@extends('layouts.dashboard')
@section('title','Edit Disposisi')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <a href="{{route('disposisi.index',$disposisi->id_surat)}}" class="btn btn-success btn-sm">Back</a>
    </div>
    <div class="card-body">
        <form action="{{route('disposisi.update',[$disposisi->id,$disposisi->id_surat])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="eTujuan">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" id="eTujuan" value="{{$disposisi->tujuan}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="eBatasWaktu">Batas Waktu</label>
                        <input type="date" name="batas_waktu" class="form-control" id="eBatasWaktu" value="{{$disposisi->batas_waktu}}" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="eIsi">Isi Disposisi</label>
                        <input type="text" name="isi" class="form-control" id="eIsi" value="{{$disposisi->isi}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="eCatatan">Catatan</label>
                        <input type="text" name="catatan" class="form-control" id="eCatatan" value="{{$disposisi->catatan}}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="eSifat">Pilih Sifat Disposisi</label>
                    <select class="custom-select custom-select-md" name="sifat">
                        <option>-- Pilih Sifat Disposisi -- </option>
                        <option value="Biasa" @if($disposisi->sifat == "Biasa") selected @endif >Biasa</option>
                        <option value="Penting" @if($disposisi->sifat == "Penting") selected @endif >Penting</option>
                        <option value="Segera" @if($disposisi->sifat == "Segera") selected @endif >Segera</option>
                        <option value="Rahasia" @if($disposisi->sifat == "Rahasia") selected @endif >Rahasia</option>
                    </select>
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