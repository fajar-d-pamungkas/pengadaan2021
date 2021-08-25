<!-- Modal -->
<div class="modal fade" id="ubahModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i>Ubah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/ubahPengadaan" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="id_pengadaan">
      <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pengadaan</label>
              <input type="text" class="form-control nama_pengadaan" name="u_nama_pengadaan" id="u_nama_pengadaan" placeholder="Masukkan Nama Pengadaan">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi</label>
              <textarea class="form-control deskripsi" name="u_deskripsi" id="u_deskripsi" placeholder="Masukkan Deskripsi"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Anggaran <input type="" class="labelRp" disable style="border:none; backround-color:white; color:black;"></label>
              <input type="text" class="form-control anggaran" name="u_anggaran" id="u_anggaran" placeholder="Masukkan Anggaran" onkeyup="u_currency()">
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
    </form>
    </div>
  </div>
</div>
