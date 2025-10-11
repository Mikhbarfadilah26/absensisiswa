<?php
// Pastikan $koneksi sudah tersedia dari index.php

// 1. Ambil ID Detil Kehadiran dari URL
// Link ke halaman ini seharusnya menyertakan ID, contoh: index.php?halaman=editdetil&id=501
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Detil Kehadiran tidak ditemukan!</div>";
    // Redirect ke halaman index detil kehadiran
    // echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=detilkehadiran'>";
    exit;
}

$id_detil = $_GET['id'];

// 2. Ambil data lama dari database
// Gabungkan (JOIN) dengan tabel siswa dan kehadiran (jika ada) untuk menampilkan informasi yang lengkap.
$query_lama = "SELECT dk.*, s.nama_siswa 
               FROM detil_kehadiran dk
               JOIN siswa s ON dk.id_siswa = s.id_siswa
               WHERE dk.id_detil_kehadiran = '$id_detil'";
               
$result_lama = mysqli_query($koneksi, $query_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Detil Kehadiran dengan ID $id_detil tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);
$nama_siswa_lama = $data_lama['nama_siswa'];


// 3. Proses Update Data (Jika form disubmit)
if (isset($_POST['update_detil'])) {
    // Ambil data baru dari form
    // id_siswa dan id_kehadiran biasanya tidak diubah di halaman edit detil,
    // jadi kita fokus pada status dan keterangan.
    $status_baru = mysqli_real_escape_string($koneksi, $_POST['status_kehadiran']);
    $keterangan_baru = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    // Query Update
    $query_update = "UPDATE detil_kehadiran SET 
                        status_kehadiran = '$status_baru',
                        keterangan = '$keterangan_baru'
                     WHERE id_detil_kehadiran = '$id_detil'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<div class='alert alert-success'>Detil kehadiran **$nama_siswa_lama** berhasil diubah!</div>";
        
        // Refresh data lama agar form menampilkan data yang baru
        $data_lama['status_kehadiran'] = $status_baru;
        $data_lama['keterangan'] = $keterangan_baru;

        // Arahkan kembali ke halaman index detil kehadiran setelah 2 detik
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=detilkehadiran'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah detil kehadiran: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Detil Kehadiran untuk Siswa: <?php echo htmlspecialchars($nama_siswa_lama); ?></h3>
                </div>
                <form action="" method="post">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Siswa yang Diedit</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($nama_siswa_lama); ?>" readonly>
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

                        <div class="form-group">
                            <label for="keterangan">Keterangan (Opsional)</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?php echo htmlspecialchars($data_lama['keterangan']); ?></textarea>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_detil" class="btn btn-primary">Simpan Detil Perubahan</button>
                        <a href="index.php?halaman=detilkehadiran" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>