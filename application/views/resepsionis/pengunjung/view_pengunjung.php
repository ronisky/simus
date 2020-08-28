<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pengunjung Musuem</h3>
                            <a class='float-right btn btn-primary btn-sm' href='<?= base_url('resepsionis/tambah_pengunjung'); ?>'><i class="fas fa-plus fa-fw mr-1"></i>Tambah Pengunjung</a>
                        </div>
                        <div class="col-md-12 mt-3 mx-3">
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Nama</th>
                                        <th>ID Card</th>
                                        <th>Negara</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record as $row) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td>
                                                <?php
                                                foreach ($kt as $r) {
                                                    if ($row['kategori'] == $r['id_kategori_pengunjung']) {
                                                        echo "$r[nama_kategori]";
                                                    }
                                                } ?>
                                            </td>
                                            <td><?= $row['jumlah']; ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['id_card']; ?></td>
                                            <td>
                                                <?php
                                                foreach ($negara as $n) {
                                                    if ($row['negara'] == $n['id_negara']) {
                                                        echo "$n[nama]";
                                                    }
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($provinsi as $p) {
                                                    if ($row['provinsi'] == $p['provinsi_id']) {
                                                        echo "$p[nama_provinsi]";
                                                    }
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($kota as $k) {
                                                    if ($row['kota'] == $k['kota_id']) {
                                                        echo "$k[nama_kota]";
                                                    }
                                                } ?>
                                            </td>
                                            <td><?= $row['alamat']; ?></td>
                                            <td>
                                                <a class='btn btn-success btn-xs detailFaq' title='Detail' href="<?php echo site_url('resepsionis/detail_pengunjung/') . $row['id_pengunjung']; ?>"><i class="fas fa-eye fa-fw"></i></a>
                                                <a class='btn btn-success btn-xs' title='Ubah' href='<?php echo site_url('resepsionis/edit_pengunjung/') . $row['id_pengunjung']; ?>'><i class='fas fa-edit fa-fw'></i></a>
                                                <button class='btn btn-danger btn-xs' title='Hapus' data-id="<?= $row['id_pengunjung'] ?>" onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
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
                    url: site_url + 'resepsionis/delete_pengunjung/' + data_id,
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