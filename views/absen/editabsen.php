<?php
// views/absen/editabsen.php

// PASTIKAN $koneksi sudah tersedia dari index.php

// 1. Ambil ID dari URL
$idabsen = $_GET['id'] ?? null;

if (!$idabsen) {
    echo "<div class='alert alert-danger'>ID Absen tidak ditemukan!</div>";
    exit;
}

// 2. Ambil Data Absensi Lama berdasarkan idabsen (Menggunakan Prepared Statement)
$query_lama = "SELECT idabsen, namaabsen, tanggal, jammasuk, jamkeluar FROM absen WHERE idabsen = ?";
$stmt_lama = mysqli_prepare($koneksi, $query_lama);
// 'i' menandakan tipe integer untuk $idabsen
mysqli_stmt_bind_param($stmt_lama, "i", $idabsen); 
mysqli_stmt_execute($stmt_lama);
$result_lama = mysqli_stmt_get_result($stmt_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Absen dengan ID " . htmlspecialchars($idabsen) . " tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);
mysqli_stmt_close($stmt_lama);

// Logika POST tidak dilakukan di sini. Logika POST ada di db/dbabsen.php
?>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-header bg-gradient-warning">
            <h3 class="card-title text-white">Edit Data Absensi Siswa (ID: <?= htmlspecialchars($data_lama['idabsen']) ?>)</h3>
        </div>

        <form action="db/dbabsen.php" method="post"> 
        
            <div class="card-body">
                <input type="hidden" name="idabsen" value="<?= htmlspecialchars($data_lama['idabsen']) ?>">
                
                <div class="form-group mb-3">
                    <label for="namaabsen" class="font-weight-bold">Nama Absen / Siswa</label>
                    <input type="text" class="form-control" id="namaabsen" name="namaabsen" 
                           value="<?= htmlspecialchars($data_lama['namaabsen'] ?? '') ?>" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="tanggal" class="font-weight-bold">Tanggal Absensi</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" 
                           value="<?= htmlspecialchars($data_lama['tanggal'] ?? '') ?>" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="jammasuk" class="font-weight-bold">Jam Masuk</label>
                    <input type="time" class="form-control" id="jammasuk" name="jammasuk" 
                           value="<?= htmlspecialchars($data_lama['jammasuk'] ?? '') ?>">
                </div>
                
                <div class="form-group mb-4">
                    <label for="jamkeluar" class="font-weight-bold">Jam Keluar</label>
                    <input type="time" class="form-control" id="jamkeluar" name="jamkeluar" 
                           value="<?= htmlspecialchars($data_lama['jamkeluar'] ?? '') ?>">
                </div>

            </div>
            
            <div class="card-footer text-right">
                <button type="submit" name="edit" class="btn btn-warning"> 
                    <i class="fas fa-edit"></i> Simpan Perubahan
                </button>
                <a href="index.php?halaman=absen" class="btn btn-secondary ml-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

        </form> </div>
</section>