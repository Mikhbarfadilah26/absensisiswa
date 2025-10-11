<?php
// Pastikan koneksi.php sudah di-include di index.php
// $koneksi harus tersedia di sini.

// 1. Ambil ID dari URL
// Pastikan Anda mendapatkan ID dari URL, misalnya: index.php?halaman=editabsen&id=123
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Absensi tidak ditemukan!</div>";
    // Anda bisa mengarahkan kembali ke halaman index absen
    // echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=absen'>";
    exit;
}

$id_absensi = $_GET['id'];

// 2. Ambil data absensi lama dari database
$query_lama = "SELECT * FROM absensi WHERE id_absensi = '$id_absensi'";
$result_lama = mysqli_query($koneksi, $query_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Absensi dengan ID $id_absensi tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);

// Asumsikan data yang disimpan: id_siswa, tanggal, status_kehadiran
$id_siswa_lama = $data_lama['id_siswa'];
$tanggal_lama = $data_lama['tanggal'];
$status_lama = $data_lama['status_kehadiran']; // Contoh: H, I, S, A

// 3. Proses Update Data (Jika form disubmit)
if (isset($_POST['update_absen'])) {
    // Ambil data baru dari form
    $id_siswa_baru = mysqli_real_escape_string($koneksi, $_POST['id_siswa']);
    $tanggal_baru = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $status_baru = mysqli_real_escape_string($koneksi, $_POST['status_kehadiran']);

    // Query Update
    $query_update = "UPDATE absensi SET 
                        id_siswa = '$id_siswa_baru',
                        tanggal = '$tanggal_baru',
                        status_kehadiran = '$status_baru'
                     WHERE id_absensi = '$id_absensi'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<div class='alert alert-success'>Data absensi berhasil diubah!</div>";
        // Refresh data lama agar form menampilkan data yang baru
        $data_lama['id_siswa'] = $id_siswa_baru;
        $data_lama['tanggal'] = $tanggal_baru;
        $data_lama['status_kehadiran'] = $status_baru;
        
        // Arahkan kembali ke halaman index absen setelah 2 detik
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=absen'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah data absensi: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Absensi</h3>
                </div>
                <form action="" method="post">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="id_siswa">Siswa</label>
                            <input type="text" class="form-control" id="id_siswa" name="id_siswa" 
                                value="<?php echo htmlspecialchars($data_lama['id_siswa']); ?>" required>
                            <small class="form-text text-muted">Gunakan ID Siswa. (Harusnya menggunakan dropdown)</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="tanggal">Tanggal Absensi</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" 
                                value="<?php echo htmlspecialchars($data_lama['tanggal']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="status_kehadiran">Status Kehadiran</label>
                            <select class="form-control" id="status_kehadiran" name="status_kehadiran" required>
                                <option value="H" <?php if ($data_lama['status_kehadiran'] == 'H') echo 'selected'; ?>>Hadir (H)</option>
                                <option value="I" <?php if ($data_lama['status_kehadiran'] == 'I') echo 'selected'; ?>>Izin (I)</option>
                                <option value="S" <?php if ($data_lama['status_kehadiran'] == 'S') echo 'selected'; ?>>Sakit (S)</option>
                                <option value="A" <?php if ($data_lama['status_kehadiran'] == 'A') echo 'selected'; ?>>Alpha (A)</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_absen" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="index.php?halaman=absen" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>