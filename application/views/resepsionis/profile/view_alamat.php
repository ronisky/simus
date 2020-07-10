<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Alamat</h3>
            </div>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('resepsionis/edit_alamat') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" name="id" value="<?= encrypt_url($row['id_alamat']) ?>">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-6">
                    <textarea name="alamat" class="form-control" rows="5" required><?= $row['alamat']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kecamatan</label>
                  <div class="col-sm-6">
                    <input class='form-control' type='text' name='kec' value="<?= $row['kecamatan']; ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kota / Kabupaten</label>
                  <div class="col-sm-6">
                    <select class='form-control select2' name='kab' required>
                      <option value=''>- Pilih -</option>
                      <?php
                      foreach ($kota->result_array() as $rows) {
                        if ($row['id_kota'] == $rows['kota_id']) {
                          echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                        } else {
                          echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Pos</label>
                  <div class="col-sm-6">
                    <input class='form-control' min="0" minlength="5" maxlength="7" type='number' name='kode_pos' value='<?= $row['kode_pos']; ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('resepsionis/profile'); ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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