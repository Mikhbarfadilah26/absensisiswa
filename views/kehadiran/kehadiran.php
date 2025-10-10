<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database

// Ambil data dari tabel kehadiran, diurutkan berdasarkan tanggal
$query = mysqli_query($koneksi, "SELECT * FROM kehadiran ORDER BY tanggal DESC");

// Cek jika ada error pada query
if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kehadiran</h3>
    </div>

    <div class="card-body">
        <div class="col">
            <a href="index.php?halaman=tambahkehadiran" class="btn btn-primary float-right btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Kehadiran
            </a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Kehadiran</th>
                    <th>ID Siswa</th>
                    <th>ID Admin</th>
                    <th>Tanggal</th>
                    <th>Status Kehadiran</th>
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

                        <td><?= htmlspecialchars($data['idkehadiran']); ?></td>

                        <td><?= htmlspecialchars($data['idsiswa']); ?></td>

                        <td><?= htmlspecialchars($data['idadmin']); ?></td>

                        <td><?= htmlspecialchars($data['tanggal']); ?></td>

                        <td><?= htmlspecialchars($data['statuskehadiran']); ?></td>

                        <td>
                            <a href="index.php?halaman=editkehadiran&id=<?= $data['idkehadiran']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_kehadiran.php?id=<?= $data['idkehadiran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data kehadiran siswa ID <?= htmlspecialchars($data['idsiswa']); ?> pada tanggal <?= htmlspecialchars($data['tanggal']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                endwhile;

                // Tampilkan pesan jika data kosong
                if ($no == 1) {
                    echo '<tr><td colspan="7" class="text-center">Data kehadiran masih kosong.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>