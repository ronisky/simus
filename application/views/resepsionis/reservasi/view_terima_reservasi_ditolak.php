<link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>jquery.datetimepicker.min.css">
<script src="<?= base_url('assets/template/js/') ?>jquery.datetimepicker.full.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Terima Reservasi</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('resepsionis/terima_reservasi_ditolak') ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body col-md-8">
                                    <div class="row">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $rows['id_reservasi'] ?>">
                                        <div class="form-group col-sm-6">
                                            <label>Nama Pengunjung</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nama" value="<?= $rows['nama'] ?>" readonly>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Jumlah pengunjung</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="jumlah" value="<?= $rows['jumlah'] ?>" readonly>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="tanggal">Tanggal kunjungan</label>
                                            <div class="input-group">
                                                <input type="text" name="tanggal" class="form-control" value="<?= $rows['tanggal'] ?>" required readonly>
                                                <div class=" input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Berkunjung dari Jam </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="waktu" value="<?= $rows['waktu'] ?>" required readonly>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Sampai Jam</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control timepickeradmin" id="timepickeradmin" name="waktuakhir" value="<?= $rows['waktu'] ?>" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="kategori" value="<?= $rows['kategori'] ?>">
                                        <input type="hidden" name="alamat" value="<?= $rows['alamat'] ?>">
                                        <input type="hidden" name="email" value="<?= $rows['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">Terima Reservasi</button>
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
<script>
    $('#datetimePicker').datetimepicker();
</script>