<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">F.A.Q Detail</h3>
                        </div>
                        <input type="hidden" name="id" value="<?= encrypt_url($record['id_faq']) ?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input name="nama" class="form-control" value="<?= $record['nama']; ?>" readonly readonly></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input name="email" class="form-control" value="<?= $record['email']; ?>" readonly></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Petanyaan</label>
                                <div class="col-sm-6">
                                    <textarea name="tanya" class="form-control" rows="6" readonly><?= $record['pertanyaan']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jawaban</label>
                                <div class="col-sm-6">
                                    <textarea name="jawab" class="form-control" rows="6" readonly><?= $record['jawaban']; ?></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-6">
                                    <a href='<?= base_url('resepsionis/faq') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>