<?php
// Pastikan $koneksi sudah tersedia dari index.php

// 1. Ambil ID Kehadiran (Sesi Absensi) dari URL
// Link ke halaman ini seharusnya menyertakan ID, contoh: index.php?halaman=editkehadiran&id=42
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Sesi Kehadiran tidak ditemukan!</div>";
    // Redirect ke halaman index kehadiran
    // echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kehadiran'>";
    exit;
}

$id_kehadiran = $_GET['id'];

// 2. Ambil data Sesi Kehadiran lama dan daftar kelas yang tersedia
$query_lama = "SELECT * FROM kehadiran WHERE id_kehadiran = '$id_kehadiran'";
$result_lama = mysqli_query($koneksi, $query_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Sesi Kehadiran dengan ID $id_kehadiran tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);

// Ambil daftar kelas untuk dropdown
$query_kelas = "SELECT id_kelas, nama_kelas FROM kelas ORDER BY nama_kelas ASC";
$result_kelas = mysqli_query($koneksi, $query_kelas);


// 3. Proses Update Data (Jika form disubmit)
if (isset($_POST['update_kehadiran'])) {
    // Ambil data baru dari form
    $tanggal_baru = mysqli_real_escape_string($koneksi, $_POST['tanggal_kehadiran']);
    $id_kelas_baru = mysqli_real_escape_string($koneksi, $_POST['id_kelas']);

    // Query Update
    $query_update = "UPDATE kehadiran SET 
                        tanggal_kehadiran = '$tanggal_baru',
                        id_kelas = '$id_kelas_baru'
                     WHERE id_kehadiran = '$id_kehadiran'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<div class='alert alert-success'>Sesi kehadiran berhasil diubah!</div>";
        
        // Refresh data lama agar form menampilkan data yang baru
        $data_lama['tanggal_kehadiran'] = $tanggal_baru;
        $data_lama['id_kelas'] = $id_kelas_baru;

        // Arahkan kembali ke halaman index kehadiran setelah 2 detik
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kehadiran'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah sesi kehadiran: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Sesi Kehadiran</h3>
                </div>
                <form action="" method="post">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="tanggal_kehadiran">Tanggal Kehadiran</label>
                            <input type="date" class="form-control" id="tanggal_kehadiran" name="tanggal_kehadiran" 
                                value="<?php echo htmlspecialchars($data_lama['tanggal_kehadiran']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php 
                                // Loop untuk menampilkan semua kelas yang tersedia
                                while ($kelas = mysqli_fetch_assoc($result_kelas)) {
                                    $selected = ($data_lama['id_kelas'] == $kelas['id_kelas']) ? 'selected' : '';
                                    echo "<option value='". $kelas['id_kelas'] ."' $selected>". htmlspecialchars($kelas['nama_kelas']) ."</option>";
                                }
                                // Karena kita sudah menggunakan $result_kelas, kita perlu mengulang query lagi jika ingin menggunakannya di tempat lain
                                // atau menggunakan mysqli_data_seek($result_kelas, 0); jika diperlukan.
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_kehadiran" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="index.php?halaman=kehadiran" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>