<?php

// Ambil data dari tabel kelas
$query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY namakelas ASC");
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kelas</h3>
    </div>

    <div class="card-body">
        <div class="col">
            <a href="index.php?halaman=tambahkelas" class="btn btn-primary float-right btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Kelas
            </a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
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
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['namakelas']); ?></td>
                        <td>
                            <?php if (!empty($data['fotokelas'])) : ?>
                                <img src="../../foto/kelas/<?= htmlspecialchars($data['fotokelas']); ?>" width="60" height="60" class="rounded" alt="Foto Kelas">
                            <?php else : ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?halaman=editkelas&id=<?= $data['idkelas']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_kelas.php?id=<?= $data['idkelas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data kelas <?= htmlspecialchars($data['namakelas']); ?>?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>