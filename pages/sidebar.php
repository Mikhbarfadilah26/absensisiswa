<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php?halaman=dashboard" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HALAMAN APLIKASI</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">M.ikhbar fadilah</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="index.php?halaman=dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">Data </li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Data Kelas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=kelas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Index Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahkelas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=kelas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit/Ubah Kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Data Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=siswa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahsiswa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=siswa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit/Ubah Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Kategori
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=kategori" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahkategori" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=kategori" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit/Ubah Kategori</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">Data Absensi</li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data  Absen
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=absen" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Absen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahabsen" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Absen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=absen" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit/Ubah Absen</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Data Sesi Kehadiran
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=kehadiran" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Sesi Kehadiran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahkehadiran" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Sesi Kehadiran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=kehadiran" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Sesi Kehadiran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Detil kehadiran Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=detilkehadiran" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Detil kehadiran siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahdetil" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Detil kehadiran siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=detilkehadiran" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Detil Status</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Pengguna Sistem</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Data Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Index Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahadmin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit/Ubah Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Log Out</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>