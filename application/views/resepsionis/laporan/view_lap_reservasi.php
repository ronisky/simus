<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Laporan Reservasi Pengunjung</h3>
                        </div>

                        <div class="card-body">
                            <div>
                            </div>
                            <label for="">Aksi Tabel</label>
                            <table id="laptabel" class="table table-sm table-borderless table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <td colspan="2">
                                            <button type='button' class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> Pilih Waktu </button>
                                            <div class='dropdown-menu' style='border:1px solid #cecece;'>
                                                <a class='dropdown-item' href='<?= base_url('resepsionis/laporanPengunjung/') ?>'>Semua</a>
                                                <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanPengunjung_hari') ?>'>Hari Ini</a>
                                                <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanPengunjung_minggu') ?>'>7 hari terahir</a>
                                                <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanPengunjung_bulan') ?>'>30 hari terakhir</a>
                                                <a class=' dropdown-item' href='<?= base_url('resepsionis/laporanPengunjung_tahun') ?>'>1 tahun terakhir</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Negara</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Kode Pos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record->result_array() as $row) { ?>
                                        <tr>
                                            <td><?= $no ?> </td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['waktu']; ?></td>
                                            <td><?= $row['kategori'] ?></td>
                                            <td><?= $row['jumlah']; ?></td>
                                            <td><?= $row['negara'] ?></td>
                                            <td><?= $row['provinsi']; ?></td>
                                            <td><?= $row['kota'] ?></td>
                                            <td><?= $row['kode_pos']; ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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