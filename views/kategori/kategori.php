<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database
// Ambil data dari tabel kategori
$query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY namakategori ASC");

// Cek jika ada error pada query
if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kategori</h3>
    </div>

    <div class="card-body">
        <div class="col">
            <a href="index.php?halaman=tambahkategori" class="btn btn-primary float-right btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
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

                        <td><?= htmlspecialchars($data['idkategori']); ?></td>

                        <td><?= htmlspecialchars($data['namakategori']); ?></td>

                        <td>
                            <a href="index.php?halaman=editkategori&id=<?= $data['idkategori']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_kategori.php?id=<?= $data['idkategori']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data kategori <?= htmlspecialchars($data['namakategori']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                endwhile;

                // Tampilkan pesan jika data kosong
                if ($no == 1) {
                    echo '<tr><td colspan="4" class="text-center">Data kategori masih kosong.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>