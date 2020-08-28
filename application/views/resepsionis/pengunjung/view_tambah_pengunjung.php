<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pengunjung</h3>
                        </div>
                        <?= $this->session->flashdata('message') ?>
                        <form action="<?= base_url('resepsionis/tambah_pengunjung') ?>" method="post">
                            <div class="card-body col-md-12">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <?= form_error('kategori', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    <div class="col-sm-6 ">
                                        <select name="kategori" class='form-control select2' required>
                                            <option value=""></option>
                                            <?php $kategori = $this->db->get('tb_kategori_pengunjung');
                                            foreach ($kategori->result_array() as $k) { ?>
                                                <option value="<?= $k['id_kategori_pengunjung'] ?>"><?= $k['nama_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-6">
                                        <input type='number' class='form-control' name='jumlah' value="<?= set_value('jumlah'); ?>" required>
                                        <?= form_error('jumlah', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama lengkap</label>
                                    <div class="col-sm-6">
                                        <input type='text' class='form-control' name='nama' value="<?= set_value('nama'); ?>" required>
                                        <?= form_error('nama', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ID Card</label>
                                    <?= form_error('id_card', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    <div class="col-sm-6">
                                        <input type='radio' name='id_card' value='KTP' checked> KTP &nbsp;
                                        <input type='radio' name='id_card' value='Paspor'> Paspor
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nomor Id Card</label>
                                    <div class="col-sm-6">
                                        <input type='number' class='form-control' name='no_id' value="<?= set_value('no_id'); ?>" required>
                                        <?= form_error('no_id', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Negara</label>
                                    <div class="col-sm-6">
                                        <select name="negara" class='form-control select2' required>
                                            <option value=""></option>
                                            <?php $qnegara = $this->db->get('tb_negara');
                                            foreach ($qnegara->result_array() as $negara) { ?>
                                                <option value="<?= $negara['id_negara'] ?>"><?= $negara['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?= form_error('negara', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-6">
                                        <select name="provinsi" class='form-control select2' required>
                                            <option value=""></option>
                                            <?php $qnegara = $this->db->get('tb_provinsi');
                                            foreach ($qnegara->result_array() as $negara) { ?>
                                                <option value="<?= $negara['provinsi_id'] ?>"><?= $negara['nama_provinsi'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('provinsi', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kota</label>
                                    <div class="col-sm-6">
                                        <select name="kota" class='form-control select2' required>
                                            <option value=""></option>
                                            <?php $qnegara = $this->db->get('tb_kota');
                                            foreach ($qnegara->result_array() as $negara) { ?>
                                                <option value="<?= $negara['kota_id'] ?>"><?= $negara['nama_kota'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('kota', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <textarea type='text' class='form-control' name='alamat' required></textarea>
                                        <?= form_error('alamat', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-6">
                                        <input type='number' class='form-control' name='kode_pos' value="<?= set_value('kode_pos'); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <button type='submit' name='submit' class='btn btn-primary btn-sm'>Tambah Pengunjung</button>
                                        <a href='<?= base_url('resepsionis/pengunjung') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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