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
                        <form action="<?= base_url('resepsionis/tambah_pengunjung') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <?= form_error('kategori', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    <div class="col-sm-6">
                                        <select name="kategori" class='form-control select2'>
                                            <option value=""></option>
                                            <option value="Umum">Umum</option>
                                            <option value="TK">TK / PAUD</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="Universitas">Universitas / PT</option>
                                            <option value="Mancanegara">Mancanegara</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-6">
                                        <input type='number' class='form-control' name='jumlah' value="<?= set_value('jumlah'); ?>">
                                        <?= form_error('jumlah', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama lengkap</label>
                                    <div class="col-sm-6">
                                        <input type='text' class='form-control' name='nama' value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ID Card</label>
                                    <?= form_error('id_card', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    <div class="col-sm-6">
                                        <input type='radio' name='id_card' value='1'> KTP &nbsp;
                                        <input type='radio' name='id_card' value='2'> Paspor
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nomor Id Card</label>
                                    <div class="col-sm-6">
                                        <input type='number' class='form-control' name='no_id' value="<?= set_value('no_id'); ?>">
                                        <?= form_error('no_id', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Negara</label>
                                    <div class="col-sm-6">
                                        <select name="negara" class='form-control select2'>
                                            <option value=""></option>
                                            <?php $qnegara = $this->db->get('tb_negara');
                                            foreach ($qnegara->result_array() as $negara) { ?>
                                                <option value="<?= $negara['nama'] ?>"><?= $negara['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?= form_error('negara', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kebangsaan</label>
                                    <div class="col-sm-6">
                                        <select name="kebangsaan" class='form-control select2'>
                                            <option value=""></option>
                                            <?php $qnegara = $this->db->get('tb_negara');
                                            foreach ($qnegara->result_array() as $negara) { ?>
                                                <option value="<?= $negara['nama'] ?>"><?= $negara['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?= form_error('kebangsaan', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Wilayah Bagian</label>
                                    <div class="col-sm-6">
                                        <input type='text' class='form-control' name='wilayah_bagian' placeholder="misal: Jawa Barat" value="<?= set_value('wilayah_bagian'); ?>">
                                        <?= form_error('wilayah_bagian', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kota</label>
                                    <div class="col-sm-6">
                                        <input type='text' class='form-control' name='kota' value="<?= set_value('kota'); ?>">
                                        <?= form_error('kota', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <input type='text' class='form-control' name='alamat' value="<?= set_value('alamat'); ?>">
                                        <?= form_error('alamat', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-6">
                                        <input type='number' class='form-control' name='kode_ps' value="<?= set_value('kode_ps'); ?>">
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