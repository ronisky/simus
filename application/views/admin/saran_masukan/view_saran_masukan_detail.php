<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Saran dan Masukan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input name="nama" class="form-control" value="<?= $record['nama']; ?>" readonly required></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input name="email" class="form-control" value="<?= $record['email']; ?>" readonly></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Subjek</label>
                                <div class="col-sm-6">
                                    <input name="tanya" class="form-control" value="<?= $record['subjek']; ?>"></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pesan</label>
                                <div class="col-sm-6">
                                    <textarea name="jawab" class="form-control" rows="6" required><?= $record['pesan']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-6">
                                    <a href='<?= base_url('admin/saranMasukan') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Kembali</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>