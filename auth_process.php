<?php
session_start();
include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$role = isset($_POST['role']) ? strtolower($_POST['role']) : null;
$password = isset($_POST['password']) ? $_POST['password'] : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';

if ($role !== 'admin' || empty($username) || empty($password)) {
    header("location:login.php?pesan=gagal");
    exit;
}

// Query database
$stmt = $koneksi->prepare("SELECT * FROM admin WHERE username = ? AND password = ? LIMIT 1");
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $data = $result->fetch_assoc();

    // Set session yang konsisten dengan index.php
    session_regenerate_id(true);
    $_SESSION['status'] = "login";
    $_SESSION['role'] = "admin";
    $_SESSION['idadmin'] = $data['idadmin']; // ini kuncinya!
    $_SESSION['username'] = $data['username'];
    $_SESSION['namaadmin'] = $data['namaadmin'];

    header("Location: index.php?halaman=dashboard");
    exit;
} else {
    header("location:login.php?pesan=gagal");
    exit;
}
?>
