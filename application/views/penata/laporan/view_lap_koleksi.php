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
                            <form action="cetak_koleksi" method="POST">
                                <div>
                                    <button class="btn btn-sm btn-success mb-2" type="submit" href="">Expor to PDF</button>
                                </div>
                                <table id="laptabel" class="table table-sm table-borderless table-responsive" style="width:100%">
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
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($record->result_array() as $row) {
                                            $img =  $row['foto'];
                                        ?>
                                            <tr>

                                                <input type="hidden" name="no" value="<?= $no ?>">
                                                <input type="hidden" name="tanggal" value="<?= $row['tanggal_pencatatan'] ?>">
                                                <input type="hidden" name="nama" value="<?= $row['nama_koleksi']; ?>">
                                                <input type="hidden" name="tinggi" value="<?= $row['tinggi']; ?>">
                                                <input type="hidden" name="panjang" value="<?= $row['panjang']; ?>">
                                                <input type="hidden" name="lebar" value="<?= $row['lebar']; ?>">
                                                <input type="hidden" name="diameter" value="<?= $row['diameter']; ?>">
                                                <input type="hidden" name="berat" value="<?= $row['berat']; ?>">
                                                <input type="hidden" name="asal" value="<?= $row['asal_koleksi'] ?>">
                                                <input type="hidden" name="pemilik" value="<?= $row['pemilik_asal']; ?>">
                                                <input type="hidden" name="cara" value="<?= $row['cara_perolehan'] ?>">
                                                <input type="hidden" name="sumber" value="<?= $row['sumber_pusaka']; ?>">
                                                <input type="hidden" name="no_regis" value="<?= $row['no_registrasi']; ?>">
                                                <input type="hidden" name="foto" value="<?= $row['foto']; ?>">
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

                                                <td>
                                                    <img src="<?= base_url('/assets/images/koleksi/') . $img ?>" alt="" style="width: 100px;">
                                                </td>

                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                        </div>

                        </form>
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
                'copy', 'csv', 'excel', 'print'
            ]
        });
    });
</script>