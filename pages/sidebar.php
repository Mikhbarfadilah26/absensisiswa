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
                        <p>dashboard</p>
                    </a>
                </li>

                <li class="nav-header"></li>

                <!-- BAGIAN kelas -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            data kelas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=kelas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>index kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahkelas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>tambah kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- BAGIAN siswa-->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            data siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=siswa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>index siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahsiswa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>tambah siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- BAGIAN kategori -->
                <li class="nav-item">
                    <a href="index.php?halaman=kategori" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>kategori</p>
                    </a>
                </li>

                <li class="nav-header">kehadiran & absensi</li>

                <li class="nav-item">
                    <a href="index.php?halaman=absen" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>absen</p>
                    </a>
                </li>
                <!-- BAGIAN kehadiran -->
                <li class="nav-item">
                    <a href="index.php?halaman=kehadiran" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>data kehadiran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?halaman=detilkehadiran" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>detil kehadiran</p>
                    </a>
                </li>

                <li class="nav-header">pengguna sistem</li>

                <!-- BAGIAN admin -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            data admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?halaman=admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>profil admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?halaman=tambahadmin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>tambah admin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>log out</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>