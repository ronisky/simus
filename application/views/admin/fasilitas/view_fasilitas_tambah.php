<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Fasilitas <?php $this->session->disabled ?></h3>
            </div>

            <form action="<?= base_url('admin/tambah_fasilitas') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type='text' class='form-control' name='nama' placeholder="Nama fasilitas" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Rating</label>
                  <div class="col-sm-10">
                    <input type='number' step="0.1" class='form-control' name='rating' placeholder="Rating (misal: 4.5)" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea class='form-control' name='deskripsi' rows="5" placeholder="Deskripsi" required></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-10">
                    <div class="custom-file">
                      <input type='file' class='custom-file-input' name='gambar' required>
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih gambar...</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Tambah Fasilitas</button>
                    <a href='<?= base_url('admin/fasilitas') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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