<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Saran dan Masukan</h3>
                        </div>
                        <div class="col-md-12 mt-3 mx-3">
                        </div>
                        <div class="card-body">
                            <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style='width:20px'>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subjek</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record as $row) {
                                        if ($row['status'] == 1) {
                                            $sts = '<span class="text-warning">Pesan Baru</span>';
                                        } elseif ($row['stusus'] == 2) {
                                            $sts = '<span class="text-info">Diteruskan</span>';
                                        }
                                        else {
                                            $sts = '<span class="text-success">Diproses</span>';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['subjek']; ?></td>
                                            <td><?= $row['pesan']; ?></td>
                                            <td><?= $sts; ?></td>
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