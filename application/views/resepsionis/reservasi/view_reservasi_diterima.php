<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Reservasi Kunjungan Musuem (Diterima)</h3>
                        </div>
                        <div class="col-md-12 mt-3 mx-3">
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%;height:90px ">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kunjungan</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>ID Reservasi</th>
                                        <th>Status</th>
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
                                        } else {
                                            $s = "<label class='text-info'>Selesai</label>";
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <button class="dropdown-item text-success kirimReservasi" data-id="<?= $row['id_reservasi'] ?>" data-kategori="<?= $row['kategori'] ?>" data-jumlah="<?= $row['jumlah'] ?>" data-nama="<?= $row['nama'] ?>" data-idcard="<?= $row['id_card'] ?>" data-noid="<?= $row['no_id'] ?>" data-negara="<?= $row['negara'] ?>" data-provinsi="<?= $row['provinsi'] ?>" data-kota="<?= $row['kota'] ?>" data-alamat="<?= $row['alamat'] ?>" data-kodepos="<?= $row['kode_pos'] ?>" data-status="<?= $row['status'] ?>" data-toggle="modal" data-target="#kirimModal"><i class='fas fa-sign-in-alt fa-fw'></i>Masuk</button>
                                            </td>

                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['kategori']; ?></td>
                                            <td><?= $row['jumlah']; ?></td>
                                            <td><?= $row['tanggal']; ?></td>
                                            <td><?= $row['waktu']; ?></td>
                                            <td class="text-success"><strong><?= $row['id_reservasi'] ?></strong></td>
                                            <td>
                                                <?= $s ?>
                                            </td>
                                            <td>
                                                <a class='btn btn-success btn-xs detailFaq' title='Detail' href="<?php echo site_url('resepsionis/detail_reservasi/') . encrypt_url($row['id_reservasi']); ?>"><i class="fas fa-eye fa-fw"></i></a>
                                                <a class='btn btn-success btn-xs' title='Ubah' href='<?php echo site_url('resepsionis/edit_reservasi/') . encrypt_url($row['id_reservasi']); ?>'><i class='fas fa-edit fa-fw'></i></a>
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


<!-- Modal Kirim -->
<div class="modal fade" id="kirimModal" tabindex="-1" role="dialog" aria-labelledby="kirimModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="kirimModalLabel">Tambah Pengunjung Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('resepsionis/reservasi_kirim') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="id_card" name="id_card">
                    <input type="hidden" class="form-control" id="no_id" name="no_id">
                    <input type="hidden" class="form-control" id="negara" name="negara">
                    <input type="hidden" class="form-control" id="provinsi" name="provinsi">
                    <input type="hidden" class="form-control" id="kota" name="kota">
                    <input type="hidden" class="form-control" id="alamat" name="alamat">
                    <input type="hidden" class="form-control" id="kode_pos" name="kode_pos">
                    <input type="hidden" class="form-control" id="status" name="status">
                    <div class="row">
                        <div class="col-sm-6">
                            <span for="nama">Nama Pengunjung</span>
                            <input type="text" class="form-control mt-2" id="nama" name="nama" readonly>
                        </div>
                        <div class="col-sm-6">
                            <span for="kategori"> Kategori Pengunjung</span>
                            <input type="text" class="form-control mt-2" id="kategori" name="kategori" readonly>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span for="jumlah">Jumlah Pengunjung</span>
                            <input type="text" class="form-control mt-2 mb-2" id="jumlah" name="jumlah">
                        </div>
                    </div>
                    <span class="text-warning"><strong>*Pastikan data pengunjung sudah benar!</strong></span> <br><br>
                    <span>Apakah anda yakin akan menambahkan data baru pengunjung museum?</span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-success">Yakin & Kirim</button>
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

    // Terima Modal
    $(document).on("click", ".kirimReservasi", function() {
        var id = $(this).data('id');
        var kategori = $(this).data('kategori');
        var jumlah = $(this).data('jumlah');
        var nama = $(this).data('nama');
        var idCard = $(this).data('idcard');
        var noId = $(this).data('noid');
        var negara = $(this).data('negara');
        var provinsi = $(this).data('provinsi');
        var kota = $(this).data('kota');
        var alamat = $(this).data('alamat');
        var kodePos = $(this).data('kodepos');
        var status = $(this).data('status');

        $(".modal-body #id").val(id);
        $(".modal-body #kategori").val(kategori);
        $(".modal-body #jumlah").val(jumlah);
        $(".modal-body #nama").val(nama);
        $(".modal-body #id_card").val(idCard);
        $(".modal-body #no_id").val(noId);
        $(".modal-body #negara").val(negara);
        $(".modal-body #provinsi").val(provinsi);
        $(".modal-body #kota").val(kota);
        $(".modal-body #alamat").val(alamat);
        $(".modal-body #kode_pos").val(kodePos);
        $(".modal-body #status").val(status);
    });
</script>