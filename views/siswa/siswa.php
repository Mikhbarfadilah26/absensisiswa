<?php
// Ganti query untuk join siswa dengan kelas
// Diasumsikan ada tabel 'kelas' dengan 'idkelas' dan 'namakelas'
$query = mysqli_query($koneksi, "
    SELECT s.idsiswa, s.NIS, s.namasiswa, s.fotosiswa, k.namakelas
    FROM siswa s
    LEFT JOIN kelas k ON s.idkelas = k.idkelas
    ORDER BY s.namasiswa ASC
");
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Siswa</h3>
    </div>

    <div class="card-body">
        <div class="col">
            <a href="index.php?halaman=tambahsiswa" class="btn btn-primary float-right btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Siswa
            </a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['NIS']); ?></td>
                        <td><?= htmlspecialchars($data['namasiswa']); ?></td>
                        <td><?= htmlspecialchars($data['namakelas']); ?></td>
                        <td>
                            <?php if (!empty($data['fotosiswa'])) : ?>
                                <img src="gambar/siswa/<?= htmlspecialchars($data['fotosiswa']); ?>" alt="Foto Siswa" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php else : ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?halaman=editsiswa&id=<?= $data['idsiswa']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_siswa.php?id=<?= $data['idsiswa']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data siswa bernama <?= htmlspecialchars($data['namasiswa']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>