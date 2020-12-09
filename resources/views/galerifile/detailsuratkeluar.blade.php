@extends('layouts.dashboard')
@section('title','Detail Surat Keluar')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <a href="{{route('galeri.keluar')}}" class="btn btn-sm btn-success">Back</a>
                <div class="text-center">
                    {{ $galeri->isi }}
                </div>

            </div>
            <div class="card-body text-center">
                <embed src="{{ asset('asset_backend/surat-keluar/'.$galeri->file) }}" style="width:700px; height:800px;" frameborder="0">
            </div>
        </div>
    </div>
</div>
@endsection