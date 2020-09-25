<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Reservasi Pengajuan Kunjungan Museum</h3>
                        </div>
                        <div class="col-md-12 mt-3 mx-3">
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%; height:90px">

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
                                    // foreach ($identitas as $iden) {
                                    //     $iden['no_telp'];
                                    // };
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
                                        <tr class="">
                                            <td><?= $no; ?></td>
                                            <td width="12%">
                                                <div class="input-group-prepend chkView" id="myBtn">
                                                    <button class="btn btn-outline-secondary small dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $s ?></button>
                                                    <div class="dropdown-menu">
                                                        <a class='dropdown-item text-success' title='Terima' href='<?php echo site_url('resepsionis/terima_reservasi/') . encrypt_url($row['id_reservasi']); ?>'><i class='fas fa-check fa-fw mr-2'></i>Terima</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <button class="dropdown-item text-danger tolakReservasi" data-id="<?= $row['id_reservasi'] ?>" data-tanggal="<?= $row['tanggal'] ?>" data-waktu="<?= $row['waktu'] ?>" data-nama="<?= $row['nama'] ?>" data-email="<?= $row['email'] ?>" data-hp="<?= $row['no_telp'] ?>" data-kontak="<?= $identitas['no_telp'] ?>" data-status="<?= $row['status'] ?>" data-toggle="modal" data-target="#tolakModal"><i class='fas fa-times fa-fw mr-2'></i>Tolak</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['no_telp']; ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['waktu'] ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td class="image-popup-detail" href="<?= base_url('assets/images/reservasi/') . $row['foto']; ?>">
                                                <img src="<?= base_url('assets/images/reservasi/') . $row['foto']; ?>" height="50px" width="60px">
                                            </td>
                                            <td>
                                                <a class='btn btn-success btn-xs detailFaq' title='Detail' href="<?php echo site_url('resepsionis/detail_reservasi/') . encrypt_url($row['id_reservasi']); ?>"><i class="fas fa-eye fa-fw"></i></a>
                                                <!-- <a class='btn btn-success btn-xs' title='Ubah' href='<?php echo site_url('resepsionis/edit_reservasi/') . $row['id_reservasi']; ?>'><i class='fas fa-edit fa-fw'></i></a> -->
                                                <button class='btn btn-danger btn-xs' title='Hapus' data-id="<?= $row['id_reservasi'] ?>" onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                        break;
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

<!-- Modal Tolak -->
<div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="tolakModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-sm-12">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakModalLabel">Alasan Penolakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('resepsionis/tolak_reservasi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="tanggal" name="tanggal">
                    <input type="hidden" class="form-control" id="waktu" name="waktu">
                    <input type="hidden" class="form-control" id="nama" name="nama">
                    <input type="hidden" class="form-control" id="email" name="email">
                    <input type="hidden" class="form-control" id="no_telp" name="no_telp">
                    <input type="hidden" class="form-control" id="kontak" name="kontak">
                    <input type="hidden" class="form-control" id="status" name="status">

                    <input type='radio' name='keterangan' value='Data pengajuan reservasi tidak lengkap'> Data pengajuan reservasi tidak lengkap &nbsp; <br><br>
                    <input type='radio' name='keterangan' value='Foto Surat Tidak Sesuai'> Foto Surat Tidak Sesuai &nbsp; <br><br>
                    <input type='radio' name='keterangan' value='Tanggal Kunjungan Penuh, hubungi petugas untuk perubahan tanggal kunjungan'> Tanggal Kunjungan Penuh, hubungi petugas untuk perubahan tanggal kunjungan&nbsp; <br><br>
                    <input type='radio' name='keterangan' value='Jam Kunjungan Penuh, hubungi petugas untuk perubahan jam kunjungan'> Jam Kunjungan Penuh, hubungi petugas untuk perubahan jam kunjungan <br><br>
                    <div data-toggle="collapse" data-target="#collapseExample">Alasan Lain? <i class="fas fa-chevron-down ml-2"></i></div>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <textarea type="text" rows="3" name="keterangan" class="form-control" placeholder="Alasan Penolakan"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-danger">Kirim Penolakan</button>
                </div>
            </form>
        </div>
    </div>
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
    // Tolak Modal 
    $(document).on("click", ".tolakReservasi", function() {
        var id = $(this).data('id');
        var tgl = $(this).data('tanggal');
        var jam = $(this).data('waktu');
        var nama = $(this).data('nama');
        var email = $(this).data('email');
        var no = $(this).data('hp');
        var kontak = $(this).data('kontak');
        var status = $(this).data('status');

        $(".modal-body #id").val(id);
        $(".modal-body #tanggal").val(tgl);
        $(".modal-body #waktu").val(jam);
        $(".modal-body #nama").val(nama);
        $(".modal-body #email").val(email);
        $(".modal-body #no_telp").val(no);
        $(".modal-body #kontak").val(kontak);
        $(".modal-body #status").val(status);
    });

    function myFunction() {
        document.getElementById("myBtn").disabled = true;
    }
</script>