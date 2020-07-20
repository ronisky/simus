<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Produk</h3>
            </div>

            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('penata/tambah_koleksi') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nomor Registrasi</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='no_regis' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Koleksi</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='nama_kol' required>
                    <?= form_error('nama_kol', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori Koleksi</label>
                  <div class="col-sm-6">
                    <select name='kategori' class='form-control select2' required>
                      <option value='' selected>- Pilih Kategori Koleksi -</option>
                      <?php
                      foreach ($record as $row) {
                        echo "<option value='$row[id_kategori_koleksi]'>$row[nama_kategori]</option>";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Asal Koleksi</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='asal_kol' value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pemilik Asal</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='pemilik_asal' value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Cara Perolehan</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='cara_peroleh' value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sumber Pusaka</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='sumber' value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Ukuran</label>
                  <div class="col-sm-2">
                    <label for=""> Tinggi (cm)</label>
                    <input type='text' class='form-control' name='tg' value="">
                  </div>
                  <div class="col-sm-2">
                    <label for=""> Panjang (cm)</label>
                    <input type='text' class='form-control' name='pjg' value="">
                  </div>
                  <div class="col-sm-2">
                    <label for=""> Lebar (cm)</label>
                    <input type='text' class='form-control' name='lb' value="">
                  </div>
                  <div class="col-sm-2">
                    <label for=""> Diameter (cm)</label>
                    <input type='text' class='form-control' name='dia' value="">
                  </div>
                  <div class="col-sm-2">
                    <label for=""> Berat (kg)</label>
                    <input type='text' class='form-control' name='br' value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi Koleksi</label>
                  <div class="col-sm-10">
                    <textarea rows="5" id="summernote" class='form-control' name='deskripsi' value=""></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLangHTML" name="foto">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih gambar...</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                    <a href='<?= base_url('penata/koleksi') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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