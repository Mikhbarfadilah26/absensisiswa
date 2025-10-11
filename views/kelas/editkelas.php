<?php
// Pastikan $koneksi sudah tersedia dari index.php

// 1. Ambil ID Kelas dari URL
// Link ke halaman ini seharusnya menyertakan ID, contoh: index.php?halaman=editkelas&id=1
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Kelas tidak ditemukan!</div>";
    // Redirect ke halaman index kelas jika ID tidak ada
    // echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kelas'>";
    exit;
}

$id_kelas = $_GET['id'];

// 2. Ambil data Kelas lama dari database
$query_lama = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
$result_lama = mysqli_query($koneksi, $query_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Kelas dengan ID $id_kelas tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);
$nama_lama = $data_lama['nama_kelas'];

// 3. Proses Update Data (Jika form disubmit)
if (isset($_POST['update_kelas'])) {
    // Ambil data baru dari form
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama_kelas']);

    // Cek apakah nama baru kosong
    if (empty($nama_baru)) {
        echo "<div class='alert alert-warning'>Nama kelas tidak boleh kosong!</div>";
    } else {
        // Query Update
        $query_update = "UPDATE kelas SET 
                            nama_kelas = '$nama_baru'
                         WHERE id_kelas = '$id_kelas'";

        if (mysqli_query($koneksi, $query_update)) {
            echo "<div class='alert alert-success'>Kelas berhasil diubah menjadi: **$nama_baru**!</div>";
            
            // Refresh data lama agar form menampilkan data yang baru
            $data_lama['nama_kelas'] = $nama_baru;
            
            // Arahkan kembali ke halaman index kelas setelah 2 detik
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kelas'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal mengubah kelas: " . mysqli_error($koneksi) . "</div>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kelas</h3>
                </div>
                
                <form action="" method="post">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" 
                                value="<?php echo htmlspecialchars($data_lama['nama_kelas']); ?>" required>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_kelas" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="index.php?halaman=kelas" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>