<?php
// File: views/siswa/editsiswa.php
// ... (Bagian atas PHP untuk mengambil data siswa dan kelas, tetap sama) ...
// Asumsi $koneksi dan data sudah diambil

$idsiswa = (int)$_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE idsiswa='$idsiswa'");
$data = mysqli_fetch_assoc($query);
// ...

$qk = mysqli_query($koneksi, "SELECT idkelas, namakelas FROM kelas ORDER BY namakelas ASC");
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Siswa</h3>
    </div>

    <form action="db/dbsiswa.php?proses=editsiswa" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" name="idsiswa" value="<?= $data['idsiswa']; ?>">

            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="namasiswa" class="form-control" 
                        value="<?= htmlspecialchars($data['namasiswa']); ?>" required>
            </div>

            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="NIS" class="form-control" 
                        value="<?= htmlspecialchars($data['NIS']); ?>" required>
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <select name="idkelas" class="form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                    <?php while ($k = mysqli_fetch_assoc($qk)): ?>
                        <option value="<?= $k['idkelas']; ?>" 
                            <?= ($data['idkelas'] == $k['idkelas']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($k['namakelas']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>


            <div class="form-group">
                <label>Ganti Foto (kosongkan jika tidak diubah)</label>
                <input type="file" name="fotosiswa" accept="image/*" class="form-control">
                <?php if (!empty($data['fotosiswa'])) : ?>
                    <p class="mt-2">Foto saat ini:
                        <img src="foto/siswa/<?= htmlspecialchars($data['fotosiswa']); ?>" 
                             width="60" height="60" style="object-fit:cover;">
                    </p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Password Baru (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>