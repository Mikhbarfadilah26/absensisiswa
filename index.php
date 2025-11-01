<?php
session_start();

// jika belum login, arahkan ke login.php
if (!isset($_SESSION['idadmin'])) {
     header("Location: login.php?pesan=belum_login");
    exit;
}
?>

<?php
// =======================================================
// 1. KONEKSI DATABASE
// =======================================================
require_once 'koneksi.php';

// Definisikan path untuk folder views dan pages
define('VIEWS_PATH', __DIR__ . '/views/');
define('PAGES_PATH', __DIR__ . '/pages/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include PAGES_PATH . 'header.php'; ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">

    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-dark">
            <?php include PAGES_PATH . 'navbar.php'; ?>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include PAGES_PATH . 'sidebar.php'; ?>
        </aside>

        <div class="content-wrapper">
            
            <section class="content">
                <?php
                // =======================================================
                // 2. ROUTING LOGIC
                // =======================================================
                if (isset($_GET['halaman'])) {
                    $halaman = $_GET['halaman'];

                    // Sanitasi untuk keamanan
                    $halaman = preg_replace('/[^a-z0-9_]/i', '', $halaman);

                    switch ($halaman) {

                        // ======= DASHBOARD =======
                        case "dashboard":
                        case "home":
                            include(VIEWS_PATH . "dashboard.php");
                            break;

                        // ======= ADMIN =======
                        case "admin":
                            include(VIEWS_PATH . "admin/admin.php");
                            break;
                        case "tambahadmin":
                            include(VIEWS_PATH . "admin/tambahadmin.php");
                            break;
                        case "editadmin":
                            include(VIEWS_PATH . "admin/editadmin.php");
                            break;
                        case "tampiladmin":
                            include(VIEWS_PATH . "admin/tampiladmin.php");
                            break;

                        // ======= SISWA =======
                        case "siswa":
                            include(VIEWS_PATH . "siswa/siswa.php");
                            break;
                        case "tambahsiswa":
                            include(VIEWS_PATH . "siswa/tambahsiswa.php");
                            break;
                        case "editsiswa":
                            include(VIEWS_PATH . "siswa/editsiswa.php");
                            break;

                        // index.php - Bagian KELAS
                        case "kelas":
                            include(VIEWS_PATH . "kelas/kelas.php");
                            break;
                        case "tambahkelas":
                            include(VIEWS_PATH . "kelas/tambahkelas.php");
                            break;
                        case "editkelas":
                            include(VIEWS_PATH . "kelas/editkelas.php");
                            break;

                        // ======= ABSEN =======
                        case "absen":
                            include(VIEWS_PATH . "absen/absen.php");
                            break;
                        case "tambahabsen":
                            include(VIEWS_PATH . "absen/tambahabsen.php");
                            break;
                        case "editabsen":
                            include(VIEWS_PATH . "absen/editabsen.php");
                            break;

                        // ======= KEHADIRAN =======
                        case "kehadiran":
                            include(VIEWS_PATH . "kehadiran/kehadiran.php");
                            break;
                        case "tambahkehadiran":
                            include(VIEWS_PATH . "kehadiran/tambahkehadiran.php");
                            break;
                        case "editkehadiran":
                            include(VIEWS_PATH . "kehadiran/editkehadiran.php");
                            break;

                        // ======= DETIL KEHADIRAN =======
                        case "detilkehadiran":
                            include(VIEWS_PATH . "detilkehadiran/detilkehadiran.php");
                            break;
                        case "tambahdetilkehadiran":
                            include(VIEWS_PATH . "detilkehadiran/tambahdetilkehadiran.php");
                            break;
                        case "editdetilkehadiran":
                            include(VIEWS_PATH . "detilkehadiran/editdetilkehadiran.php");
                            break;

                        // ======= KATEGORI =======
                        case "kategori":
                            include(VIEWS_PATH . "kategori/kategori.php");
                            break;
                        case "tambahkategori":
                            include(VIEWS_PATH . "kategori/tambahkategori.php");
                            break;
                        case "editkategori":
                            include(VIEWS_PATH . "kategori/editkategori.php");
                            break;

                        // ======= DEFAULT (404) =======
                        default:
                            include(PAGES_PATH . "notfound.php");
                            break;
                    }
                } else {
                    // Default: Dashboard
                    include(VIEWS_PATH . "dashboard.php");
                }
                ?>
            </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>

        <footer class="main-footer">
            <?php include PAGES_PATH . 'footer.php'; ?>
        </footer>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    </body>
</html>

