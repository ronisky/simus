<div class="row">
    <div class="col-md-12 mx-auto">
        <h4 class="card-title">Reservasi Kunjungan</h4>

        <div class="row">
            <div class="card-body col-sm-10 " style="text-align: justify;">
                <label>
                    <h5><b>Keuntungan melakukan reservasi dan ketentuan kunjungan Museum</b><br></h5>
                    1. Dengan melakukan reservasi anda nantinya tinggal menunjukan kode reservasi yang anda dapatkan kepada petugas resepsionis / penerima tamu.<br>
                    2. Dilarang membawa makanan ke dalam museum.<br>
                    3. Ikuti dan patuhi aturan yang ada di museum, ikuti sesuai arahan petugas di museum. <br>
                    4. <b>Reservasi dilakukan minimal 3 hari sebelum waktu kunjungan.</b> <br>
                    5. <b> Museum buka setiap hari Senin - Jumat, pukul 09.00 - 15.00,</b> pastikan anda melakukan reservasi pada jam buka museum.

                    <br>
                </label>
            </div>
        </div>
        <div class="card col-sm-10">
            <?= $this->session->flashdata('message') ?>
            <div class="card-header">
                <h5 class="card-title">Lengkapi Form Data Reservasi</h5>
            </div>
            <form action="<?= base_url('reservasi/pengajuanReservasi') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body col-md-12">
                    <div class="row">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>">
                        <div class="form-group col-sm-4">
                            <label for="tanggal">Tanggal kunjungan</label>
                            <div class="input-group">
                                <input type="text" name="tanggal" class="form-control" id="datepickeruser" required placeholder="Tanggal">
                                <div class=" input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Waktu kunjungan</label>
                            <div class="input-group">
                                <input type="text" class="form-control timepickeruser" id="timepickeruser" name="waktu" required placeholder="waktu">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value=""></option>
                            <?php $kategori = $this->db->get('tb_kategori_pengunjung');
                            foreach ($kategori->result_array() as $k) { ?>
                                <option value="<?= $k['nama_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah Pengunjung</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="jumlah pengujung">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="nama lengkap">
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
                        <input type="number" class="form-control" id="no_id" name="no_id" required placeholder="nomor ID Card">
                    </div>

                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <select class="form-control" id="negara" name="negara" required>
                            <option value="Indonesia">Indonesia</option>
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
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" required placeholder="alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="number" class="form-control" id="kode_pos" name="kode_pos" required placeholder="kode pos">
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
                        <input type="email" class="form-control" id="email" name="email" required placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon / Hp</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" required placeholder="nomor telp.">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Kirim Pengajuan Reservasi</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body col-sm-10 " style="text-align: justify;">
        </div>
        <h5>Sahabat juga dapat mengetahui informasi tentang museum dan reservasi kunjungan museum melalui Aplikasi Android.</h5>
        <div class="col-md-12 mx-auto my-3">

            <a href="https://play.google.com/store/apps/details?id=com.pesantech.simusapp">
                <div>
                    <p><strong>Download Aplikasi Sekarang</strong></p>
                    <img src="<?= base_url('assets/images/icon/googleplay.png') ?>" alt="Google Play" style="width: 200px;">

                </div>
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.timepickeruser').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            minTime: '9',
            maxTime: '2:30pm',
            startTime: '09:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
    $(document).ready(function() {
        $(function() {
            $("#datepickeruser").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                minDate: 3,
                maxDate: "+2Y",
                beforeShowDay: $.datepicker.noWeekends
            });
        });
    });
</script>