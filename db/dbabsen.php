<?php
// Ganti path jika koneksi.php berada di lokasi lain
require_once '../koneksi.php'; 

// =======================================================
// TAMBAH DATA ABSEN (Dipicu oleh Form di tambahabsen.php)
// =======================================================
if (isset($_POST['simpan'])) { // Menggunakan 'simpan' dari form tambahabsen.php
    $namaabsen = mysqli_real_escape_string($koneksi, $_POST['namaabsen']);
    $tanggal   = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jammasuk  = mysqli_real_escape_string($koneksi, $_POST['jammasuk']);
    $jamkeluar = mysqli_real_escape_string($koneksi, $_POST['jamkeluar']);

    $query = "INSERT INTO absen (namaabsen, tanggal, jammasuk, jamkeluar)
              VALUES ('$namaabsen', '$tanggal', '$jammasuk', '$jamkeluar')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // PENTING: Arahkan kembali ke tampilan absen
        header("Location: ../index.php?halaman=absen&pesan=berhasil_tambah");
        exit;
    } else {
        // Anda bisa menggunakan SESSION untuk menampilkan error
        echo "Gagal menambah data: " . mysqli_error($koneksi);
    }
}


// =======================================================
// EDIT DATA ABSEN (Dipicu oleh Form di editabsen.php)
// =======================================================
// Perhatikan: Menggunakan $_POST['edit'] sebagai trigger, sesuaikan dengan tombol di form edit
if (isset($_POST['edit'])) { 
    $idabsen = $_POST['idabsen'];
    $namaabsen = mysqli_real_escape_string($koneksi, $_POST['namaabsen']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jammasuk = mysqli_real_escape_string($koneksi, $_POST['jammasuk']);
    $jamkeluar = mysqli_real_escape_string($koneksi, $_POST['jamkeluar']);

    $query = "UPDATE absen 
              SET namaabsen='$namaabsen',
                  tanggal='$tanggal',
                  jammasuk='$jammasuk',
                  jamkeluar='$jamkeluar'
              WHERE idabsen='$idabsen'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // PENTING: Arahkan kembali ke tampilan absen
        header("Location: ../index.php?halaman=absen&pesan=berhasil_edit");
        exit;
    } else {
        echo "Gagal mengedit data: " . mysqli_error($koneksi);
    }
}

// =======================================================
// HAPUS DATA ABSEN (Dipicu oleh link di absen.php)
// =======================================================
// Perhatikan: Menggunakan $_GET['hapus'] sebagai trigger, sesuai dengan link yang diperbaiki di Solusi A
if (isset($_GET['hapus'])) { 
    $idabsen = $_GET['hapus'];
    $query = "DELETE FROM absen WHERE idabsen='$idabsen'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // PENTING: Arahkan kembali ke tampilan absen
        header("Location: ../index.php?halaman=absen&pesan=berhasil_hapus");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
}
?>


