<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manajemen Pengguna</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_user'); ?>'><i class="fas fa-plus fa-fw mr-1"></i>Tambah Pengguna</a>
            </div>
            <div class="col-md-12 mt-3 mx-3">
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message') ?>
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
                        <?php if ($row['level'] == 1 && $row['username'] == 'admin') { ?>
                          <a class='btn btn-success btn-xs' title='Edit user' data-id="<?= $row['username'] ?>" href="<?= base_url('admin/edit_user/') . encrypt_url($row['username']) ?>"><i class="fas fa-edit fa-fw"></i></a>
                        <?php } else { ?>
                          <a class='btn btn-success btn-xs' title='Edit user' data-id="<?= $row['username'] ?>" href="<?= base_url('admin/edit_user/') . encrypt_url($row['username']) ?>"><i class="fas fa-edit fa-fw"></i></a>
                          <button class='btn btn-danger btn-xs' title='Hapus' data-id="<?= $row['username'] ?>" onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
                        <?php } ?>
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

<script>
  function confirmation(ev) {
    ev.preventDefault();
    var data_id = ev.currentTarget.getAttribute('data-id');
    var currentLocation = window.location;
    Swal.fire({
      title: 'Konfirmasi Hapus Data',
      text: "Apakah Anda ingin menghapus data ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: site_url + 'admin/delete_user/' + data_id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              title: 'Dihapus!',
              text: 'Data berhasil dihapus',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload()
            })
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.debug(jqXHR);
            console.debug(textStatus);
            console.debug(errorThrown);
          },
        });
      }
    })
  }
</script>