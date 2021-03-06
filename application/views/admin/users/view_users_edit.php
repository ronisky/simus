<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Profil</h3>
            </div>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('admin/edit_user') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="card-body">

                <input type='hidden' name='id' value='<?= $rows['username'] ?>'>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type='email' class='form-control' name='d' value='<?= $rows['email'] ?>' readonly='on'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-6">
                    <input type='username' class='form-control' name='a' value='<?= $rows['username'] ?>' readonly='on'>
                  </div>
                </div>
                <!-- 
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-6">
                    <input type='password' class='form-control' name='b' onkeyup="nospaces(this)">
                    <small class="font-italic">Kosongkan jika tidak ingin ingin mengubahnya</small>
                  </div>
                </div> -->

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
                  <?= form_error('level', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  <div class="col-sm-6">
                    <select name='level' class='form-control' required>
                      <option value='' selected>- Pilih Level Pengguna -</option>
                      <?php
                      if ($rows['level'] == 1) {
                        echo "<option value='1' selected>Administrator</option>";
                      } elseif ($rows['level'] == 2) {
                        echo "<option value='2' selected>Koordinator</option>";
                      } elseif ($rows['level'] == 3) {
                        echo "<option value='3' selected>Resepsionis</option>";
                      } elseif ($rows['level'] == 4) {
                        echo "<option value='4' selected>Penata Pameran</option>";
                      } else {
                        echo "<option value='1' selected>Administrator</option>";
                        echo "<option value='2' selected>Koordinator</option>";
                        echo "<option value='3' selected>Resepsionis</option>";
                        echo "<option value='4' selected>Penata Pameran</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <?= form_error('id_card', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  <?php
                  if ($rows['aktif'] == '1') { ?>
                    <div class="col-sm-6">
                      <input class="mr-2" type='radio' value='1' name='aktif' checked> Aktif
                      <input class="mr-2 ml-5" type='radio' value='0' name='aktif'> Tidak Aktif
                    </div>
                  <?php } else { ?>
                    <div class="col-sm-6">
                      <input type='radio' value='1' name='aktif'> &nbsp; Aktif
                      <input class="ml-3" type='radio' value='0' name='aktif' checked> &nbsp; Tidak Aktif
                    </div>
                  <?php }
                  ?>
                </div>

                <!-- <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Ganti Foto</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLangHTML" name="f">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih foto...</label>
                    </div>
                  </div>
                </div> -->

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
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/users'); ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>