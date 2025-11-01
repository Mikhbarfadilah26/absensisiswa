<?php
// File: views/siswa/siswa.php
// Pastikan koneksi.php sudah di-include di index.php (sudah dilakukan)

// 1. PERBAIKAN QUERY: Urutkan berdasarkan Nama Kelas
$query_siswa = mysqli_query($koneksi, "
    SELECT s.idsiswa, s.NIS, s.namasiswa, s.fotosiswa, k.namakelas
    FROM siswa s
    LEFT JOIN kelas k ON s.idkelas = k.idkelas
    ORDER BY k.namakelas ASC, s.namasiswa ASC 
");

// Siapkan variabel untuk pengelompokan
$siswa_by_kelas = [];
while ($data = mysqli_fetch_assoc($query_siswa)) {
    // Kelompokkan data ke dalam array berdasarkan namakelas
    $siswa_by_kelas[$data['namakelas']][] = $data;
}
?>

<style>
    /* ------------------------------------------- */
    /* CSS BARU UNTUK 3 KOLOM */
    /* ------------------------------------------- */
    /* Menggunakan Flexbox/Grid dari Bootstrap 4/5 untuk 3 kolom */
    .kelas-container {
        display: flex; /* Tambahkan display flex untuk container jika tidak pakai Bootstrap row */
        flex-wrap: wrap; /* Agar card bisa turun ke baris baru */
        gap: 20px; /* Jarak antar card */
        margin-bottom: 20px;
    }
    
    /* PENTING: Gunakan sistem kolom Bootstrap (col-lg-4/col-md-6) */

    /* ------------------------------------------- */
    /* CSS LAMA YANG DITINGKATKAN */
    /* ------------------------------------------- */
    .card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%; /* Penting untuk tampilan kolom yang seragam */
    }

    /* Style khusus untuk Header Accordion Kelas (Card Kelas) */
    .card-kelas-header {
        /* Mengganti header lama dengan card-body yang di-styling */
        background: linear-gradient(90deg, #007bff, #00c6ff);
        color: white;
        padding: 15px;
        cursor: pointer;
        border-radius: 15px; /* Sesuaikan dengan card luar */
        margin: 0;
        transition: background 0.3s;
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 80px; /* Tinggi minimum agar seragam */
        user-select: none; /* Non-selectable */
    }
    .card-kelas-header:hover {
        background: linear-gradient(90deg, #0062cc, #0099cc);
    }
    .card-kelas-header h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }
    .card-kelas-header .badge {
        font-size: 0.9rem;
        padding: 8px 12px;
        border-radius: 15px;
        background-color: rgba(255, 255, 255, 0.8);
        color: #007bff;
    }
    /* Style untuk icon panah */
    .toggle-icon {
        transition: transform 0.3s ease;
    }
    .collapsed .toggle-icon {
        transform: rotate(-90deg);
    }
</style>

<div class="card shadow-lg border-0 mb-4">
    <div class="card-header d-flex justify-content-between align-items-center py-3 bg-dark text-white rounded-top" style="border-bottom: none;">
        <h3 class="card-title mb-0"><i class="fas fa-users me-2"></i> Data Siswa Per Kelas</h3>
        <a href="index.php?halaman=tambahsiswa" class="btn btn-warning btn-sm shadow-sm" style="font-weight: 600;">
            <i class="fas fa-plus-circle"></i> Tambah Siswa
        </a>
    </div>

    <div class="card-body p-4">
        
        <?php if (empty($siswa_by_kelas)): ?>
            <div class="alert alert-info text-center">Belum ada data kelas atau siswa yang tercatat.</div>
        <?php else: ?>

            <div class="row" id="kelasGrid">
                
                <?php 
                $index = 0;
                // Loop untuk setiap kelompok kelas
                foreach ($siswa_by_kelas as $namakelas => $list_siswa): 
                    $index++;
                    $collapse_id = 'collapseKelas' . $index;
                    // Buka kelas pertama secara default jika diinginkan, namun lebih baik semua tertutup untuk 30 kelas
                    $is_open = ''; // Tetap tertutup semua
                ?>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-kelas-header" data-toggle="collapse" data-target="#<?= $collapse_id ?>" 
                             aria-expanded="<?= ($index == 1) ? 'true' : 'false' ?>" aria-controls="<?= $collapse_id ?>">
                            <h3>
                                <?= htmlspecialchars($namakelas); ?> 
                            </h3>
                            <span class="badge badge-light">
                                <?= count($list_siswa); ?> Siswa
                            </span>
                            <i class="fas fa-chevron-down ms-2 toggle-icon <?= ($is_open == 'show') ? '' : 'collapsed' ?>"></i>
                        </div>
                        
                        <div id="<?= $collapse_id ?>" class="collapse <?= $is_open ?>" data-parent="#kelasGrid">
                            <div class="table-responsive p-3">
                                <table class="table table-bordered table-hover table-striped text-center align-middle" style="font-size: 0.85rem;">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($list_siswa as $data_siswa) :
                                        ?>
                                            <tr class="fade-in">
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($data_siswa['NIS']); ?></td>
                                                <td class="text-start"><?= htmlspecialchars($data_siswa['namasiswa']); ?></td>
                                                <td>
                                                    <a href="index.php?halaman=editsiswa&id=<?= $data_siswa['idsiswa']; ?>" 
                                                        class="btn btn-warning btn-sm me-1" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="db/dbsiswa.php?proses=hapussiswa&id=<?= $data_siswa['idsiswa']; ?>" 
                                                        class="btn btn-danger btn-sm" title="Hapus"
                                                        onclick="return confirm('Yakin ingin menghapus data siswa bernama <?= htmlspecialchars($data_siswa['namasiswa']); ?>?');">
                                                            <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> </div> <?php endforeach; ?>
                
            </div> <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Efek fade-in untuk baris tabel
        const rows = document.querySelectorAll('tbody tr.fade-in');
        rows.forEach((row, i) => {
            row.style.animationDelay = `${i * 50}ms`;
            // Pastikan Anda memiliki CSS untuk animasi fade-in di file CSS global Anda
        });

        // Efek hover lembut untuk tombol
        document.querySelectorAll('button, a.btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => btn.style.filter = 'brightness(1.1)');
            btn.addEventListener('mouseleave', () => btn.style.filter = 'brightness(1)');
        });
        
        // JQuery/Bootstrap Collapse Toggle Icon (Jika Bootstrap dimuat)
        // Menambahkan/Menghapus class 'collapsed' pada icon saat accordion dibuka/ditutup
        $('#kelasGrid .collapse').on('show.bs.collapse', function () {
            $(this).prev('.card-kelas-header').find('.toggle-icon').removeClass('collapsed');
        }).on('hide.bs.collapse', function () {
            $(this).prev('.card-kelas-header').find('.toggle-icon').addClass('collapsed');
        });

        // Inisialisasi status icon saat DOM ready
        $('#kelasGrid .collapse').each(function() {
             if (!$(this).hasClass('show')) {
                 $(this).prev('.card-kelas-header').find('.toggle-icon').addClass('collapsed');
             }
        });
    });
</script>