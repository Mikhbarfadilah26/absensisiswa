<?php
// Pastikan koneksi ($koneksi) sudah terdefinisi dan terhubung ke database

// 1. Proses Pengecekan dan Penyimpanan Data (jika formulir disubmit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir dan sanitasi
    $idabsen = mysqli_real_escape_string($koneksi, $_POST['idabsen']);
    $idkehadiran = mysqli_real_escape_string($koneksi, $_POST['idkehadiran']);
    $waktuabsen = mysqli_real_escape_string($koneksi, $_POST['waktuabsen']);
    $fotopath = mysqli_real_escape_string($koneksi, $_POST['fotopath']);
    $device = mysqli_real_escape_string($koneksi, $_POST['device']);

    // Gabungkan Tanggal dan Waktu jika perlu, atau gunakan input datetime-local
    // Di sini kita asumsikan input 'waktuabsen' sudah berupa format DATETIME

    // Query INSERT data ke tabel detilkehadiran
    $insert_query = "INSERT INTO detilkehadiran (idabsen, idkehadiran, waktuabsen, fotopath, device) 
                     VALUES ('$idabsen', '$idkehadiran', '$waktuabsen', '$fotopath', '$device')";

    if (mysqli_query($koneksi, $insert_query)) {
        // Redirect ke halaman Data Detil Kehadiran setelah sukses
        echo '<script>alert("Data detil kehadiran berhasil ditambahkan!"); window.location="index.php?halaman=detilkehadiran";</script>';
    } else {
        // Tampilkan pesan error
        echo '<script>alert("Gagal menambahkan data detil kehadiran: ' . mysqli_error($koneksi) . '");</script>';
    }
}

// 2. Query untuk mengambil ID yang diperlukan (Contoh: ID Kehadiran dan ID Absen yang sudah ada)
// Asumsi: Anda memiliki tabel 'absen' dan 'kehadiran'
$query_kehadiran = mysqli_query($koneksi, "SELECT idkehadiran, idsiswa, tanggal FROM kehadiran ORDER BY tanggal DESC LIMIT 50");
$query_absen = mysqli_query($koneksi, "SELECT idabsen, namasiswa FROM absen JOIN siswa ON absen.idsiswa = siswa.idsiswa ORDER BY idabsen DESC"); // Contoh join ke siswa

// Cek jika ada error pada query
if (!$query_kehadiran || !$query_absen) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>
