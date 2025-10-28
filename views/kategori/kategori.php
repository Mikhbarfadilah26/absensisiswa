<?php
include __DIR__ . '/../../koneksi.php';

// ======== HAPUS DATA ========
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $idkategori = mysqli_real_escape_string($koneksi, $_GET['idkategori']);
    $hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE idkategori='$idkategori'");
    if ($hapus) {
        echo "<div class='alert alert-success'>Kategori berhasil dihapus!</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kategori'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus kategori: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kategori</h3>
        <a href="index.php?halaman=tambahkategori" class="btn btn-primary btn-sm float-right">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY idkategori ASC");
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['idkategori']; ?></td>
                        <td><?= htmlspecialchars($data['namakategori']); ?></td>
                        <td>
                            <a href="index.php?halaman=editkategori&idkategori=<?= $data['idkategori']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="index.php?halaman=kategori&aksi=hapus&idkategori=<?= $data['idkategori']; ?>"
                               onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                               class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
