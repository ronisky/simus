<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Laporan Koleksi</h3>
                        </div>

                        <div class="card-body">
                            <div>
                            </div>
                            <label for="">Aksi Tabel</label>
                            <table id="laptabel" class="table table-sm table-borderless" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Tanggal Pencatatan</th>
                                        <th>Nama Koleksi</th>
                                        <th>Tinggi</th>
                                        <th>panjang</th>
                                        <th>Lebar</th>
                                        <th>Diameter</th>
                                        <th>Berat</th>
                                        <th>Asal Koleksi</th>
                                        <th>Pemilik Asal</th>
                                        <th>Cara Perolehan</th>
                                        <th>Sumber Pusaka</th>
                                        <th>No Registrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record->result_array() as $row) { ?>
                                        <tr>
                                            <td><?= $no ?> </td>
                                            <td><?= $row['tanggal_pencatatan'] ?></td>
                                            <td><?= $row['nama_koleksi']; ?></td>
                                            <td><?= $row['tinggi']; ?></td>
                                            <td><?= $row['panjang']; ?></td>
                                            <td><?= $row['lebar']; ?></td>
                                            <td><?= $row['diameter']; ?></td>
                                            <td><?= $row['berat']; ?></td>
                                            <td><?= $row['asal_koleksi'] ?></td>
                                            <td><?= $row['pemilik_asal']; ?></td>
                                            <td><?= $row['cara_perolehan'] ?></td>
                                            <td><?= $row['sumber_pusaka']; ?></td>
                                            <td><?= $row['no_registrasi']; ?></td>

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