<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Kategori Pengunjung</h3>
            </div>

            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('resepsionis/tambah_kategori_pengunjung') ?>" method="post" class="form-horizontal">
              <div class="card-body">

                <input type='hidden' name='id' value=''>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Kategori</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='a' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                    <a href='<?= base_url('resepsionis/kategori_pengunjung') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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