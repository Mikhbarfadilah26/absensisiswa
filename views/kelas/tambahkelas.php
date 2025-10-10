<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Tambah Kelas</h3>
  </div>
  <!-- /.card-header -->

  <!-- form start -->
  <form action="proses_tambah_kelas.php" method="POST">
    <div class="card-body">

      <div class="form-group">
        <label for="nama_kelas">Nama Kelas</label>
        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan nama kelas (contoh: X IPA 1)" required>
      </div>

      <div class="form-group">
        <label for="wali_kelas">Wali Kelas</label>
        <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" placeholder="Masukkan nama wali kelas" required>
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan (opsional)..."></textarea>
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="kelas.php" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
