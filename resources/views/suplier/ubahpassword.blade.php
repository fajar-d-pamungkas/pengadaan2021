<div class="modal fade" id="ubahPasswordSup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-edit'>
        </i>Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/ubahPasswordSup" method="post" role="form">
          {{csrf_field()}}
        <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Password Lama</label>
                <input type="password" class="form-control" name="passwordlama" id="passwordlama" placeholder="Masukkan Password Lama">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password Baru</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru">
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
</div>
