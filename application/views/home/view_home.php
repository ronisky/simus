<?php
if ($this->uri->segment(2) == 'kategori') {
    $cek = $this->model_app->edit('tb_kategori_koleksi', array('kategori_seo' => $this->uri->segment(3)))->row_array();
    $jumlah = $this->model_app->view_where('tb_koleksi', array('id_kategori_koleksi' => $cek['id_kategori_koleksi']))->num_rows();
    if ($jumlah <= 0) { ?>
        <div class="text-center mt-3 mb-3">
            <h5>Maaf koleksi pada kategori ini belum tersedia.</h5>
            <a class="btn btn-primary btn-sm mt-2" href="#">Home</a>
        </div>
<?php }
} ?>
<div class="container">
    <div class="row slider-text align-items-center justify-content-center my-5">
        <div class="col-md-10 text-center">
            <h1 class="mb-4">
                <strong class="typewrite" style="color: #1999D7; font-size: 26px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" data-period="4000" data-type='[ "Hayu ke Museum.","Museum Monumen Perjuangan Rakyat Jawa Barat","Hayu Reservasi."]'>
                    <span class="wrap"></span>
                </strong>
            </h1>
            <p style="color: #353b48; ">
                Dengan melakukan reservasi anda nantinya tinggal menunjukan kode reservasi yang sahabat dapatkan, kepada petugas resepsionis / penerima tamu.
                Reservasi juga dapat dilakukan melalui aplikasi android Museum Monumen Perjuangan Rakyat Jawa Barat, yang dapat di download di <strong><a href="https://play.google.com/store/apps/details?id=com.pesantech.simusapp"> Play Store</a></strong> <br><br>
                Sahabat, Mari ke museum. <br><br>
            </p>
            <a href="https://play.google.com/store/apps/details?id=com.pesantech.simusapp">
                <div>
                    <p><strong>Download Aplikasi dan Reservasi Sekarang</strong></p>
                    <img src="<?= base_url('assets/images/icon/googleplay.png') ?>" alt="Google Play" style="width: 200px;">
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="block">
            <h3 class="block-header__title mb-1" style="font-family: 'Quicksand', sans-serif;">Gallery Museum</h3>
            <div class="block-header__divider"></div>
            <div class="products-view mt-3">
                <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false">
                    <div class="products-list__body">
                        <?php
                        $no = 1;
                        foreach ($record->result_array() as $row) {
                            if (trim($row['foto']) == '') {
                                $foto_koleksi = 'no-image.png';
                            } else {
                                $foto_koleksi = $row['foto'];
                            }
                        ?>
                            <div class="products-list__item">
                                <div class="product-card">
                                    <input clas='post' id="id_koleksi" name="id_koleksi" type="hidden" value="<?= $row['id_koleksi'] ?>">
                                    <div class="product-card__image"><a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>">
                                            <img src="<?= base_url('assets/images/koleksi/') . $foto_koleksi; ?>" style="height: 200px; display: block; " alt=""></a></div>
                                    <div class="post-card__info mx-3">
                                        <div class="post-card__name mt-1 mb-3" style="font-size: medium; color: #353b48;"><a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>"><?= $row['nama_koleksi']; ?></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <nav class="mb-5">
            <?php echo $this->pagination->create_links(); ?>
        </nav>
    </div>
</div>