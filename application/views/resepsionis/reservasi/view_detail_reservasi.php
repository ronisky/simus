<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Reservasi Kunjungan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-6 image-popup-detail" href="<?= base_url('assets/images/reservasi/') . $rows['foto'] ?>">
                                    <img class="image-popup-detail" src="<?= base_url('assets/images/reservasi/') . $rows['foto'] ?>" alt="" style="max-height: 250px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Reservasi</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['id_reservasi'] ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <?php $status = $rows['status'];
                                    if ($status == 1) {
                                        $s = "<input type='text' class='form-control text-warning' name='jumlah' value='Pengajuan'>";
                                    } else if ($status == 2) {
                                        $s = "<input type='text' class='form-control text-success' name='jumlah' value='Diterima'>";
                                    } else if ($status == 3) {
                                        $s = "<input type='text' class='form-control text-danger' name='jumlah' value='Ditolak'>";
                                    } ?>
                                    <?= $s ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['email'] ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">No. Telp</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['no_telp'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['tanggal'] ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">Jam</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['waktu'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['kategori'] ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">Jumlah</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['jumlah'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama lengkap</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='nama' value="<?= $rows['nama'] ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">ID Card</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='nama' value="<?= $rows['id_card'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Id Card</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='no_id' value="<?= $rows['no_id'] ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">Negara</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' value="<?= $rows['negara'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='provinsi' placeholder="misal: Jawa Barat" value="<?= $rows['provinsi']; ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">Kota</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='kota' value="<?= $rows['kota']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-3">
                                    <textarea type='text' rows="3" class='form-control' name='alamat'><?= $rows['alamat']; ?></textarea>
                                </div>
                                <label class="col-sm-1 col-form-label">Kode Pos</label>
                                <div class="col-sm-3">
                                    <input type='text' class='form-control' name='kode_ps' value="<?= $rows['kode_pos']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label"></label>
                                <div class="col-sm-1 ">
                                    <a href='<?= base_url('resepsionis/reservasi') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Kembali</button></a>
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