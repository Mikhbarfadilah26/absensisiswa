<?php
include "../koneksi.php";
session_start();

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

/* ==========================================
    TAMBAH KATEGORI
========================================== */
if ($proses == 'tambah') {
    $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);
    $namakategori = mysqli_real_escape_string($koneksi, $_POST['namakategori']);

    // Cek apakah ID kategori sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE idkategori='$idkategori'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('ID Kategori sudah ada, silakan gunakan ID lain!');
                window.location='../index.php?halaman=tambahkategori';
              </script>";
        exit;
    }

    // Simpan ke database
    $sql = "INSERT INTO kategori (idkategori, namakategori) VALUES ('$idkategori', '$namakategori')";
    mysqli_query($koneksi, $sql);

    header("Location: ../index.php?halaman=kategori");
    exit;
}

/* ==========================================
    EDIT KATEGORI
========================================== */
if ($proses == 'edit') {
    $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);
    $namakategori = mysqli_real_escape_string($koneksi, $_POST['namakategori']);

    $sql = "UPDATE kategori SET namakategori='$namakategori' WHERE idkategori='$idkategori'";
    mysqli_query($koneksi, $sql);

    header("Location: ../index.php?halaman=kategori");
    exit;
}

/* ==========================================
    HAPUS KATEGORI
========================================== */
if ($proses == 'hapus') {
    $idkategori = mysqli_real_escape_string($koneksi, $_GET['idkategori']);

    mysqli_query($koneksi, "DELETE FROM kategori WHERE idkategori='$idkategori'");
    header("Location: ../index.php?halaman=kategori");
    exit;
}
?>
