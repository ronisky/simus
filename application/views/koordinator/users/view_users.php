<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manajemen Pengguna</h3>
            </div>
            <div class="col-md-12 mt-3 mx-3">
            </div>
            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th style='width:20px'>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Level</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    if ($row['foto'] == '') {
                      $foto = 'default.jpg';
                    } else {
                      $foto = $row['foto'];
                    }

                    if ($row['level'] == 1) {
                      $lv = 'Administrator';
                    } elseif ($row['level'] == 2) {
                      $lv = 'Koordinator';
                    }
                    elseif ($row['level'] == 3) {
                      $lv = 'Resepsionis';
                    }
                    else {
                      $lv = 'Penata Pameran';
                    }

                  ?>

                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['username'] ?></td>
                      <td><?= $row['nama_lengkap'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='<?= base_url('assets/images/user/') . $foto ?>'></td>
                      <td><?= $lv; ?></td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>