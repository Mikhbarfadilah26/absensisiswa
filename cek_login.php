<?php
// auth_process.php

session_start();
include 'koneksi.php'; 

// 1. Ambil input dari form
$role = $_POST['role'];
$password = $_POST['password'];

// 2. Tentukan variabel berdasarkan role
if ($role == 'admin') {
    $table = 'admin';
    $username_field = 'username';
    $input_value = $_POST['username']; // Ambil dari input name="username"
    $id_field = 'idadmin';
    $redirect_success = 'views/dashboard.php'; // Ganti dengan path dashboard Admin yang benar
} elseif ($role == 'siswa') {
    $table = 'siswa';
    $username_field = 'NIS'; // Berdasarkan struktur tabel Anda
    $input_value = $_POST['nis']; // Ambil dari input name="nis"
    $id_field = 'idsiswa';
    $redirect_success = 'siswa/index.php'; // Ganti dengan path dashboard Siswa yang benar
} else {
    // Role tidak valid, kembalikan ke login
    header("location:login.php?pesan=gagal");
    exit;
}

// 3. Query Database
// HATI-HATI: Jika password di database Anda di-hash (misalnya MD5), Anda harus hash input $password:
// $hashed_password = md5($password);
// $query = "SELECT * FROM $table WHERE $username_field='$input_value' AND password='$hashed_password'";
//
// Karena Anda masih menggunakan query sederhana di kode debugging, saya akan mengikutinya (TAPI SANGAT DISARANKAN PAKAI HASH!)
$query = "SELECT * FROM $table WHERE $username_field='$input_value' AND password='$password'";
$login = mysqli_query($koneksi, $query);
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    // LOGIN BERHASIL
    $data = mysqli_fetch_assoc($login);
    
    // Set Session untuk otentikasi
    $_SESSION['status'] = "login";
    $_SESSION['role'] = $role;
    $_SESSION['id'] = $data[$id_field]; // idadmin atau idsiswa
    $_SESSION['nama'] = $data['namalengkap'] ?? $data['namasiswa'] ?? $input_value; // Ambil nama jika ada
    
    // Redirect ke dashboard yang sesuai
    header("location: " . $redirect_success);
    exit;
} else {
    // LOGIN GAGAL
    // Redirect kembali ke halaman login dengan pesan error
    header("location:login.php?pesan=gagal&role=" . $role);
    exit;
}
?>