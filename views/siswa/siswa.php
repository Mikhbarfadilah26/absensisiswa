<?php
// File: views/siswa/siswa.php

$query = mysqli_query($koneksi, "
    SELECT s.idsiswa, s.NIS, s.namasiswa, s.fotosiswa, k.namakelas
    FROM siswa s
    LEFT JOIN kelas k ON s.idkelas = k.idkelas
    ORDER BY s.namasiswa ASC
");
?>

<!-- Tambahkan styling modern -->
<style>
    .card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #00c6ff);
        color: white;
        border-radius: 20px 20px 0 0;
        padding: 15px 20px;
    }

    .btn-primary {
        background: linear-gradient(90deg, #007bff, #00c6ff);
        border: none;
        border-radius: 10px;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #0062cc, #0099cc);
        transform: scale(1.05);
    }

    table {
        border-radius: 15px;
        overflow: hidden;
        width: 100%;
    }

    table thead {
        background: #00b4d8;
        color: white;
        text-align: center;
    }

    table tbody tr:hover {
        background-color: #e9f7ff;
        transition: background 0.2s ease;
    }

    td img {
        border-radius: 50%;
        border: 2px solid #00b4d8;
    }

    .btn-warning {
        background: #ffc107;
        border: none;
        transition: transform 0.2s;
    }

    .btn-warning:hover {
        transform: scale(1.1);
        background: #e0a800;
    }

    .btn-danger {
        background: #dc3545;
        border: none;
        transition: transform 0.2s;
    }

    .btn-danger:hover {
        transform: scale(1.1);
        background: #b02a37;
    }

    /* Animasi fade-in */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Tambahkan animasi dan interaksi dengan JS -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Efek fade-in untuk tabel
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, i) => {
            setTimeout(() => row.classList.add('fade-in'), i * 100);
        });

        // Efek hover lembut untuk tombol
        document.querySelectorAll('button, a.btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => btn.style.filter = 'brightness(1.1)');
            btn.addEventListener('mouseleave', () => btn.style.filter = 'brightness(1)');
        });
    });
</script>

<!-- Konten Halaman -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">📚 Data Siswa</h3>
        <a href="index.php?halaman=tambahsiswa" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($data['NIS']); ?></td>
                            <td><?= htmlspecialchars($data['namasiswa']); ?></td>
                            <td><?= htmlspecialchars($data['namakelas']); ?></td>
                            <td>
                                <?php if (!empty($data['fotosiswa'])) : ?>
                                    <img src="foto/siswa/<?= htmlspecialchars($data['fotosiswa']); ?>" 
                                         alt="Foto Siswa" width="50" height="50" style="object-fit: cover;">
                                <?php else : ?>
                                    <span class="text-muted">Tidak Ada</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?halaman=editsiswa&id=<?= $data['idsiswa']; ?>" 
                                   class="btn btn-warning btn-sm me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="db/dbsiswa.php?proses=hapussiswa&id=<?= $data['idsiswa']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus data siswa bernama <?= htmlspecialchars($data['namasiswa']); ?>?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
