@extends('layouts.dashboard')
@section('title','Edit User')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <a href="{{route('user.index')}}" class="btn btn-sm btn-success">Back</a>
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
        <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" />
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" class="form-control" id="nama" value="{{$user->name}}" />
                </div>
                <div class="form-group">
                    <label for="nama">Password</label>
                    <input type="password" name="password" class="form-control" id="password" />
                </div>

                <!-- <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <textarea type="text" name="uraian" class="form-control" id="uraian"></textarea>
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection