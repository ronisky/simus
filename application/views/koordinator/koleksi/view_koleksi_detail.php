<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Koleksi</h3>
            </div>

            <div class="card-body">
              <form action="<?= base_url('koordinator/edit_koleksi') ?>" method="post" enctype="multipart/form-data">

                <input type='hidden' name='id' value='<?= $rows['id_koleksi'] ?>'>
                <?php
                foreach ($uk as $u) {
                  if ($rows['id_ukuran'] == $u['id_ukuran']) {
                    $ukur = $u['id_ukuran'];
                    $ting = $u['tinggi'];
                    $pan = $u['panjang'];
                    $leb = $u['lebar'];
                    $diam = $u['diameter'];
                    $ber = $u['berat'];
                  }
                } ?>
                <input type='hidden' name='idU' value='<?= $ukur ?>'>

                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pencatat</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='no_regis' value="<?= $rows['nama_pencatat'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Registrasi</label>
                    <div class="col-sm-6">
                      <input type='number' class='form-control' name='no_regis' value="<?= $rows['no_registrasi'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Pencatatan</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='no_regis' value="<?= $rows['tanggal_pencatatan'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Koleksi</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='nama_kol' value="<?= $rows['nama_koleksi'] ?>">
                      <?= form_error('nama_kol', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori Koleksi</label>
                    <div class="col-sm-6">
                      <select name='a' class='form-control'>
                        <option value='' selected>- Pilih Kategori Koleksi -</option>
                        <?php
                        foreach ($record as $row) {
                          if ($rows['id_kategori_koleksi'] == $row['id_kategori_koleksi']) {
                            echo "<option value='$row[id_kategori_koleksi]' selected>$row[nama_kategori]</option>";
                          } else {
                            echo "<option value='$row[id_kategori_koleksi]'>$row[nama_kategori]</option>";
                          }
                        } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Asal Koleksi</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='asal_kol' value="<?= $rows['asal_koleksi'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pemilik Asal</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='pemilik_asal' value="<?= $rows['pemilik_asal'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cara Perolehan</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='cara_peroleh' value="<?= $rows['cara_perolehan'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sumber Pusaka</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='sumber' value="<?= $rows['sumber_pusaka'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-2">
                      <label for=""> Tinggi (cm) </label>
                      <input type='text' class='form-control' name='tg' value="<?= $ting ?>">
                    </div>
                    <div class="col-sm-2">
                      <label for=""> Panjang (cm)</label>
                      <input type='text' class='form-control' name='pjg' value="<?= $pan ?>">
                    </div>
                    <div class="col-sm-2">
                      <label for=""> Lebar (cm)</label>
                      <input type='text' class='form-control' name='lb' value="<?= $leb ?>">
                    </div>
                    <div class="col-sm-2">
                      <label for=""> Diameter (cm)</label>
                      <input type='text' class='form-control' name='dia' value="<?= $diam ?>">
                    </div>
                    <div class="col-sm-2">
                      <label for=""> Berat (kg)</label>
                      <input type='text' class='form-control' name='br' value="<?= $ber ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Koleksi</label>
                    <div class="col-sm-10">
                      <textarea rows="5" id="summernote" class='form-control' name='deskripsi'><?= $rows['deskripsi'] ?></textarea>
                    </div>
                  </div>

                  <?php
                  if ($rows['foto'] != '') { ?>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Gambar Saat Ini</label>
                      <div class="col-sm-6">
                        <img src="<?= base_url('assets/images/koleksi/') . $rows['foto'] ?>" alt="" style="height: 150px">
                      </div>
                    </div>
                  <?php } ?>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <a href='<?= base_url('koordinator/koleksi') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                    </div>
                  </div>

              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>