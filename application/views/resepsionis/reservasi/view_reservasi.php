<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Reservasi Kunjungan Musuem</h3>
                        </div>
                        <div class="col-md-12 mt-3 mx-3">
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Jumlah</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;

                                    foreach ($record as $row) {

                                        $status = $row['status'];
                                        if ($status == 1) {
                                            $s = "<label class='text-warning'>Pengajuan</label>";
                                        } else if ($status == 2) {
                                            $s = "<label class='text-success'>Diterima</label>";
                                        } else if ($status == 3) {
                                            $s = "<label class='text-danger'>Ditolak</label>";
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $s ?></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item sm" href="#">Terima</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item sm" href="#">Tolak</a>
                                                    </div>
                                            </td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['no_telp']; ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['waktu'] ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td class="image-popup-detail" href="<?= base_url('assets/images/reservasi/') . $row['foto']; ?>">
                                                <img src="<?= base_url('assets/images/reservasi/') . $row['foto']; ?>" height="60">
                                            </td>
                                            <td>
                                                <a class='btn btn-success btn-xs detailFaq' title='Detail' href="<?php echo site_url('resepsionis/detail_reservasi/') . $row['id_reservasi']; ?>"><i class="fas fa-eye fa-fw"></i></a>
                                                <a class='btn btn-success btn-xs' title='Ubah' href='<?php echo site_url('resepsionis/edit_reservasi/') . $row['id_reservasi']; ?>'><i class='fas fa-edit fa-fw'></i></a>
                                                <button class='btn btn-danger btn-xs' title='Hapus' data-id="<?= $row['id_reservasi'] ?>" onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
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

<script>
    function confirmation(ev) {
        ev.preventDefault();
        var data_id = ev.currentTarget.getAttribute('data-id');
        var currentLocation = window.location;
        Swal.fire({
            title: 'Konfirmasi Hapus Data',
            text: "Apakah Anda ingin menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: site_url + 'resepsionis/delete_reservasi/' + data_id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        Swal.fire({
                            title: 'Dihapus!',
                            text: 'Data berhasil dihapus',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload()
                        })
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.debug(jqXHR);
                        console.debug(textStatus);
                        console.debug(errorThrown);
                    },
                });
            }
        })
    }
</script>