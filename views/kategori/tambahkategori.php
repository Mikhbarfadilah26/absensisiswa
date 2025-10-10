<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Kategori</h3>
    </div>
    <form method="POST" action="proses_tambahkategori.php">
        <div class="card-body">
            
            <div class="form-group">
                <label for="namakategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namakategori" name="namakategori" placeholder="Masukkan Nama Kategori" required>
            </div>
            
            </div>
        <div class="card-footer">
            <button type="submit" name="submit_kategori" class="btn btn-primary">Simpan Kategori</button>
            <a href="index.php?halaman=kategori" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>