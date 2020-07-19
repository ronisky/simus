<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Profile</h3>
            </div>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('home/edit_profile') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="card-body">
                <input type="hidden" name="id" value="<?= $row['username'] ?>">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type='email' class='form-control' name='aa' value='<?= $row['email'] ?>' readonly='on'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-6">
                    <input type='username' class='form-control' name='a' value='<?= $row['username'] ?>' readonly='on'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='b' value='<?= $row['nama_lengkap'] ?>'>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <?php
                  if ($row['jenis_kelamin'] == 'Laki-laki') { ?>
                    <div class="col-sm-6">
                      <input class="mr-2" type='radio' value='Laki-laki' name='d' checked> Laki-laki
                      <input class="mr-2 ml-5" type='radio' value='Perempuan' name='d'> Perempuan
                    </div>
                  <?php } else { ?>
                    <div class="col-sm-6">
                      <input type='radio' value='Laki-laki' name='d'> &nbsp; Laki-laki
                      <input class="ml-3" type='radio' value='Perempuan' name='d' checked> &nbsp; Perempuan
                    </div>
                  <?php }
                  ?>
                </div>
                <!-- <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-3">
                    <input class='datepicker form-control' type='text' name='e' value='<?= $row['tgl_lahir']; ?>' required>
                  </div>
                </div> -->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Telp</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='f' value='<?= $row['no_telp'] ?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Ganti Foto</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLangHTML" name="g">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih foto...</label>
                    </div>
                  </div>
                </div>

                <?php
                if ($row['foto'] != '') { ?>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Saat Ini</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/user/') . $row['foto'] ?>" alt="" style="height: 150px">
                    </div>
                  </div>
                <?php } ?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('home/profile'); ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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