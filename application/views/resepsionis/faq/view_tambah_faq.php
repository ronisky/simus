<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">F.A.Q Detail</h3>
                        </div>
                        <?= $this->session->flashdata('message') ?>
                        <form action="<?= base_url('resepsionis/tambah_faq') ?>" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="<?= encrypt_url($record['id_faq']) ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-6">
                                        <input name="nama" class="form-control" value="<?= $row['nama_lengkap']; ?>" readonly required></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input name="email" class="form-control" value="<?= $row['email']; ?>" readonly></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Petanyaan</label>
                                    <div class="col-sm-6">
                                        <textarea name="tanya" class="form-control" rows="6" required></textarea>
                                        <?= form_error('tanya', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jawaban</label>
                                    <div class="col-sm-6">
                                        <textarea name="jawab" class="form-control" rows="6" required></textarea>
                                        <?= form_error('jawab', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <button type='submit' name='submit' class='btn btn-primary btn-sm'>Tambah</button>
                                        <a href='<?= base_url('resepsionis/faq'); ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Kembali</button></a>
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