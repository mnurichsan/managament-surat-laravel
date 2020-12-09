 @extends('layouts.dashboard')
 @section('title','Edit Surat Masuk')
 @section('content')
 <div class="card shadow">
     <div class="card-header">
         <a href="{{route('surat-keluar.index')}}" class="btn btn-success btn-sm">Back</a>
     </div>
     <div class="card-body">
         <form method="post" action="{{route('surat-keluar.update',$sk->id)}}" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="modal-body">
                 <div class="form-row">
                     <div class="form-group col-md-6">
                         <label for="noAgenda">Nomor Agenda</label>
                         <input type="text" name="no_agenda" class="form-control" id="noAgenda" value="{{$sk->no_agenda}}" />
                     </div>
                     <div class="form-group col-md-6">
                         <label for="kodeKlasifikasi">Kode Klasifikasi</label>
                         <input type="text" name="kode" class="form-control" id="kodeKlasifikasi" value="{{$sk->kode}}" />
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-md-6">
                         <label for="tujuanSurat">Tujuan Surat</label>
                         <input type="text" name="tujuan" class="form-control" id="tujuanSurat" value="{{$sk->tujuan}}" />
                     </div>
                     <div class="form-group col-md-6">
                         <label for="noSurat">Nomor Surat</label>
                         <input type="text" name="no_surat" class="form-control" id="noSurat" value="{{$sk->no_surat}}" />
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-md-6">
                         <label for="tglSurat">Tanggal Surat</label>
                         <input type="date" name="tgl_surat" class="form-control" id="tglSurat" value="{{$sk->tgl_surat}}" />
                     </div>
                     <div class="form-group col-md-6">
                         <label for="keterangan">Keterangan</label>
                         <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$sk->keterangan}}" />
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="isiRingkas">Isi Ringkas</label>
                     <textarea class="form-control" name="isi" id="isiRingkas" rows="4">{{$sk->isi}}</textarea>
                 </div>
                 <div class="form-group">
                     <label for="file">File</label><br>
                     <p>Nama File : {{$sk->file}}</p>
                     <input type="file" name="file" class="form-control-file" id="fileUpload">
                 </div>

             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary">Update</button>
             </div>
         </form>
     </div>
 </div>
 @endSection