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
                                        <button type="submit" name="submit" class="btn btn-primary">Edit Data Reservasi</button>
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