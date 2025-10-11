<?php
// Pastikan $koneksi sudah tersedia dari index.php

// 1. Ambil ID Siswa dari URL
// Link ke halaman ini seharusnya menyertakan ID, contoh: index.php?halaman=editsiswa&id=10
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Siswa tidak ditemukan!</div>";
    // Redirect ke halaman index siswa jika ID tidak ada
    // echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=siswa'>";
    exit;
}

$id_siswa = $_GET['id'];

// 2. Ambil data Siswa lama dari database
$query_lama = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'";
$result_lama = mysqli_query($koneksi, $query_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Siswa dengan ID $id_siswa tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);

// 3. Ambil daftar kelas untuk dropdown
$query_kelas = "SELECT id_kelas, nama_kelas FROM kelas ORDER BY nama_kelas ASC";
$result_kelas = mysqli_query($koneksi, $query_kelas);


// 4. Proses Update Data (Jika form disubmit)
if (isset($_POST['update_siswa'])) {
    // Ambil data baru dari form
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $nis_baru = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $id_kelas_baru = mysqli_real_escape_string($koneksi, $_POST['id_kelas']);
    $alamat_baru = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    // Query Update
    $query_update = "UPDATE siswa SET 
                        nama_siswa = '$nama_baru',
                        nis = '$nis_baru',
                        id_kelas = '$id_kelas_baru',
                        alamat = '$alamat_baru'
                     WHERE id_siswa = '$id_siswa'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<div class='alert alert-success'>Data siswa **$nama_baru** berhasil diubah!</div>";
        
        // Refresh data lama agar form menampilkan data yang baru
        $data_lama['nama_siswa'] = $nama_baru;
        $data_lama['nis'] = $nis_baru;
        $data_lama['id_kelas'] = $id_kelas_baru;
        $data_lama['alamat'] = $alamat_baru;
        
        // Arahkan kembali ke halaman index siswa setelah 2 detik
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=siswa'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah data siswa: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Siswa: <?php echo htmlspecialchars($data_lama['nama_siswa']); ?></h3>
                </div>
                
                <form action="" method="post">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" 
                                value="<?php echo htmlspecialchars($data_lama['nama_siswa']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nis">NIS (Nomor Induk Siswa)</label>
                            <input type="text" class="form-control" id="nis" name="nis" 
                                value="<?php echo htmlspecialchars($data_lama['nis']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php 
                                // Loop untuk menampilkan semua kelas yang tersedia
                                while ($kelas = mysqli_fetch_assoc($result_kelas)) {
                                    // Logika untuk membuat kelas yang lama terpilih secara default
                                    $selected = ($data_lama['id_kelas'] == $kelas['id_kelas']) ? 'selected' : '';
                                    echo "<option value='". $kelas['id_kelas'] ."' $selected>". htmlspecialchars($kelas['nama_kelas']) ."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($data_lama['alamat']); ?></textarea>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_siswa" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="index.php?halaman=siswa" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>