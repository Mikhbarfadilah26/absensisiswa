<?php
// Pastikan $koneksi sudah tersedia dari index.php

// 1. Ambil ID Kategori dari URL
// Link ke halaman ini seharusnya menyertakan ID, contoh: index.php?halaman=editkategori&id=1
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID Kategori tidak ditemukan!</div>";
    // Redirect ke halaman index kategori jika ID tidak ada
    // echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kategori'>";
    exit;
}

$id_kategori = $_GET['id'];

// 2. Ambil data Kategori lama dari database
$query_lama = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
$result_lama = mysqli_query($koneksi, $query_lama);

if (mysqli_num_rows($result_lama) == 0) {
    echo "<div class='alert alert-danger'>Data Kategori dengan ID $id_kategori tidak ditemukan!</div>";
    exit;
}

$data_lama = mysqli_fetch_assoc($result_lama);
$nama_lama = $data_lama['nama_kategori'];

// 3. Proses Update Data (Jika form disubmit)
if (isset($_POST['update_kategori'])) {
    // Ambil data baru dari form
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);

    // Cek apakah nama baru kosong
    if (empty($nama_baru)) {
        echo "<div class='alert alert-warning'>Nama kategori tidak boleh kosong!</div>";
    } else {
        // Query Update
        $query_update = "UPDATE kategori SET 
                            nama_kategori = '$nama_baru'
                         WHERE id_kategori = '$id_kategori'";

        if (mysqli_query($koneksi, $query_update)) {
            echo "<div class='alert alert-success'>Kategori berhasil diubah menjadi: **$nama_baru**!</div>";
            
            // Refresh data lama agar form menampilkan data yang baru
            $data_lama['nama_kategori'] = $nama_baru;
            
            // Arahkan kembali ke halaman index kategori setelah 2 detik
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=kategori'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal mengubah kategori: " . mysqli_error($koneksi) . "</div>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Kategori</h3>
                </div>
                
                <form action="" method="post">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" 
                                value="<?php echo htmlspecialchars($data_lama['nama_kategori']); ?>" required>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_kategori" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="index.php?halaman=kategori" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>