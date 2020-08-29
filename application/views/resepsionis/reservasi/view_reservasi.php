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
                                            <td width="12%">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary small dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $s ?></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item text-success terimaReservasi" data-id="<?= $row['id_reservasi'] ?>" data-tanggal="<?= $row['tanggal'] ?>" data-waktu="<?= $row['waktu'] ?>" data-kategori="<?= $row['kategori'] ?>" data-jumlah="<?= $row['jumlah'] ?>" data-nama="<?= $row['nama'] ?>" data-id="<?= $row['id_card'] ?>" data-card="<?= $row['no_id'] ?>" data-negara="<?= $row['negara'] ?>" data-provinsi="<?= $row['provinsi'] ?>" data-kota="<?= $row['kota'] ?>" data-alamat="<?= $row['alamat'] ?>" data-pos="<?= $row['kode_pos'] ?>" data-email="<?= $row['email'] ?>" data-hp="<?= $row['no_telp'] ?>" data-foto="<?= $row['foto'] ?>" data-status="<?= $row['status'] ?>" data-keterangan="<?= $row['keterangan'] ?>" data-toggle="modal" data-target="#terimaModal">Terima</button>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <button class="dropdown-item text-danger tolakReservasi" data-id="<?= $row['id_reservasi'] ?>" data-tanggal="<?= $row['tanggal'] ?>" data-waktu="<?= $row['waktu'] ?>" data-nama="<?= $row['nama'] ?>" data-email="<?= $row['email'] ?>" data-hp="<?= $row['no_telp'] ?>" data-status="<?= $row['status'] ?>" data-toggle="modal" data-target="#tolakModal">Tolak</button>
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

<!-- Modal Tolak -->
<div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="tolakModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakModalLabel">Konfirmasi Penolakan</h5>
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
                    <input type="hidden" class="form-control" id="status" name="status">
                    <textarea type="text" rows="3" name="keterangan" class="form-control" placeholder="Alasan Penolakan?" required></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-danger">Kirim Penolakan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Terima -->
<div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="terimaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="terimaModalLabel">Konfirmasi Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('resepsionis/terima_reservasi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="tanggal" name="tanggal">
                    <input type="hidden" class="form-control" id="waktu" name="waktu">
                    <input type="hidden" class="form-control" id="kategori" name="kategori">
                    <input type="hidden" class="form-control" id="jumlah" name="jumlah">
                    <input type="hidden" class="form-control" id="nama" name="nama">
                    <input type="hidden" class="form-control" id="id_card" name="id_card">
                    <input type="hidden" class="form-control" id="no_id" name="no_id">
                    <input type="hidden" class="form-control" id="negara" name="negara">
                    <input type="hidden" class="form-control" id="provinsi" name="provinsi">
                    <input type="hidden" class="form-control" id="kota" name="kota">
                    <input type="hidden" class="form-control" id="alamat" name="alamat">
                    <input type="hidden" class="form-control" id="kode_pos" name="kode_pos">
                    <input type="hidden" class="form-control" id="email" name="email">
                    <input type="hidden" class="form-control" id="no_telp" name="no_telp">
                    <input type="hidden" class="form-control" id="foto" name="foto">
                    <input type="hidden" class="form-control" id="status" name="status">
                    <input type="hidden" class="form-control" id="keterangan" name="keterangan">
                    <span for="">Apakah anda yakin untuk <strong>Menerima Pengajuan Reservasi ?</strong></span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-success">Terima Pengajuan</button>
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
        var status = $(this).data('status');

        $(".modal-body #id").val(id);
        $(".modal-body #tanggal").val(tgl);
        $(".modal-body #waktu").val(jam);
        $(".modal-body #nama").val(nama);
        $(".modal-body #email").val(email);
        $(".modal-body #no_telp").val(no);
        $(".modal-body #status").val(status);
    });
    // Terima Modal
    $(document).on("click", ".terimaReservasi", function() {
        var id = $(this).data('id');
        var tgl = $(this).data('tanggal');
        var jam = $(this).data('waktu');
        var kategori = $(this).data('kategori');
        var jumlah = $(this).data('jumlah');
        var nama = $(this).data('nama');
        var idCard = $(this).data('card');
        var noId = $(this).data('id');
        var negara = $(this).data('negara');
        var provinsi = $(this).data('provinsi');
        var kota = $(this).data('kota');
        var alamat = $(this).data('alamat');
        var kodePos = $(this).data('pos');
        var email = $(this).data('email');
        var no = $(this).data('hp');
        var foto = $(this).data('foto');
        var status = $(this).data('status');
        var keterangan = $(this).data('keterangan');

        $(".modal-body #id").val(id);
        $(".modal-body #tanggal").val(tgl);
        $(".modal-body #waktu").val(jam);
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
        $(".modal-body #email").val(email);
        $(".modal-body #no_telp").val(no);
        $(".modal-body #foto").val(foto);
        $(".modal-body #status").val(status);
        $(".modal-body #keterangan").val(keterangan);
    });
</script>