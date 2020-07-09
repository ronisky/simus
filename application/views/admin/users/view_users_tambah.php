<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Pengguna</h3>
            </div>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('admin/tambah_user') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type='email' class='form-control' name='email' value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='username' value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama lengkap</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='nama' value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Telp</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='telp' value="<?= set_value('telp'); ?>">
                    <?= form_error('telp', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kota Sekarang</label>
                  <div class="col-sm-6">
                    <select name="kota" class='form-control select2'>
                      <option value=""></option>
                      <?php $qkota = $this->db->get('tb_kota');
                      foreach ($qkota->result_array() as $kota) { ?>
                        <option value="<?= $kota['kota_id'] ?>"><?= $kota['nama_kota'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?= form_error('kota', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Level</label>
                  <?= form_error('level', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  <div class="col-sm-6">
                    <input type='radio' name='level' value='1'> Administrator &nbsp;
                    <input type='radio' name='level' value='2'> koordinator &nbsp;
                    <input type='radio' name='level' value='3'> Resepsionis &nbsp;
                    <input type='radio' name='level' value='4'> Penata Pamaeran
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Default Password</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='password1' readonly value="<?= $password ?>">
                    <?= form_error('password1', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-sm-6"></div>
                <div class="form-group row">
                  <div class="col-sm-2"></div>
                  <small class="font-bold text-primary ml-2">*Data pendaftaran akan dikirim ke email yang didaftarkan.</small>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Kirim</button>
                    <a href='<?= base_url('admin/users') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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