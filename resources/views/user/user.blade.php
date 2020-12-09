@extends('layouts.dashboard')
@section('title','User')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambahUser"><i class="fas fa-plus"></i> Tambah Data</button>
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
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr>
                                <td>{{$u->email}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->level == 0 ? 'Admin' : 'Petugas Disposisi'}}</td>
                                <td>
                                    <a href="{{route('user.edit',$u->id)}}" class="btn btn-sm btn-primary edit-btn-surat mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('user.destroy',$u->id)}}" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" />
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="name" class="form-control" id="nama" />
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection