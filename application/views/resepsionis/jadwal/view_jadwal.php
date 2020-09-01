<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kalender Reservasi Kunjungan Museum</h3>

                        </div>
                        <div class="card-body" id="calendarIO">
                            <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                            <input type="hidden" name="calendar_id" value="0">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="terimaModalLabel">Detail Pengunjung</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="alert alert-danger" style="display: none;"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">ID Reservasi <span class="required"> * </span></label>
                                                    <div class="col-sm">
                                                        <input type="text" name="id_reservasi" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Nama <span class="required"> * </span></label>
                                                    <div class="col-sm">
                                                        <input type="text" name="title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Jumlah <span class="required"> * </span></label>
                                                    <div class="col-sm">
                                                        <input type="text" name="jumlah" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Kategori <span class="required"> * </span></label>
                                                    <div class="col-sm">
                                                        <input type="text" name="kategori" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Alamat</label>
                                                    <div class="col-sm">
                                                        <textarea name="alamat" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Dari Jam <span class="required"> * </span></label>
                                                    <div class="col-sm">
                                                        <input type="text" name="start_time" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Samapai Jam <span class="required"> * </span></label>
                                                    <div class="col-sm">
                                                        <input type="text" name="end_time" class="form-control">
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end place -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>