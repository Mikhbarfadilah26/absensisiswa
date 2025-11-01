<?php
// PASTIKAN koneksi.php sudah di-include di file index.php agar variabel $koneksi tersedia

// =========================================================================
// LOGIKA PHP: MENGAMBIL DATA STATISTIK UTAMA
// =========================================================================

// 1. Total Siswa
$q_siswa = mysqli_query($koneksi, "SELECT COUNT(idsiswa) AS total_siswa FROM siswa");
$d_siswa = mysqli_fetch_assoc($q_siswa);
$total_siswa = $d_siswa['total_siswa'];

// 2. Siswa Hadir Hari Ini
// Ambil data Hadir, Izin, Sakit, Alpha hari ini untuk statistik dan chart
$q_kehadiran_status = mysqli_query($koneksi, "
    SELECT 
        SUM(CASE WHEN statuskehadiran = 'Hadir' THEN 1 ELSE 0 END) AS hadir_hari_ini,
        SUM(CASE WHEN statuskehadiran = 'Izin' THEN 1 ELSE 0 END) AS izin_hari_ini,
        SUM(CASE WHEN statuskehadiran = 'Sakit' THEN 1 ELSE 0 END) AS sakit_hari_ini,
        SUM(CASE WHEN statuskehadiran = 'Alpha' THEN 1 ELSE 0 END) AS alpha_hari_ini
    FROM kehadiran 
    WHERE tanggal = CURDATE()
");
$d_status = mysqli_fetch_assoc($q_kehadiran_status);

$hadir_hari_ini = $d_status['hadir_hari_ini'] ?? 0;
$izin_hari_ini = $d_status['izin_hari_ini'] ?? 0;
$sakit_hari_ini = $d_status['sakit_hari_ini'] ?? 0;
$alpha_hari_ini = $d_status['alpha_hari_ini'] ?? 0;

// Query 5 data absen terbaru
$q_absen_terbaru = mysqli_query($koneksi, "SELECT * FROM absen ORDER BY tanggal DESC, jammasuk DESC LIMIT 5");

// Hitung Persentase Kehadiran
$persentase_hadir = ($total_siswa > 0) ? round(($hadir_hari_ini / $total_siswa) * 100) : 0;
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12"> 
                <h1 class="m-0">Dashboard Absensi Siswa</h1>
            </div>
            </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_siswa; ?></h3>
                        <p>Total Seluruh Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="index.php?halaman=siswa" class="small-box-footer">Lihat Data Siswa <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $hadir_hari_ini; ?></h3>
                        <p>Hadir Hari Ini (<?= date('d M Y'); ?>)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <a href="index.php?halaman=kehadiran" class="small-box-footer">Detail Kehadiran <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $izin_hari_ini + $sakit_hari_ini; ?></h3>
                        <p>Izin & Sakit Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <a href="index.php?halaman=kehadiran" class="small-box-footer">Detail Izin/Sakit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $alpha_hari_ini; ?></h3>
                        <p>Alpha (Tanpa Keterangan) Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <a href="index.php?halaman=kehadiran" class="small-box-footer">Detail Alpha <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">5 Absensi Masuk Terbaru</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <?php
                            while ($absen = mysqli_fetch_assoc($q_absen_terbaru)) :
                            ?>
                            <li class="item">
                                <div class="product-info">
                                    <span class="product-title"><?= htmlspecialchars($absen['namaabsen']); ?></span> 
                                    <span class="product-description">
                                        Absen Masuk Pukul: 
                                        <strong><?= htmlspecialchars($absen['jammasuk']); ?></strong> 
                                        (Tanggal: <?= date('d/m/Y', strtotime($absen['tanggal'])); ?>)
                                    </span>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php if (mysqli_num_rows($q_absen_terbaru) == 0): ?>
                            <p class="text-center p-3 text-muted">Belum ada data absensi masuk terbaru.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Rasio Kehadiran Hari Ini</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div>
                        <p class="text-center text-sm text-muted mt-3">Rasio berdasarkan status Hadir, Izin, Sakit, dan Alpha.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Memastikan Chart.js dimuat di index.php sebelum script ini dijalankan
    if (typeof Chart === 'undefined') {
        console.error("Chart.js library not loaded. Please ensure Chart.js is included in your index.php header.");
        return;
    }
    
    // Data dari PHP
    var hadir = <?= $hadir_hari_ini; ?>;
    var izin = <?= $izin_hari_ini; ?>;
    var sakit = <?= $sakit_hari_ini; ?>;
    var alpha = <?= $alpha_hari_ini; ?>;
    
    var pieChartCanvas = document.getElementById('pieChart').getContext('2d');
    var pieData = {
        labels: [
            'Hadir',
            'Izin',
            'Sakit',
            'Alpha',
        ],
        datasets: [{
            data: [hadir, izin, sakit, alpha],
            backgroundColor: ['#00a65a', '#f39c12', '#00c0ef', '#f56954'], // success, warning, info, danger
        }]
    };
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var label = data.labels[tooltipItem.index] || '';
                    if (label) {
                        label += ': ';
                    }
                    label += data.datasets[0].data[tooltipItem.index];
                    return label;
                }
            }
        },
        legend: {
            position: 'bottom'
        }
    };
    
    // Membuat Pie Chart
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
});
</script>