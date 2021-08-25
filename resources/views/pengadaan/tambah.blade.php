<!-- Modal -->
<div class="modal fade" id="pengadaanModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-plus'></i>Tambah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/tambahPengadaan" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pengadaan</label>
              <input type="text" class="form-control" name="nama_pengadaan" id="nama_pengadaan" placeholder="Masukkan Nama Pengadaan">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Gambar</label>
              <input type="file" class="form-control" name="gambar" id="gambar" accept="image/png, image/jpeg, image/gif">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Anggaran <input type="" class="labelRp" disable style="border:none; backround-color:white; color:black;"></label>
              <input type="text" class="form-control" name="anggaran" id="anggaran" placeholder="Masukkan Anggaran" onkeyup="currency()">
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
