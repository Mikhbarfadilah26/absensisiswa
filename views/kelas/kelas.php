<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-gradient-primary mb-3">
      <div class="row">
        <div class="col tekstebal">
          <strong>
            <h5 style="font-family:Arial, Helvetica, sans-serif;">Halaman Tampil Kelas</h5>
          </strong>
        </div>
        <div class="col">
          <a href="index.php?halaman=tambahkelas" class="btn btn-light float-right btn-sm">
            <i class="fas fa-plus"></i> Tambah Kelas
          </a>
        </div>
      </div>
    </div>

    <table id="example1" class="table table-bordered table-striped text-sm ml-2">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kelas</th>
          <th>Foto Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include __DIR__ . '/../../koneksi.php'; // koneksi ke database

        $no = 1;
        $sqlkelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY namakelas ASC");

        while ($datakelas = mysqli_fetch_array($sqlkelas)) :
        ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= htmlspecialchars($datakelas['namakelas']); ?></td>
            <td>
              <?php if (!empty($datakelas['fotokelas'])): ?>
                <img src="foto/kelas/<?= htmlspecialchars($datakelas['fotokelas']); ?>" 
                     width="60" height="60" class="rounded" alt="Foto Kelas">
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="index.php?halaman=editkelas&id=<?= $datakelas['idkelas']; ?>" 
                 class="btn btn-sm btn-warning" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
              <a href="db/dbkelas.php?proses=hapus&idkelas=<?= $datakelas['idkelas']; ?>" 
                 class="btn btn-sm btn-danger" title="Hapus"
                 onclick="return confirm('Yakin ingin menghapus data kelas ini?');">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
        <?php
          $no++;
        endwhile;
        ?>
      </tbody>
    </table>

    <div class="card-footer">
      Footer
    </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
