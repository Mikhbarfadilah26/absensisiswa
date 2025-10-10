<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database

// Ambil data dari tabel detilkehadiran, diurutkan berdasarkan waktuabsen
$query = mysqli_query($koneksi, "SELECT * FROM detilkehadiran ORDER BY waktuabsen DESC");

// Cek jika ada error pada query
if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Detil Kehadiran (Absensi)</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Detil Kehadiran</th>
                    <th>ID Absen</th>
                    <th>ID Kehadiran</th>
                    <th>Waktu Absen</th>
                    <th>Foto Path</th>
                    <th>Device</th>
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

                        <td><?= htmlspecialchars($data['iddetilkehadiran']); ?></td>

                        <td><?= htmlspecialchars($data['idabsen']); ?></td>

                        <td><?= htmlspecialchars($data['idkehadiran']); ?></td>

                        <td><?= htmlspecialchars($data['waktuabsen']); ?></td>
                        
                        <td><?= htmlspecialchars($data['fotopath']); ?></td>
                        
                        <td><?= htmlspecialchars($data['device']); ?></td>

                        <td>
                            <a href="index.php?halaman=editdetilkehadiran&id=<?= $data['iddetilkehadiran']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_detilkehadiran.php?id=<?= $data['iddetilkehadiran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data absensi ID <?= htmlspecialchars($data['iddetilkehadiran']); ?> pada waktu <?= htmlspecialchars($data['waktuabsen']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                endwhile;

                // Tampilkan pesan jika data kosong
                if ($no == 1) {
                    // Perluas colspan menjadi 8 karena ada 8 kolom
                    echo '<tr><td colspan="8" class="text-center">Data detil kehadiran (absensi) masih kosong.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>