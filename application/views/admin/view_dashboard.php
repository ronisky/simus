<div class="content-wrapper">

  <section class="content mb-5 mt-5">
    <div class="container-fluid">
      <div class="row">

        <?php
        $koleksi = $this->db->query('SELECT * FROM tb_koleksi');
        $pengguna = $this->db->query("SELECT * FROM tb_pengguna");
        $pengunjung = $this->model_laporan->jumlahPengunjung();
        $artikel = $this->db->query('SELECT * FROM tb_blog_artikel');
        ?>


        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $koleksi->num_rows(); ?></h3>
              <p>Koleksi Museum</p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $pengunjung ?></h3>
              <p>Total Pengunjung Museum</p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner text-light">
              <h3><?= $pengguna->num_rows(); ?></h3>
              <p>User / Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!-- <a href=" <?= base_url('admin/users'); ?>" class="small-box-footer text-light">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $artikel->num_rows(); ?></h3>
              <p>Artikel</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href=" <?= base_url('admin/artikel'); ?>" class="small-box-footer text-light">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>


      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class='col-md-6'>
          <?php include 'grafik_pengunjung.php' ?>
        </div>

        <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Klasifikasi Jumlah Pengunjung Museum Berdasarkan Kategori</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <?php
              $data = $this->db->query("SELECT * FROM tb_pengunjung AS p INNER JOIN tb_kategori_pengunjung AS k ON p.kategori = k.id_kategori_pengunjung GROUP BY k.nama_kategori");
              ?>
              <canvas id="pieChart" style="height:250px; min-height:250px"></canvas>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title ">Klasifikasi Jumlah Pengunjung Museum Berdasarkan Negara Asal</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool " data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <?php
              $dataNegara = $this->db->query("SELECT * FROM tb_pengunjung AS p INNER JOIN tb_negara AS n ON p.negara = n.id_negara GROUP BY n.id_negara");
              ?>
              <canvas id="pieChart1" style="height:250px; min-height:250px"></canvas>
            </div>
          </div>
        </div>

        <div class='col-md-6'>
          <?php include 'grafik_pengunjung_web.php' ?>
        </div>

      </div>
    </div>

</div>
</section>

</div>
<?php

foreach ($data->result() as $pie) {
  $nama[] = $pie->nama_kategori;
  $total[] = (float) $pie->jumlah;
}


?>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/chart.js/Chart.min.js"></script>
<script>
  $(function() {
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
      labels: <?php echo json_encode($nama); ?>,
      datasets: [{
        data: <?php echo json_encode($total); ?>,
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
      }]
    }
    var pieOptions = {
      maintainAspectRatio: !0,
      responsive: !0,
      legend: {
        display: !0,
        position: 'right'
      }
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>

<?php

foreach ($dataNegara->result() as $pie) {
  $namaNegara[] = $pie->nama;
  $totalNegara[] = (float) $pie->jumlah;
}


?>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/chart.js/Chart.min.js"></script>
<script>
  $(function() {
    var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
    var pieData = {
      labels: <?php echo json_encode($namaNegara); ?>,
      datasets: [{
        data: <?php echo json_encode($totalNegara); ?>,
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
      }]
    }
    var pieOptions = {
      maintainAspectRatio: !0,
      responsive: !0,
      legend: {
        display: !0,
        position: 'right'
      }
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>