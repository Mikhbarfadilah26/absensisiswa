 <div class="card-header">
        <h3 class="card-title">Form Tambah Siswa</h3>
    </div>
    <form action="db/dbsiswa.php?proses=tambahsiswa" method="POST" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group">
                <label for="idkelas">Kelas</label>
                <select class="form-control" id="idkelas" name="idkelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <?php
                    // Ambil data kelas dari database menggunakan koneksi $koneksi yang sudah tersedia
                    $qk = mysqli_query($koneksi, "SELECT idkelas, namakelas FROM kelas ORDER BY namakelas ASC");
                    while ($k = mysqli_fetch_assoc($qk)):
                    ?>
                        <option value="<?= $k['idkelas']; ?>"><?= htmlspecialchars($k['namakelas']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="NIS">NIS (Nomor Induk Siswa)</label>
                <input type="text" class="form-control" id="NIS" name="NIS" placeholder="Masukkan NIS" required>
            </div>

            <div class="form-group">
                <label for="namasiswa">Nama Siswa</label>
                <input type="text" class="form-control" id="namasiswa" name="namasiswa" placeholder="Masukkan Nama Lengkap Siswa" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Awal" required>
            </div>

            <div class="form-group">
                <label for="fotosiswa">Foto Siswa</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fotosiswa" name="fotosiswa" accept="image/*">
                        <label class="custom-file-label" for="fotosiswa">Pilih file foto...</label>
                    </div>
                </div>
                <small class="form-text text-muted">Maksimal ukuran file: 2MB. Format: JPG/PNG.</small>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Data Siswa</button>
            <button type="reset" class="btn btn-secondary">Reset Form</button>
        </div>
    </form>
</div>
