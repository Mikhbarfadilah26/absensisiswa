<?php
// File ini hanya menampilkan formulir.
// Pastikan file 'koneksi.php' sudah di-include di index.php
?>

<div class="container-fluid">
    <div class="row justify-content-center"> <!-- Tambahkan justify-content-center untuk memastikan centering -->
        <!-- Ubah col-md-8 menjadi col-md-12 untuk lebar penuh pada container, atau col-lg-10 agar tetap ada sedikit margin -->
        <div class="col-md-12 col-lg-10"> 
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Data Admin</h3>
                </div>
                <!-- /.card-header -->
                
                <!-- Form dimulai -->
                <!-- Action diarahkan ke proses_tambah_admin.php (Pastikan Anda sudah membuatnya) -->
                <form action="proses_tambah_admin.php" method="POST">
                    <div class="card-body">

                        <!-- Input Nama Admin -->
                        <div class="form-group">
                            <label for="namaadmin">Nama Admin</label>
                            <input type="text" class="form-control" id="namaadmin" name="namaadmin" required placeholder="Masukkan Nama Lengkap Admin">
                        </div>
                        
                        <!-- Input Username -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan Username (Contoh: admin_baru)">
                        </div>

                        <!-- Input Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan Data Admin</button>
                        <!-- Tombol kembali ke halaman Data Admin -->
                        <a href="index.php?halaman=admin" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
