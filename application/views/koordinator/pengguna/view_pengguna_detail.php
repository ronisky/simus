<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Pengguna</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                <div class="col-sm-6">
                  <input type='email' class='form-control' name='d' value='<?= $rows['tgl_daftar'] ?>'>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                  <input type='email' class='form-control' name='d' value='<?= $rows['email'] ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-6">
                  <input type='username' class='form-control' name='a' value='<?= $rows['username'] ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-6">
                  <input type='text' class='form-control' name='c' value='<?= $rows['nama_lengkap'] ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. Telp</label>
                <div class="col-sm-6">
                  <input type='number' class='form-control' name='e' value='<?= $rows['no_telp'] ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-6">
                  <select name='level' class='form-control' required>
                    <?php
                    if ($rows['level'] == 1) {
                      $lv = 'Administrator';
                    } elseif ($rows['level'] == 2) {
                      $lv = 'Koordinator';
                    } elseif ($rows['level'] == 3) {
                      $lv = 'Resepsionis';
                    } else {
                      $lv = 'Penata Pameran';
                    }
                    ?>
                    <option value=""><?= $lv ?></option>
                    <option value="1">Koordinator</option>
                    <option value="2">Administrator</option>
                    <option value="3">Resepsionis</option>
                    <option value="4 ">Penata Pameran</option>
                  </select>
                </div>
              </div>
              <?php
              if ($rows['foto'] != '') { ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Foto Saat Ini</label>
                  <div class="col-sm-6">
                    <img src="<?= base_url('assets/images/user/') . $rows['foto'] ?>" alt="" style="height: 150px">
                  </div>
                </div>
              <?php } ?>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-6">
                  <?php
                  if ($rows['aktif'] == 1) {
                    $a = "<span class='text-success'>Aktif</span>";
                  } else {
                    $a = "<span class='text-danger'>Tidak Aktif</span>";
                  }
                  ?>
                  <?= $a ?>
                </div>
              </div>


              <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                  <a href='<?= base_url('koordinator?pengguna'); ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>