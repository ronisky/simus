<nav>
  <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Admin    -->
    <?php if ($this->session->userdata('level') == 1) { ?>
      <li class="nav-item">
        <a href="<?= base_url('admin/home') ?>" class="nav-link">
          <i class="fas fa-tachometer-alt fa-fw nav-icon"></i>
          <p>Dasboard</p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-newspaper fa-fw"></i>
          <p>
            Modul Postingan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="<?= base_url('admin/artikel') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Postingan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/kategori_artikel') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Kategori </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/tag_artikel') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Tag </p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-ad fa-fw"></i>
          <p>
            Modul Newsletter
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="<?= base_url('admin/newsletter') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Kirim Newsletter</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/subscriber') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Subscriber</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users fa-fw"></i>
          <p>
            Modul Pengguna
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('admin/users') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Manajemen Pengguna</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-comments fa-fw"></i>
          <p>
            Saran dan Masukan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('admin/saranMasukan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Lihat Saran Masukan</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-globe-asia fa-fw"></i>
          <p>
            Modul Web
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="<?= base_url('admin/website') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Identitas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/menu') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Menu</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/halaman') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Halaman</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/logo') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Logo</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/slider') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Slider</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="fas fa-file-alt fa-fw nav-icon"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('admin/laporan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Laporan Postingan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/laporanBerita') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Laporan Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/laporanPengguna') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Laporan Pengguna</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/laporanSaranMasukan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Saran dan Masukan </p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item user-panel">
        <p></p>
      </li>
      <li class="nav-item user-panel">
        <p></p>
      </li>

    <?php } ?>
    <!-- /. Admin  -->

    <!-- Koordinator  -->
    <?php if ($this->session->userdata('level') == 2) { ?>
      <li class="nav-item">
        <a href="<?= base_url('koordinator/home') ?>" class="nav-link">
          <i class="fas fa-tachometer-alt fa-fw nav-icon"></i>
          <p>Dasboard</p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user fa-fw"></i>
          <p>
            Modul Pengguna
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('koordinator/users') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>View Pengguna</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users fa-fw"></i>
          <p>
            Modul Pengunjung
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('koordinator/pengunjung') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>View Pengunjung</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users fa-fw"></i>
          <p>
            Modul Koleksi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('koordinator/koleksi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>View Koleksi</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users fa-fw"></i>
          <p>
            Modul Postingan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('koordinator/postingan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>View Postingan</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-comments fa-fw"></i>
          <p>
            Saran dan Masukan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('koordinator/saranMasukan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Lihat Saran Masukan</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item user-panel">
        <p></p>
      </li>
      <li class="nav-item user-panel">
        <p></p>
      </li>
    <?php } ?>
    <!-- /. Koordinator  -->

    <!-- Resepsionis  -->
    <?php if ($this->session->userdata('level') == 3) { ?>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users fa-fw"></i>
          <p>
            Modul Pengunjung
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/pengunjung') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Pengunjung Museum</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/kategori_pengunjung') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Kategori Pengunjung</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-clipboard fa-fw"></i>
          <p>
            Modul Reservasi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/reservasi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Reservasi Kunjungan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/reservasi_diterima') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Reservasi Diterima</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-calendar fa-fw"></i>
          <p>
            Modul Jadwal
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/jadwal') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Kalender Jadwal</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-question-circle fa-fw"></i>
          <p>
            Modul F.A.Q
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/faq') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>F.A.Q</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="fas fa-file-alt fa-fw nav-icon"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/laporanPengunjung') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Laporan Pengunjung</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('resepsionis/laporanRekapitulasi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Rekapitulasi Pengunjung</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item user-panel">
        <p></p>
      </li>
      <li class="nav-item user-panel">
        <p></p>
      </li>

    <?php } ?>
    <!-- /. Resepsionis  -->

    <!-- Penata Pameran  -->
    <?php if ($this->session->userdata('level') == 4) { ?>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file-image fa-fw"></i>
          <p>
            Modul Koleksi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('penata/koleksi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Koleksi Museum</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('penata/kategori_koleksi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Kategori Koleksi</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="fas fa-file-alt fa-fw nav-icon"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('penata/laporanKoleksi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Laporan Koleksi</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item user-panel">
        <p></p>
      </li>
      <li class="nav-item user-panel">
        <p></p>
      </li>

    <?php } ?>
    <!-- /. Penata Pameran  -->

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user fa-fw"></i>
        <p>
          Profile
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url('home/profile') ?>" class="nav-link">
            <i class="far fa-circle nav-icon text-sm"></i>
            <p>My Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('home/password') ?>" class="nav-link">
            <i class="far fa-circle nav-icon text-sm"></i>
            <p>Password</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item mt-1">
      <a href="javascript:void(0)" class="nav-link" onclick="logout()">
        <i class="nav-icon fas fa-sign-out-alt fa-fw"></i>
        <p>
          Keluar
        </p>
      </a>
    </li>

</nav>