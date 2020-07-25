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

            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profil</h3>
                    </div>
                    <?= $this->session->flashdata('message') ?>
                    <div class="row col-sm-10 mx-5 my-5">
                        <div class="col-sm-5 mr-4">
                            <div class="foto-container">
                                <img src="<?= base_url('assets/images/user/') . $foto_user ?>" class="foto-image" style="height: 300px">
                            </div>
                            <div class="mt-2">
                                <a href="<?= base_url('home/edit_profile') ?>" class="btn btn-primary btn-sm">Ubah Profile</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat User</label>
                            </div>
                            <div class="form-group row">
                                <span class="col-sm-4 ">Nama Lengkap</span>
                                <div class="col-sm-6">
                                    <span>: <?= $record['nama_lengkap'] ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-sm-4 ">Nomor Telepon</span>
                                <div class="col-sm-6">
                                    <span>: <?= $record['no_telp'] ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-sm-4 ">Email</span>
                                <div class="col-sm-6">
                                    <span>: <?= $record['email'] ?></span>
                                </div>
                            </div>
                            <?php if ($rows['alamat'] == '') { ?>
                                <div class="form-group row">
                                    <span class="col-sm-4 ">Alamat :</span>
                                    <div class="col-sm-6">
                                        <span class="text-justify text-danger">Anda belum mengubah alamat.<br> Silahkan ubah alamat Anda.</span>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="form-group row">
                                    <span class="col-sm-4 ">Alamat </span>
                                    <div class="col-sm-6">
                                        <span>: <?= $rows['alamat'] ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-4 ">Kec.</span>
                                    <div class="col-sm-6">
                                        <span>: <?= $rows['kecamatan'] ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span for="" class="col-sm-4 ">Kota</span>
                                    <div class="col-sm-6 mb-3">
                                        <span>: <?= $rows['nama_kota'] ?>, <?= $rows['kode_pos'] ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="profile-card__edit">
                                <a href="<?= base_url('home/edit_alamat') ?>" class="btn btn-primary btn-sm">Ubah Alamat</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</section>
</div>