<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index.php?halaman=dashboard" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
    <span class="brand-text font-weight-light">APLIKASI</span>
  </a>

  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">M. ikhbar fadilah</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="index.php?halaman=dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- DATA -->
        <li class="nav-header">Data</li>

        <!-- Data Kelas -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Data Nama Kelas<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelas</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Siswa -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>Data Siswa perkelas<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=siswa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Siswa</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Kategori -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>Kategori<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=kategori" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- DATA ABSENSI -->
        <li class="nav-header">Data Absensi</li>

        <!-- Data Absen -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Data Absen<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=absen" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Absen</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Sesi Kehadiran -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Data  Kehadiran<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=kehadiran" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sesi Kehadiran</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Detil Kehadiran -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-check"></i>
            <p>Detil Kehadiran Siswa<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=detilkehadiran" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Detil Kehadiran</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Pengguna Sistem -->
        <li class="nav-header">Pengguna Sistem</li>

        <!-- Data Admin -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>Data Admin<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=admin" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index Admin</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- ========================= -->
        <!--     LAPORAN ABSENSI       -->
        <!-- ========================= -->
        <li class="nav-header">Laporan Absensi</li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Laporan Absensi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=laporan_harian" class="nav-link">
                <i class="fas fa-sun nav-icon text-warning"></i>
                <p>Laporan Harian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporan_mingguan" class="nav-link">
                <i class="fas fa-calendar-week nav-icon text-success"></i>
                <p>Laporan Mingguan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporan_bulanan" class="nav-link">
                <i class="fas fa-calendar-alt nav-icon text-info"></i>
                <p>Laporan Bulanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporan_perkelas" class="nav-link">
                <i class="fas fa-chalkboard-teacher nav-icon text-primary"></i>
                <p>Laporan per Kelas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporan_persiswa" class="nav-link">
                <i class="fas fa-user-graduate nav-icon text-purple"></i>
                <p>Laporan per Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporan_persemester" class="nav-link">
                <i class="fas fa-book-open nav-icon text-danger"></i>
                <p>Laporan per Semester</p>
              </a>
            </li>
          </ul>
        </li>

        </li>

      </ul>
    </nav>
  </div>
</aside>
