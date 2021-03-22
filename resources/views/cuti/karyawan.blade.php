<div class="modal" id="modal-cuti" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title">Pilih Karyawan</h3>
   </div>
            
<div class="modal-body">
   <table class="table table-striped tabel-cuti">
      <thead>
         <tr>
            <th>No. Induk</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach($karyawan as $data)
         <tr>
            <th>{{ $data->no_induk }}</th>
            <th>{{ $data->nama }}</th>
            <th>{{ $data->alamat }}</th>
            <th><a href="cuti/{{ $data->id_supplier }}/tambah" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
          </tr>
         @endforeach
      </tbody>
   </table>

</div>
      
         </div>
      </div>
   </div>
