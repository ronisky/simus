<?php
if ($this->uri->segment(2) == 'kategori') {
    $cek = $this->model_app->edit('tb_kategori_koleksi', array('kategori_seo' => $this->uri->segment(3)))->row_array();
    $jumlah = $this->model_app->view_where('tb_koleksi', array('id_kategori_koleksi' => $cek['id_kategori_koleksi']))->num_rows();
    if ($jumlah <= 0) { ?>
        <div class="text-center mt-3 mb-3">
            <h5>Maaf produk pada kategori ini belum tersedia.</h5>
            <a class="btn btn-primary btn-sm mt-2" href="#">Home</a>
        </div>
<?php }
} ?>

<div class="row">
    <div class="col-12">
        <div class="block">

            <div class="products-view">
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

                            $koleksi = $row['id_koleksi'];
                            if ($koleksi !== 0) { ?>
                                <div class="products-list__item">
                                    <div class="product-card">
                                        <input clas='post' id="id_koleksi" name="id_koleksi" type="hidden" value="<?= $row['id_koleksi'] ?>">

                                        <div class="product-card__image"><a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>">
                                                <img src="<?= base_url('assets/images/koleksi/') . $foto_koleksi; ?>" alt=""></a></div>
                                        <div class="product-card__info mb-3">
                                            <div class="product-card__name"><a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>"><?= $row['nama_koleksi']; ?></a></div>

                                            <div class="product__rating mt-2">
                                                <div class="product__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-card__prices">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
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