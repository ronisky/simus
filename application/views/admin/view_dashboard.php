<div class="content-wrapper">

  <section class="content mb-5 mt-5">
    <div class="container-fluid">
      <div class="row">

        <?php
        $pengguna = $this->db->query("SELECT * FROM tb_pengguna");
        $subscriber = $this->db->query('SELECT * FROM tb_subs');
        $artikel = $this->db->query('SELECT * FROM tb_blog_artikel');
        ?>

        <div class="col-lg-3 col-6 ml-5">

          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $subscriber->num_rows(); ?></h3>
              <p>Subscriber</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $pengguna->num_rows(); ?></h3>
              <p>Pengguna / Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $artikel->num_rows(); ?></h3>
              <p>Artikel</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>

          </div>
        </div>


      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-5">
          <?php include 'grafik_pengunjung.php'; ?>
        </div>
      </div>
    </div>
  </section>

</div>

<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/chart.js/Chart.min.js"></script>