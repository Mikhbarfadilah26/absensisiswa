<?php
// views/absen/tambahabsen.php

// Pastikan koneksi ($koneksi) sudah terdefinisi
if (!isset($koneksi)) {
    // Sesuaikan path ke koneksi.php jika perlu
    include 'koneksi.php'; 
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Data Absen</h3>
                </div>
                <form action="db/dbabsen.php" method="POST"> 
                    <div class="card-body">

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= date('Y-m-d'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="idkategori">Pola Absensi Harian</label>
                            <select class="form-control" id="idkategori" name="idkategori" required>
                                <option value="">-- Pilih Pola Absensi --</option>
                                <?php
                                // Query untuk mengambil data kategori (idkategori dan namakategori)
                                $sql_kategori = mysqli_query($koneksi, "SELECT idkategori, namakategori FROM kategori ORDER BY idkategori ASC");
                                
                                while ($data_kat = mysqli_fetch_array($sql_kategori)) {
                                    // Nilai (value) yang dikirim adalah idkategori
                                    echo '<option value="' . $data_kat['idkategori'] . '">' . htmlspecialchars($data_kat['namakategori']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaabsen">Nama Absen</label>
                            <input type="text" class="form-control" id="namaabsen" name="namaabsen" required placeholder="Contoh: Absen Semester Ganjil">
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