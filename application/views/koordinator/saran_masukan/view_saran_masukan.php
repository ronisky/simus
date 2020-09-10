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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record as $row) {
                                        if ($row['status'] == 1) {
                                            $sts = '<span class="text-warning">Pesan Baru</span>';
                                        } else {
                                            $sts = '<span class="text-info">Sudah dibaca</span>';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['subjek']; ?></td>
                                            <td><?= $row['pesan']; ?></td>
                                            <td><?= $sts; ?></td>
                                            <td>
                                                <a class='btn btn-primary btn-xs' title='Detail' href=' <?= base_url('koordinator/detail_saran_masukan/') . encrypt_url($row['id_saran_masukan']) ?>'><i class='fas fa-eye fa-fw'></i></a>
                                            </td>
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