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
    </div>
</div>