<section class="content">
    <div class="card">
        <div class="card-header bg-gradient-primary mb-3">
            <div class="row">
                <div class="col tekstebal">
                    <strong>
                        <h5 style="font-family:Arial, Helvetica, sans-serif;">Halaman Tampil Admin</h5>
                    </strong>
                </div>
                <div class="col">
                    <a href="index.php?halaman=tambahadmin" class="btn btn-light float-right btn-sm">
                        <i class="fas fa-plus"></i> Tambah Admin
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row" id="adminContainer">
                <?php
                include __DIR__ . '/../../koneksi.php';
                $no = 1;
                $sqladmin = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY namaadmin ASC");
                if (!$sqladmin) die("Query Error: " . mysqli_error($koneksi));

                while ($dataadmin = mysqli_fetch_array($sqladmin)) :
                ?>
                    <div class="col-md-3 mb-4 admin-card">
                        <div class="card shadow-sm border-0 h-100 admin-item">
                            <div class="card-body text-center">
                                <?php if (!empty($dataadmin['fotoadmin'])): ?>
                                    <img src="foto/admin/<?= htmlspecialchars($dataadmin['fotoadmin']); ?>" 
                                         alt="Foto Admin"
                                         class="rounded-circle mb-3 admin-photo"
                                         width="90" height="90">
                                <?php else: ?>
                                    <div class="rounded-circle bg-secondary mb-3 d-flex align-items-center justify-content-center admin-photo"
                                         style="width:90px; height:90px;">
                                        <i class="fa fa-user text-white fa-2x"></i>
                                    </div>
                                <?php endif; ?>

                                <h6 class="fw-bold mb-1"><?= htmlspecialchars($dataadmin['namaadmin']); ?></h6>
                                <p class="text-muted mb-2"><?= htmlspecialchars($dataadmin['username']); ?></p>

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="index.php?halaman=editadmin&id=<?= $dataadmin['idadmin']; ?>"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="db/dbadmin.php?proses=hapus&idadmin=<?= $dataadmin['idadmin']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus data admin <?= htmlspecialchars($dataadmin['namaadmin']); ?>?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $no++;
                endwhile;
                if ($no == 1) {
                    echo '<div class="col-12 text-center"><p class="text-muted">Data admin masih kosong.</p></div>';
                }
                ?>
            </div>
        </div>

        <div class="card-footer text-center">
            Footer
        </div>
    </div>
</section>

<!-- ====== CSS: Efek Card ====== -->
<style>
    /* Animasi masuk lembut */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .admin-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeUp 0.7s ease both;
        border-radius: 15px;
        overflow: hidden;
    }

    .admin-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .admin-photo {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .admin-item:hover .admin-photo {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
    }

    .admin-item h6 {
        color: #0d6efd;
        font-weight: 600;
    }

    .admin-item p {
        font-size: 13px;
    }

    /* Efek tombol */
    .btn-warning:hover {
        background-color: #ffc107d6;
        transform: scale(1.05);
    }

    .btn-danger:hover {
        background-color: #dc3545d6;
        transform: scale(1.05);
    }

    /* Grid spacing di mobile */
    @media (max-width: 768px) {
        .admin-card {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 576px) {
        .admin-card {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>

<!-- ====== JS: Animasi muncul bertahap ====== -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.admin-item');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`; // delay antar card
        });
    });
</script>
