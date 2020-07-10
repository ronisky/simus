<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Password</h3>
            </div>
            <?= $this->session->flashdata('message') ?>

            <form action="<?= base_url('koordinator/password') ?>" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password Baru</label>
                  <div class="col-sm-4">
                    <input class='form-control' type='password' name='pass1'>
                    <?= form_error('pass1', '<small class="text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                  <div class="col-sm-4">
                    <input class='form-control' type='password' name='pass2'>
                    <?= form_error('pass2', '<small class="text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>

                <hr>
                <?= $this->session->flashdata('message1') ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password saat ini</label>
                  <div class="col-sm-4">
                    <input class='form-control' type='password' name='pass'>
                    <?= form_error('pass', '<small class="text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Ubah Password</button>
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