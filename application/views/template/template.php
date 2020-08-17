<!-- Header  -->
<?php include '_partials/header.php' ?>
<!-- /. Header  -->

<!-- Navbar -->
<?php include '_partials/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4" style="font-family: 'Quicksand', sans-serif; font-weight: 300;">
  <!-- Brand Logo -->
  <!-- Brand Logo -->
  <div class="bg-primary brand-link">
    <a href="">
      <img src="<?= base_url('assets/images/logo/logomini.png') ?>" alt="Simus" class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?php if ($this->session->level == 1) { ?>
          Administrator <?php } elseif ($this->session->level == 2) { ?>
          Koordinator <?php } elseif ($this->session->level == 3) { ?>
          Resepsionis <?php } else { ?>
          Penata Pameran
        <?php } ?>
      </span>
    </a>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">

    <?php
    $log = $this->model_pengguna->pengguna_edit($this->session->username)->row_array();
    if ($log['foto'] == '') {
      $foto = 'default.jpg';
    } else {
      $foto = $log['foto'];
    }
    echo "<div class='user-panel mt-3 pb-3 mb-3 d-flex'>
            <a href=" . base_url('home/profile') . ">
              <div class='image'>
                <img src='" . base_url() . "assets/images/user/$foto' class='img-circle elevation-2' alt='User Image'>
              </div>
              <div class='info text-center'>
                <a href=" . base_url('home/profile') . " class='d-block'>$log[username]</a>
                <a class='d-block text-xs mt-1'><i class='fa fa-circle text-success'></i> Online</a>
              </div>
            </div>
            </a>";
    ?>


    <?php include '_partials/sidebar.php' ?>
    <!-- /. Sidebar -->
  </div>
</aside>

<!-- Konten  -->
<?php echo $konten; ?>
<!-- /. Konten  -->

<!-- Footer  -->
<?php include '_partials/footer.php' ?>
<!-- /. Footer  -->