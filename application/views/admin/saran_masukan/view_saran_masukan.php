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
                                        <th>Tanggal</th>
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
                                            <td><?= $row['tanggal']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['subjek']; ?></td>
                                            <td><?= $row['pesan']; ?></td>
                                            <td><?= $sts; ?></td>
                                            <td>
                                                <a class='btn btn-primary btn-xs' title='Detail' href=' <?= base_url('admin/detail_saran_masukan/') . encrypt_url($row['id_saran_masukan']) ?>'><i class='fas fa-eye fa-fw'></i></a>
                                                <button class='btn btn-danger btn-xs' title='Hapus' data-id="<?= $row['id_saran_masukan'] ?>" onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
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
                    url: site_url + 'admin/delete_saran_masukan/' + data_id,
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