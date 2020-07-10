<?php
if (trim($record['foto']) == '') {
    $foto_user = 'default.jpg';
} else {
    $foto_user = $record['foto'];
}
?>
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Profil</h3>
                        </div>
                        <?= $this->session->flashdata('message') ?>
                        <div class="card-body profile-card__body">
                            <div class="profile-card__avatar">
                                <div class="foto-container">
                                    <img src="<?= base_url('assets/images/user/') . $foto_user ?>" class="foto-image" style="height: 300px">
                                    <div class="foto-middle">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-card__edit mt-2">
                                <a href="<?= base_url('penata/edit_profile') ?>" class="btn btn-secondary btn-sm">Ubah Profile</a>
                            </div>
                        </div>
                        <div class=" card address-card address-card--featured">
                            <div class="card-body profile-card__body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat User</label>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-2 ">Nama Lengkap</span>
                                    <span>: <?= $record['nama_lengkap'] ?></span>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-2 ">Nomor Telepon</span>
                                    <span>: <?= $record['no_telp'] ?></span>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-2 ">Email</span>
                                    <span>: <?= $record['email'] ?></span>
                                </div>
                                <?php if ($rows['alamat'] == '') { ?>
                                    <div class="form-group row">
                                        <span class="col-sm-2 ">Alamat</span>
                                        <span class="text-justify text-danger">Anda belum mengubah alamat.<br> Silahkan ubah alamat Anda.</span>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group row">
                                        <span class="col-sm-2 ">Alamat</span>
                                        <span>: <?= $rows['alamat'] ?></span>
                                    </div>
                                    <div class="form-group row">
                                        <span class="col-sm-2 ">Kec.</span>
                                        <span>: <?= $rows['kecamatan'] ?></span>
                                    </div>
                                    <div class="form-group row">
                                        <span class="col-sm-2 ">Kota</span>
                                        <span>: <?= $rows['nama_kota'] ?>, <?= $rows['kode_pos'] ?></span>
                                    </div>
                                <?php } ?>
                                <div class="profile-card__edit mt-2">
                                    <a href="<?= base_url('penata/edit_alamat') ?>" class="btn btn-primary btn-sm">Ubah Alamat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>