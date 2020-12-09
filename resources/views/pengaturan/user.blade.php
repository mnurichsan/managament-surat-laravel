<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2>Manajemen User</h2>
                <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambahSurat"><i class="fas fa-plus"></i> Tambah User</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratKeluar as $suratke => $sk)
                            <tr>
                                <td>{{$sk->no_agenda}}</td>
                                <td>{{$sk->kode}}</td>
                                <td>{{$sk->isi}}</td>
                                <td>{{$sk->file}}</td>
                                <td>{{$sk->tgl_surat}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary edit-btn-surat mr-1 mb-1" style="width:35px;height:30px;" title="EDIT"><i class="fas fa-edit"></i></a>

                                    <a href="#" style="width:35px;height:30px;" class="btn btn-sm btn-danger btn-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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