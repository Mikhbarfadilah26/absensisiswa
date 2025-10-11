<?php
// Pastikan file koneksi sudah di-include (sesuaikan path jika berbeda)
include 'koneksi.php'; 

// Selalu mulai session jika Anda ingin menggunakan session untuk pesan notifikasi
session_start();

// 1. Cek apakah form sudah disubmit dengan tombol 'simpan'
if (isset($_POST['simpan'])) {
    
    // Ambil data dari formulir
    $nama_admin = $_POST['namaadmin'];
    $username = $_POST['username'];
    $password_plain = $_POST['password']; // Password dari input user

    // =======================================================
    // 2. ENKRIPSI PASSWORD DENGAN password_hash()
    // Ini adalah langkah krusial untuk keamanan
    // =======================================================
    $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);
    
    // 3. TULIS PERINTAH SQL INSERT
    // Pastikan nama kolom (e.g., nama_admin, username, password_hash) 
    // sesuai dengan tabel database Anda.
    $query = "INSERT INTO admin (nama_admin, username, password) 
              VALUES ('$nama_admin', '$username', '$password_hashed')";
    
    // 4. Eksekusi Query
    if (mysqli_query($koneksi, $query)) {
        
        // Simpan berhasil
        // Anda bisa menggunakan session untuk menampilkan pesan sukses di halaman admin
        $_SESSION['pesan'] = "Data admin $nama_admin berhasil ditambahkan!";
        $_SESSION['tipe_pesan'] = "success"; 
        
        // Arahkan kembali ke halaman index admin
        header('location: index.php?halaman=admin');
        exit;
        
    } else {
        
        // Simpan gagal
        $_SESSION['pesan'] = "Gagal menambahkan data admin! Error: " . mysqli_error($koneksi);
        $_SESSION['tipe_pesan'] = "danger"; 
        
        // Arahkan kembali ke formulir tambah admin
        header('location: index.php?halaman=tambahadmin');
        exit;
    }
    
    // Tutup koneksi (opsional, tergantung style coding Anda)
    mysqli_close($koneksi);
    
} else {
    // Jika diakses tanpa submit form, arahkan ke halaman admin
    header('location: index.php?halaman=admin');
    exit;
}
?>