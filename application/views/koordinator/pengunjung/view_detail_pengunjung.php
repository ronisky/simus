<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pengunjung</h3>
                        </div>
                        <div class="card-body">
                            <input type='hidden' name='id' value='<?= $rows['id_pengunjung'] ?>'>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-6">
                                    <input type='date' class='form-control' name='jumlah' value="<?= $rows['tanggal'] ?>">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jam</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['waktu'] ?>">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <?= form_error('kategori', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='kode_ps' value="<?= $rows['kategori']; ?>">
                                    <!-- <select name='kategori' class='form-control'>
                                        <option value=""><?= $row['kategori'] ?></option>
                                        <?php
                                        foreach ($kt as $row) {
                                            if ($rows['kategori'] == $row['id_kategori_pengunjung']) {
                                                echo "<option value='$row[id_kategori_pengunjung]' selected>$row[nama_kategori]</option>";
                                            }
                                        } ?>
                                    </select> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-6">
                                    <input type='number' class='form-control' name='jumlah' value="<?= $rows['jumlah'] ?>">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama lengkap</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='nama' value="<?= $rows['nama'] ?>">
                                    <?= form_error('nama', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID Card</label>
                                <?= form_error('id_card', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                <?php
                                if ($row['id_card'] == 'KTP') { ?>
                                    <div class="col-sm-6">
                                        <input class="mr-2" type='radio' value='KTP' name='id_card' checked> KTP
                                        <input class="mr-2 ml-5" type='radio' value='Paspor' name='id_card'> Paspor
                                    </div>
                                <?php } else { ?>
                                    <div class="col-sm-6">
                                        <input type='radio' value='KTP' name='id_card'> &nbsp; KTP
                                        <input class="ml-3" type='radio' value='Paspor' name='id_card' checked> &nbsp; Paspor
                                    </div>
                                <?php }
                                ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Id Card</label>
                                <div class="col-sm-6">
                                    <input type='number' class='form-control' name='no_id' value="<?= $rows['no_id'] ?>">
                                    <?= form_error('no_id', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Negara</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='kode_ps' value="<?= $rows['negara']; ?>">
                                    <!-- <select name='negara' class='form-control'>
                                        <option value='' selected>- Pilih Negara -</option>
                                        <?php
                                        foreach ($negara as $n) {
                                            if ($rows['negara'] == $n['id_negara']) {
                                                echo "<option value='$n[id_negara]' selected>$n[nama]</option>";
                                            }
                                            echo "<option value='$n[id_negara]'>$n[nama]</option>";
                                        } ?>
                                    </select> -->
                                </div>
                                <?= form_error('negara', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='kode_ps' value="<?= $rows['provinsi']; ?>">
                                    <!-- <select name='provinsi' class='form-control'>
                                        <option value='' selected>- Pilih Provinsi -</option>
                                        <?php
                                        foreach ($provinsi as $prov) {
                                            if ($rows['provinsi'] == $prov['provinsi_id']) {
                                                echo "<option value='$prov[provinsi_id]' selected>$prov[nama_provinsi]</option>";
                                            }
                                            echo "<option value='$prov[provinsi_id]'>$prov[nama_provinsi]</option>";
                                        } ?>
                                    </select> -->
                                    <?= form_error('provinsi', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kota</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='kode_ps' value="<?= $rows['kota']; ?>">
                                    <!-- <select name='kota' class='form-control'>
                                        <option value='' selected>- Pilih Kota -</option>
                                        <?php
                                        foreach ($kota as $kota) {
                                            if ($rows['kota'] == $kota['kota_id']) {
                                                echo "<option value='$kota[kota_id]' selected>$kota[nama_kota]</option>";
                                            }
                                            echo "<option value='$kota[kota_id]'>$kota[nama_kota]</option>";
                                        } ?>
                                    </select> -->
                                    <?= form_error('kota', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-6">
                                    <textarea rows="2" type='text' class='form-control' name='alamat'><?= $rows['alamat']; ?></textarea>
                                    <?= form_error('alamat', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-6">
                                    <input type='number' class='form-control' name='kode_ps' value="<?= $rows['kode_pos']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label"></label>
                                <div class="col-sm-1 ">
                                    <a href='<?= base_url('resepsionis/pengunjung') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Kembali</button></a>
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