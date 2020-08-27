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
                            <input type='hidden' name='id' value='<?= $rows['id_reservasi'] ?>'>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Reservasi</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['kd_reservasi'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['status'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['no_telp'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['tanggal'] ?>">
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
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['kategori'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='jumlah' value="<?= $rows['jumlah'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama lengkap</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='nama' value="<?= $rows['nama'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID Card</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='nama' value="<?= $rows['id_card'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Id Card</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='no_id' value="<?= $rows['no_id'] ?>">
                                </div>
                            </div>
                            <?php
                            if ($rows['foto_id'] != '') { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar ID Card</label>
                                    <div class="col-sm-6">
                                        <img src="<?= base_url('assets/images/reservasi/') . $rows['foto_id'] ?>" alt="" style="height: 150px">
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Negara</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' value="<?= $rows['negara'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kebangsaan</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' value="<?= $rows['kebangsaan'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='provinsi' placeholder="misal: Jawa Barat" value="<?= $rows['provinsi']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kota</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='kota' value="<?= $rows['kota']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='alamat' value="<?= $rows['alamat']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-6">
                                    <input type='text' class='form-control' name='kode_ps' value="<?= $rows['kode_pos']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label"></label>
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