<?php
if (trim($row['foto']) == '') {
    $foto_koleksi = 'no-image.png';
} else {
    $foto_koleksi = $row['foto'];
}
$koleksi = $row['nama_koleksi'];

$iduk = $row['id_ukuran'];
$idkateg = $row['id_kategori_koleksi'];
$uk = $this->model_app->view_ordering('tb_ukuran_koleksi', 'id_ukuran', 'DESC');
$kategori = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');

foreach ($uk as $u) {
    if ($row['id_ukuran'] == $u['id_ukuran']) {
        $ting = $u['tinggi'];
        $pan = $u['panjang'];
        $leb = $u['lebar'];
        $diam = $u['diameter'];
        $ber = $u['berat'];
    }
}

?>

<div class="product product--layout--standard" data-layout="standard">
    <div class="product__content">

        <div class="product__gallery">
            <div class="product-gallery">
                <div class="product-gallery__featured"><button class="product-gallery__zoom"><svg width="24px" height="24px">
                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#zoom-in-24"></use>
                        </svg></button>
                    <div class="owl-carousel" id="product-image-det"><a href="<?= base_url() . "assets/images/koleksi/" . $foto_koleksi ?>" target="_blank"><img src="<?= base_url() . "assets/images/koleksi/" . $foto_koleksi ?>" alt="" class="w-75 mx-auto" style="max-height: 400px;"> </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="product__info">
            <h1 class="product__name"><?= $row['nama_koleksi'] ?></h1>
            <div>
                <span>
                    Kategori :
                </span>
                <?php
                foreach ($kategori as $s) {
                    if ($row['id_kategori_koleksi'] == $s['id_kategori_koleksi']) {
                        echo "<h6 class='my-3'>$s[nama_kategori]</h6>";
                    }
                } ?>
            </div>

            <div class="mt-3">
                <span class="my-3">
                    Ukuran :
                </span>
                <h6 class="my-3">Tinggi : <?= $ting ?></h6>
                <h6 class="my-3">Panjang : <?= $pan; ?></h6>
                <h6 class="my-3">Lebar : <?= $leb; ?></h6>
                <h6 class="my-3">Diameter : <?= $diam; ?></h6>
                <h6 class="my-3">Berat : <?= $ber; ?></h6>
            </div>
        </div>

    </div>
    <div class="reviews-view my-5">
        <div class="reviews-view__list">
            <div class="reviews-list">
                <ol class="reviews-list__content">

                    <p class="text-baca"><?= $row['deskripsi']; ?></p>
                </ol>

            </div>
        </div>

        <?php
        if (!empty($this->session->id_pengguna)) { ?>



            <?php
            $idpeng = $this->session->id_pengguna;
            $queryx = $this->db->query("SELECT * FROM tb_toko_penjualan a JOIN tb_toko_penjualandetail b ON a.id_penjualan=b.id_penjualan WHERE b.id_produk='$idpro' AND a.id_pembeli='$idpeng' AND a.proses='3'");
            if ($queryx->num_rows() >= 1) {

                $id = $this->session->id_pengguna;
                $this->db->where("id_pengguna='$id'");
                $peng = $this->db->get('tb_pengguna')->row_array();
                if (empty($peng['nama_lengkap'])) {
                    $nama = $peng['username'];
                } else {
                    $nama = $peng['nama_lengkap'];
                }

                if (empty($peng['foto'])) {
                    $foto = 'default.jpg';
                } else {
                    $foto = $peng['foto'];
                }
            ?>

                <form class="reviews-view__form" action="<?= base_url('produk/review/') ?>" method="POST">
                    <h3 class="reviews-view__header">Tulis Ulasan</h3>
                    <div class="row">
                        <div class="col-12 col-lg-9 col-xl-8">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="review-stars">Bintang</label>
                                    <select name='bintang' id="review-stars" class="form-control">
                                        <option value="5">5 Bintang</option>
                                        <option value="4">4 Bintang</option>
                                        <option value="3">3 Bintang</option>
                                        <option value="2">2 Bintang</option>
                                        <option value="1">1 Bintang</option>
                                    </select></div>
                                <div class="form-group col-md-4">
                                    <label for="review-author">Username</label>
                                    <input type="hidden" name="pembeli" value="<?= encrypt_url($id) ?>">
                                    <input type="hidden" name="produk" value="<?= encrypt_url($row['id_produk']) ?>">
                                    <input type="hidden" name="seo" value="<?= $row['produk_seo'] ?>">
                                    <input type="text" class="form-control" id="review-author" value="<?= $peng['username'] ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="review-email">Email</label>
                                    <input type="text" class="form-control" id="review-email" value="<?= $peng['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="review-text">Ulasan Anda</label>
                                <textarea name="ulasan" class="form-control" id="review-text" rows="6"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Tulis Ulasan</button>
                            </div>
                        </div>
                    </div>
                </form>
        <?php }
        } ?>

    </div>

</div>

<?php $temp_sales = $this->db->get_where('tb_toko_penjualantemp', array('session' => $this->session->idp, 'id_produk' => $idpro))->row_array();
if (!empty($temp_sales)) {
    $number_cart = $temp_sales['jumlah'];
} else {
    $number_cart = 0;
} ?>

<input type="hidden" id="number-cart" value="<?= $number_cart; ?>">
<script src="<?= base_url('assets/template/js/product.js') ?>"></script>