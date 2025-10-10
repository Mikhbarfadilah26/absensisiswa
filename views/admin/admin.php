<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database
// Ambil data dari tabel admin (disesuaikan)
$query = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY namaadmin ASC");

// Cek jika ada error pada query
if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Admin</h3>
    </div>

    <div class="card-body">
        <div class="col">
            <a href="index.php?halaman=tambahadmin" class="btn btn-primary float-right btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Admin
            </a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Admin</th>
                    <th>Nama Admin</th>
                    <th>Username</th> 
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

                        <td><?= htmlspecialchars($data['idadmin']); ?></td>
                        <td><?= htmlspecialchars($data['namaadmin']); ?></td>
                        <td><?= htmlspecialchars($data['username']); ?></td> <td>
                            <a href="index.php?halaman=editadmin&id=<?= $data['idadmin']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_admin.php?id=<?= $data['idadmin']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data admin <?= htmlspecialchars($data['namaadmin']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                endwhile;

                // Tampilkan pesan jika data kosong
                if ($no == 1) {
                    echo '<tr><td colspan="5" class="text-center">Data admin masih kosong.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>