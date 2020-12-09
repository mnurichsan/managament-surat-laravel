 @extends('layouts.dashboard')
 @section('title','Manajemen Instansi')
 @section('content')
 <div class="card shadow">
     <div class="card-header">
         <h2>Manajemen Instansi</h2>
     </div>
     <div class="card-body">
         <form method="post" action="" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="namaInstansi">Nama Instansi</label>
                     <input type="text" name="nInstansi" class="form-control" id="namaInstansi" />
                 </div>
                 <div class="form-group col-md-6">
                     <label for="namaYayasan">Nama Yayasan</label>
                     <input type="text" name="nYayasan" class="form-control" id="namaYayasan" />
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="status">Status</label>
                     <input type="text" name="kode" class="form-control" id="status" />
                 </div>
                 <div class="form-group col-md-6">
                     <label for="nKepsek">Nama Kepala Sekolah</label>
                     <input type="text" name="nKepsek" class="form-control" id="nKepsek" />
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="alamat">Alamat</label>
                     <input type="date" name="alamat" class="form-control" id="alamat" value="{{$sk->tgl_surat}}" />
                 </div>
                 <div class="form-group col-md-6">
                     <label for="nipKepsek">NIP Kepala Sekolah</label>
                     <input type="text" name="nipKepsek" class="form-control" id="nipKepsek" />
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="website">Website</label>
                     <input type="text" name="website" class="form-control" id="website" />
                 </div>
                 <div class="form-group col-md-6">
                     <label for="eInstansi">Email Instansi</label>
                     <input type="text" name="email_instansi" class="form-control" id="eInstansi" />
                 </div>
             </div>
             <div class="form-group">
                 <label for="file">File</label><br>
                 <p>Nama File : </p>
                 <input type="file" name="file" class="form-control-file" id="fileUpload">
                 <p style="font-size:10px; color:red;">*Format file yang diperbolehkan hanya *.JPG, *.PNG dan ukuran maksimal file 2 MB. Disarankan gambar berbentuk kotak atau lingkaran!</p>
             </div>
             <div class="d-flex justify-content-end">
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
         </form>
     </div>
 </div>
 @endSection