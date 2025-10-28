<?php

// Tambahkan Pengecekan Koneksi ($koneksi) jika belum di-include di index.php
if (!isset($koneksi)) {
    // Pastikan path ke koneksi.php benar, relatif terhadap index.php
    include 'koneksi.php'; 
}


if (isset($_POST['simpan'])) {
    // 1. Ambil data dari form dan lakukan sanitasi
    $namaabsen = mysqli_real_escape_string($koneksi, $_POST['namaabsen']);
    $tanggal   = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jammasuk  = mysqli_real_escape_string($koneksi, $_POST['jammasuk']);
    $jamkeluar = mysqli_real_escape_string($koneksi, $_POST['jamkeluar']); // Bisa kosong/null

    // 2. Query untuk menyimpan data
    $query_simpan = "INSERT INTO absen (namaabsen, tanggal, jammasuk, jamkeluar) 
                     VALUES ('$namaabsen', '$tanggal', '$jammasuk', '$jamkeluar')";

    $result = mysqli_query($koneksi, $query_simpan);

    if ($result) {
        // Redirect menggunakan PHP header() (Jika ob_start() sudah diaktifkan di index.php)
        // Atau menggunakan echo script jika Anda mengandalkan JS
        echo "<script>alert('Data Absen berhasil ditambahkan.');window.location='index.php?halaman=absen';</script>";
        exit(); // PENTING: Hentikan eksekusi kode setelah redirect

    } else {
        // Tampilkan pesan error jika gagal
        echo "<script>alert('Gagal menambahkan data Absen. Error: " . mysqli_error($koneksi) . "');window.location='index.php?halaman=tambahabsen';</script>";
        exit(); // PENTING
    }
}
// Tidak perlu 'else { header('Location: ...'); }' karena fungsi itu akan berjalan jika tidak ada POST,
// yang mana berarti Anda mencoba mengakses halaman tanpa submit, dan ini baik-baik saja karena 
// kita akan menampilkan formulir di bawah.
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Data Absen</h3>
                </div>
                <form action="" method="POST"> 
                    <div class="card-body">

                        <div class="form-group">
                            <label for="namaabsen">Nama Absen / Siswa</label>
                            <input type="text" class="form-control" id="namaabsen" name="namaabsen" required placeholder="Masukkan Nama Absen/Siswa">
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= date('Y-m-d'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="jammasuk">Jam Masuk</label>
                            <input type="time" class="form-control" id="jammasuk" name="jammasuk" required placeholder="Contoh: 08:00:00">
                        </div>

                        <div class="form-group">
                            <label for="jamkeluar">Jam Keluar</label>
                            <input type="time" class="form-control" id="jamkeluar" name="jamkeluar" placeholder="Contoh: 16:00:00 (Opsional saat pengisian)">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="index.php?halaman=absen" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

