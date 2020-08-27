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
                                        <th>Kode Res.</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
                                        <th>Kebangsaan</th>
                                        <th>Provinsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record as $row) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['kd_reservasi'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['waktu'] ?></td>
                                            <td><?= $row['kategori']; ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['no_telp']; ?></td>
                                            <td><?= $row['kebangsaan'] ?></td>
                                            <td><?= $row['provinsi']; ?></td>
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
    $(document).on("click", ".detailFaq", function() {
        let Id = $(this).data('id');
        let nama = $(this).data('nama');
        let email = $(this).data('email');
        let pertanyaan = $(this).data('pertanyaan');
        let jawaban = $(this).data('jawaban');
        $("#id").val(Id);
        $("#nm").val(nama);
        $("#em").val(email);
        $("#tanya").val(pertanyaan);
        $("#jawab").val(jawaban);
    });

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