<?php
// index.php

// =======================================================
// 1. SISTEM PROTEKSI (GUARD) & START SESSION - DIHAPUS
// =======================================================
// session_start(); // Dihapus
// if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) { // Dihapus
//     header('location: login.php'); // Dihapus
//     exit; // Dihapus
// } // Dihapus

// =======================================================
// 2. KONEKSI DATABASE
// =======================================================
require_once 'koneksi.php'; 
// Menggunakan require_once agar ada fatal error jika file tidak ditemukan.

// Contoh pengambilan data admin (sekarang tanpa guard, hanya contoh placeholder)
/*
$data_admin = ['username' => 'DemoUser', 'nama' => 'Admin Demo']; 
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'pages/header.php'; ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">

    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-dark">
            <?php include 'pages/navbar.php'; ?>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include 'pages/sidebar.php'; ?>
        </aside>


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?php 
                                // Menampilkan judul halaman saat ini
                                echo isset($_GET['halaman']) ? ucfirst(str_replace('_', ' ', $_GET['halaman'])) : 'Dashboard'; 
                                ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
                                <li class="breadcrumb-item active">
                                    <?php echo isset($_GET['halaman']) ? ucfirst(str_replace('_', ' ', $_GET['halaman'])) : 'Dashboard'; ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <?php

                // =======================================================
                // 3. LOGIKA ROUTING KONTEN (SWITCH CASE)
                // =======================================================
                if (isset($_GET['halaman'])) {
                    $halaman = $_GET['halaman'];

                    switch ($halaman) {

                        // LOGOUT - DIHAPUS
                        /* case "logout":
                            header('location: logout.php');
                            exit;
                            break;
                        */

                        // BAGIAN DASHBOARD (Case default awal)
                        case "dashboard":
                        case "home":
                            include("views/dashboard.php");
                            break;
                            
                        // BAGIAN ADMIN
                        case "admin":
                            include("views/admin/admin.php");
                            break;
                        case "tambahadmin":
                            include("views/admin/tambahadmin.php");
                            break;
                        case "editadmin":
                            include("views/admin/editadmin.php");
                            break;

                        // BAGIAN SISWA
                        case "siswa":
                            include("views/siswa/siswa.php");
                            break;
                        case "tambahsiswa":
                            include("views/siswa/tambahsiswa.php");
                            break;
                        case "editsiswa":
                            include("views/siswa/editsiswa.php");
                            break;

                        // BAGIAN KELAS
                        case "kelas":
                            include("views/kelas/kelas.php");
                            break;
                        case "tambahkelas":
                            include("views/kelas/tambahkelas.php");
                            break;
                        case "editkelas":
                            include("views/kelas/editkelas.php");
                            break;

                        // BAGIAN ABSEN (Master Tipe Absen)
                        case "absen":
                            include("views/absen/absen.php");
                            break;
                        case "tambahabsen":
                            include("views/absen/tambahabsen.php");
                            break;
                        case "editabsen":
                            include("views/absen/editabsen.php");
                            break;

                        // BAGIAN KEHADIRAN (Master Sesi/Tanggal Kehadiran)
                        case "kehadiran":
                            include("views/kehadiran/kehadiran.php");
                            break;
                        case "tambahkehadiran":
                            include("views/kehadiran/tambahkehadiran.php");
                            break;
                        case "editkehadiran":
                            include("views/kehadiran/editkehadiran.php");
                            break;

                        // BAGIAN DETIL KEHADIRAN (Status per Siswa)
                        case "detilkehadiran":
                            include("views/detilkehadiran/detilkehadiran.php");
                            break;
                        case "tambahdetil": 
                            include("views/detilkehadiran/tambahdetilkehadiran.php");
                            break;
                        case "editdetil":
                            include("views/detilkehadiran/editdetilkehadiran.php");
                            break;

                        // BAGIAN KATEGORI
                        case "kategori":
                            include("views/kategori/kategori.php");
                            break;
                        case "tambahkategori":
                            include("views/kategori/tambahkategori.php");
                            break;
                        case "editkategori":
                            include("views/kategori/editkategori.php");
                            break;

                        // Default case (Halaman tidak ditemukan)
                        default:
                            include("pages/notfound.php");
                            break;
                    }
                } else {
                    // Jika tidak ada parameter 'halaman', tampilkan dashboard secara default
                    include("views/dashboard.php");
                }
                ?>
            </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <footer class="main-footer">
            <?php include 'pages/footer.php'; ?>
        </footer>
    </div>
    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>