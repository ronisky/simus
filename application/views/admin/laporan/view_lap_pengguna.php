<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Laporan Pengguna</h3>
                        </div>

                        <div class="card-body">



                            <table id="laptabel" class="table table-sm table-borderless table-responsive" style="width:100%">

                                <thead>
                                    <tr>
                                        <td colspan="2">
                                            <button type='button' class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> Pilih Waktu </button>
                                            <div class='dropdown-menu' style='border:1px solid #cecece;'>
                                                <a class='dropdown-item' href='<?= base_url('admin/laporanPengguna/') ?>'>Semua</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporanPengguna_hari') ?>'>Hari Ini</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporanPengguna_minggu') ?>'>7 hari terahir</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporanPengguna_bulan') ?>'>30 hari terakhir</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporanPengguna_tahun') ?>'>1 tahun terakhir</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record->result_array() as $row) {

                                        if ($row['level'] == 1) {
                                            $lv = 'Administrator';
                                        } elseif ($row['level'] == 2) {
                                            $lv = 'Koordinator';
                                        } elseif ($row['level'] == 3) {
                                            $lv = 'Resepsionis';
                                        } else {
                                            $lv = 'Penata Pameran';
                                        }

                                        if ($row['aktif'] == 1) {
                                            $aktif = 'Aktif';
                                        } else {
                                            $aktif = 'Tidak Aktif';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nama_lengkap'] ?></td>
                                            <td><?= $row['email'] ?></td>

                                            <td><?= $row['no_telp'] ?></td>
                                            <td><?= $lv; ?></td>
                                            <td><?= $aktif; ?></td>
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