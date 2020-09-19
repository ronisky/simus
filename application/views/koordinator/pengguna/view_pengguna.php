<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pengguna</h3>
            </div>
            <div class="col-md-12 mt-3 mx-3">
            </div>
            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th style='width:20px'>No</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                    } elseif ($row['level'] == 3) {
                      $lv = 'Resepsionis';
                    } else {
                      $lv = 'Penata Pameran';
                    }

                    if ($row['aktif'] == 1) {
                      $a = "<span class='text-success'>Aktif</span>";
                    } else {
                      $a = "<span class='text-danger'>Tidak Aktif</span>";
                    }

                  ?>

                    <tr>
                      <td><?= $no; ?></td>
                      <td class="image-popup-detail" href="<?= base_url('assets/images/user/') . $foto ?>">
                        <img style='border:1px solid #cecece' class="img-circle" src="<?= base_url('assets/images/user/') . $foto ?>" height="40px" width="40px">
                      </td>
                      <td><?= $row['username'] ?></td>
                      <td><?= $row['nama_lengkap'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $lv; ?></td>
                      <td><?= $a ?></td>
                      <td>
                        <a class='btn btn-success btn-xs detailFaq' title='Detail' href="<?php echo site_url('koordinator/detail_pengguna/') . encrypt_url($row['id_pengguna']); ?>"><i class="fas fa-eye fa-fw"></i></a>
                      </td>
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