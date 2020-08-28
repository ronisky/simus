<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Reservasi</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('resepsionis/edit_reservasi') ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body col-md-8">
                                    <div class="row">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $rows['id_reservasi'] ?>">
                                        <div class="form-group col-sm-6">
                                            <label for="tanggal">Tanggal kunjungan</label>
                                            <div class="input-group">
                                                <input type="text" name="tanggal" class="form-control" id="datepicker" value="<?= $rows['tanggal'] ?>" required>
                                                <div class=" input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Jam kunjungan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker" id="timepicker" name="waktu" value="<?= $rows['waktu'] ?>" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select name='kategori' class='form-control' required>
                                            <option value='' selected>- Pilih Kategori -</option>
                                            <?php
                                            foreach ($record as $row) {
                                                if ($rows['kategori'] == $row['nama_kategori']) {
                                                    echo "<option value='$row[nama_kategori]' selected>$row[nama_kategori]</option>";
                                                }
                                                echo "<option value='$row[nama_kategori]'>$row[nama_kategori]</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Pengunjung</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $rows['jumlah'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $rows['nama'] ?>" required>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2">ID Card</label>
                                        <?= form_error('id_card', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                        <div class="col-sm-5 col-md-6">
                                            <input type='radio' name='id_card' value='KTP' checked> KTP &nbsp;
                                            <input type='radio' name='id_card' value='Paspor'> Paspor
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_id">Nomor ID</label>
                                        <input type="number" class="form-control" id="no_id" name="no_id" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="negara">Negara</label>
                                        <select class="form-control" id="negara" name="negara" required>
                                            <option value=""></option>
                                            <?php $negara = $this->db->get('tb_negara');
                                            foreach ($negara->result_array() as $k) { ?>
                                                <option value="<?= $k['nama'] ?>"><?= $k['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <select class="form-control" id="provinsi" name="provinsi" required>
                                            <option value=""></option>
                                            <?php $provinsi = $this->db->get('tb_provinsi');
                                            foreach ($provinsi->result_array() as $k) { ?>
                                                <option value="<?= $k['nama_provinsi'] ?>"><?= $k['nama_provinsi'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kota">Kota / Kabupaten</label reservasi>
                                        <select class="form-control" id="kota" name="kota" required>
                                            <option value=""></option>
                                            <?php $kota = $this->db->get('tb_kota');
                                            foreach ($kota->result_array() as $k) { ?>
                                                <option value="<?= $k['nama_kota'] ?>"><?= $k['nama_kota'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="number" class="form-control" id="kode_pos" name="kode_pos" required>
                                    </div>

                                    <label>Upload surat pengajuan</label>
                                    <!-- <label for="" class="text-warning small">*Gambar max 5 MB</label> -->
                                    <div class="input-group mb-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" aria-describedby="file" required>
                                            <label class="custom-file-label" for="file">Pilih file</label>
                                        </div>
                                    </div>

                                    <div>
                                        <label><strong>Kontak yang bisa dihubungi:</strong></label>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telepon / Hp</label>
                                        <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary"><i class='fas fa-save fa-fw mr-2'></i>Kirim Pengajuan Reservasi</button>
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