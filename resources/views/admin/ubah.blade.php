<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-edit
          '>
        </i>Ubah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/ubahAdmin" method="post" role="form">
        {{csrf_field()}}
        <input type="hidden" name="id_admin" id="id_admin" class="id_admin">
      <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control nama" name="nama_ubah" id="nama_ubah" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control email" name="email_ubah" id="email_ubah" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input type="textarea" class="form-control alamat" name="alamat_ubah" id="alamat_ubah" placeholder="Masukkan Alamat">
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
