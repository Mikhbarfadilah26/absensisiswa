<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database

// 1. Proses Pengecekan dan Penyimpanan Data (jika formulir disubmit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir dan sanitasi (PENTING untuk keamanan)
    $idsiswa = mysqli_real_escape_string($koneksi, $_POST['idsiswa']);
    $idadmin = mysqli_real_escape_string($koneksi, $_POST['idadmin']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $statuskehadiran = mysqli_real_escape_string($koneksi, $_POST['statuskehadiran']);

    // Query INSERT data
    $insert_query = "INSERT INTO kehadiran (idsiswa, idadmin, tanggal, statuskehadiran) 
                     VALUES ('$idsiswa', '$idadmin', '$tanggal', '$statuskehadiran')";

    if (mysqli_query($koneksi, $insert_query)) {
        // Redirect ke halaman Data Kehadiran setelah sukses
        echo '<script>alert("Data kehadiran berhasil ditambahkan!"); window.location="index.php?halaman=kehadiran";</script>';
    } else {
        // Tampilkan pesan error
        echo '<script>alert("Gagal menambahkan data kehadiran: ' . mysqli_error($koneksi) . '");</script>';
    }
}

// 2. Query untuk mengambil daftar siswa dan admin (untuk dropdown/select)
// Ini adalah praktik terbaik agar idsiswa dan idadmin yang dimasukkan valid
$query_siswa = mysqli_query($koneksi, "SELECT idsiswa, namasiswa FROM siswa ORDER BY namasiswa ASC");
$query_admin = mysqli_query($koneksi, "SELECT idadmin, namaadmin FROM admin ORDER BY namaadmin ASC");

// Cek jika ada error pada query
if (!$query_siswa || !$query_admin) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Formulir Tambah Data Kehadiran</h3>
    </div>
    <form method="POST" action="index.php?halaman=tambahkehadiran">
        <div class="card-body">
            
            <div class="form-group">
                <label for="idsiswa">Siswa</label>
                <select class="form-control" id="idsiswa" name="idsiswa" required>
                    <option value="">-- Pilih Siswa --</option>
                    <?php while ($siswa = mysqli_fetch_assoc($query_siswa)) : ?>
                        <option value="<?= $siswa['idsiswa']; ?>">
                            <?= htmlspecialchars($siswa['idsiswa']) . " - " . htmlspecialchars($siswa['namasiswa']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="idadmin">Admin Pencatat</label>
                <select class="form-control" id="idadmin" name="idadmin" required>
                    <option value="">-- Pilih Admin --</option>
                    <?php while ($admin = mysqli_fetch_assoc($query_admin)) : ?>
                        <option value="<?= $admin['idadmin']; ?>">
                            <?= htmlspecialchars($admin['idadmin']) . " - " . htmlspecialchars($admin['namaadmin']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= date('Y-m-d'); ?>">
            </div>

            <div class="form-group">
                <label for="statuskehadiran">Status Kehadiran</label>
                <select class="form-control" id="statuskehadiran" name="statuskehadiran" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Alfa">Alfa</option>
                </select>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Kehadiran
            </button>
            <a href="index.php?halaman=kehadiran" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Batal
            </a>
        </div>
    </form>
</div>