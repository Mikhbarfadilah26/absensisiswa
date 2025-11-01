<?php
// db/dbabsen.php
// Ganti path jika koneksi.php berada di lokasi lain
require_once '../koneksi.php'; 

// =======================================================
// TAMBAH DATA ABSEN (Dipicu oleh Form di tambahabsen.php)
// =======================================================
if (isset($_POST['simpan'])) { 
    $namaabsen  = mysqli_real_escape_string($koneksi, $_POST['namaabsen']);
    $tanggal    = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $idkategori = (int)$_POST['idkategori']; // <-- Variabel idkategori ditangkap

    // Hapus variabel $jammasuk dan $jamkeluar karena nilai idealnya diambil dari KATEGORI.
    // Kita biarkan kolom jammasuk dan jamkeluar di tabel absen bernilai NULL.

    // Perbarui Query INSERT: Tambahkan idkategori dan set jammasuk/jamkeluar ke NULL
    $query = "INSERT INTO absen (namaabsen, tanggal, idkategori, jammasuk, jamkeluar)
              VALUES ('$namaabsen', '$tanggal', '$idkategori', NULL, NULL)";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../index.php?halaman=absen&pesan=berhasil_tambah");
        exit;
    } else {
        echo "Gagal menambah data: " . mysqli_error($koneksi);
    }
}


// =======================================================
// EDIT DATA ABSEN (Dipicu oleh Form di editabsen.php)
// =======================================================
if (isset($_POST['edit'])) { 
    $idabsen = $_POST['idabsen'];
    $namaabsen = mysqli_real_escape_string($koneksi, $_POST['namaabsen']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $idkategori = (int)$_POST['idkategori']; // <-- Variabel idkategori ditangkap saat edit

    // Perbarui Query UPDATE: Tambahkan idkategori dan set jammasuk/jamkeluar ke NULL
    $query = "UPDATE absen 
              SET namaabsen='$namaabsen',
                  tanggal='$tanggal',
                  idkategori='$idkategori',
                  jammasuk=NULL, 
                  jamkeluar=NULL
              WHERE idabsen='$idabsen'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../index.php?halaman=absen&pesan=berhasil_edit");
        exit;
    } else {
        echo "Gagal mengedit data: " . mysqli_error($koneksi);
    }
}

// ... (Kode HAPUS DATA ABSEN tetap sama)
?>