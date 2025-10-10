<?php
include 'koneksi.php'; // atau sesuaikan path

// Ambil data dari tabel admin (kode ini dibiarkan untuk autentikasi/session)
$query = mysqli_query($koneksi, "SELECT * FROM admin"); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'pages/header.php'; ?>
</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <?php include 'pages/navbar.php'; ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include 'pages/sidebar.php'; ?>
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- PERBAIKAN: Mengembalikan judul halaman ke teks statis tanpa marquee -->
                            <h1 class="m-0">Halaman Konten</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Konten</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <?php

                if (isset($_GET['halaman'])) {
                    $halaman = $_GET['halaman'];

                    switch ($halaman) {

                        // ===========================
                        // BAGIAN ADMIN
                        // ===========================
                        case "admin":
                            include("views/admin/admin.php");
                            break;
                        case "tambahadmin":
                            include("views/admin/tambahadmin.php");
                            break;
                        case "editadmin":
                            include("views/admin/editadmin.php");
                            break;

                        // ===========================
                        // BAGIAN SISWA
                        // ===========================
                        case "siswa":
                            include("views/siswa/siswa.php");
                            break;
                        case "tambahsiswa":
                            include("views/siswa/tambahsiswa.php");
                            break;
                        case "editsiswa":
                            include("views/siswa/editsiswa.php");
                            break;

                        // ===========================
                        // BAGIAN KELAS
                        // ===========================
                        case "kelas":
                            include("views/kelas/kelas.php");
                            break;
                        case "tambahkelas":
                            include("views/kelas/tambahkelas.php");
                            break;
                        case "editkelas":
                            include("views/kelas/editkelas.php");
                            break;

                        // ===========================
                        // BAGIAN ABSEN
                        // ===========================
                        case "absen":
                            include("views/absen/absen.php");
                            break;
                        case "tambahabsen":
                            include("views/absen/tambahabsen.php");
                            break;
                        case "editabsen":
                            include("views/absen/editabsen.php");
                            break;

                        // ===========================
                        // BAGIAN KEHADIRAN (Master Kehadiran)
                        // ===========================
                        case "kehadiran":
                            include("views/kehadiran/kehadiran.php");
                            break;
                        case "tambahkehadiran":
                            include("views/kehadiran/tambahkehadiran.php");
                            break;
                        case "editkehadiran":
                            include("views/kehadiran/editkehadiran.php");
                            break;

                        // ===========================
                        // BAGIAN DETIL KEHADIRAN (Detil per absensi)
                        // ===========================
                        case "detilkehadiran":
                            include("views/detilkehadiran/detilkehadiran.php");
                            break;
                        // Nama case diubah menjadi 'tambahdetil' dan 'editdetil' untuk menghindari konflik
                        case "tambahdetil": 
                            include("views/detilkehadiran/tambahdetilkehadiran.php");
                            break;
                        case "editdetil":
                            include("views/detilkehadiran/editdetilkehadiran.php");
                            break;

                        // ===========================
                        // BAGIAN KATEGORI
                        // ===========================
                        case "kategori":
                            include("views/kategori/kategori.php");
                            break;
                        case "tambahkategori":
                            // KESALAHAN KRITIS: File extension .pphp diubah menjadi .php (Perbaikan Dipertahankan)
                            include("views/kategori/tambahkategori.php");
                            break;
                        case "editkategori":
                            include("views/kategori/editkategori.php");
                            break;

                        // ===========================
                        // BAGIAN DASHBOARD
                        // ===========================
                        case "dashboard":
                        case "home":
                            include("views/dashboard.php");
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
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <?php include 'pages/footer.php'; ?>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>
