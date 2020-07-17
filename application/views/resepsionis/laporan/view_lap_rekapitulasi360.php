<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Rekapitulasi Jumlah Pengunjung Museum</h3>
                        </div>

                        <div class="card-body ml-5 mb-5">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Rekapitulasi Jumlah Pengunjung</label>
                                <button type='button' class='btn btn-primary btn-sm dropdown-toggle ml-3' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> Pilih Waktu </button>
                                <div class='dropdown-menu' style='border:1px solid #cecece;'>
                                    <a class='dropdown-item' href='<?= base_url('resepsionis/laporanRekapitulasi/') ?>'>Semua</a>
                                    <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanRekapitulasi1/') ?>'>Hari Ini</a>
                                    <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanRekapitulasi7/') ?>'>7 hari terahir</a>
                                    <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanRekapitulasi30/') ?>'>30 hari terakhir</a>
                                    <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanRekapitulasi360/') ?>'>1 tahun terakhir</a>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Klasifikasi</label>
                                <div class="col-sm-6">
                                    <label class="col-sm-2 col-form-label">Jumlah</label>
                                </div>
                            </div>
                            <form action="<?= base_url('resepsionis/cetak_rekap360') ?>" method="POST">
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Pengunjung TK / PAUD</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="tk" readonly value="<?= $jmlPengunjungTK360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Pengunjung SD</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="sd" readonly value="<?= $jmlPengunjungSD360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Pengunjung SMP</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="smp" readonly value="<?= $jmlPengunjungSMP360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Pengunjung SMA</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="sma" readonly value="<?= $jmlPengunjungSMA360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Pengunjung Universitas / PT</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="univ" readonly value="<?= $jmlPengunjungUniv360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Pengunjung Umum</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="umum" readonly value="<?= $jmlPengunjungUmum360; ?>"></input>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Wisatawan Nusantara</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="nusan" readonly value="<?= $jmlPengunjungNusan360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-3 col-form-label">Wisatawan Mancanegara</span>
                                    <div class="col-sm-6">
                                        <input class="col-sm-2 col-form-label text-bold" name="manca" readonly value="<?= $jmlPengunjungMaca360; ?>"></input>
                                    </div>
                                </div>
                                <hr>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total jumlah pengunjung</label>
                                    <div class="col-sm-6">
                                        <input class="col-sm-3 col-form-label text-bold" name="total" readonly value="<?= $jmlPengunjung360; ?>"></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary col-sm-8 mt-5"><i class="menu-icon fa fa-file-pdf-o"></i> Export to PDF</button>
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
    $(document).ready(function() {
        $('#laptabel').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>