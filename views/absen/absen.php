<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database
// Ambil data dari tabel absen
$query = mysqli_query($koneksi, "SELECT * FROM absen ORDER BY tanggal DESC");

// Cek jika ada error pada query
if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Absen</h3>
    </div>

    <div class="card-body">
        <div class="col">
            <a href="index.php?halaman=tambahabsen" class="btn btn-primary float-right btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Absen
            </a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Absen</th>
                    <th>Nama Absen</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                // Lakukan looping selama masih ada data
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= htmlspecialchars($data['idabsen']); ?></td>
                        <td><?= htmlspecialchars($data['namaabsen']); ?></td>
                        <td><?= htmlspecialchars($data['tanggal']); ?></td>
                        <td><?= htmlspecialchars($data['jammasuk']); ?></td>
                        <td><?= htmlspecialchars($data['jamkeluar']); ?></td>

                        <td>
                            <a href="index.php?halaman=editabsen&id=<?= $data['idabsen']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="db/dbabsen.php?hapus=<?= $data['idabsen']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data absen tanggal <?= htmlspecialchars($data['tanggal']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                endwhile;

                // Tampilkan pesan jika data kosong
                if ($no == 1) {
                    echo '<tr><td colspan="7" class="text-center">Data absen masih kosong.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>