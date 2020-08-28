<!-- <div class="container">
    <div class="shop-layout shop-layout--sidebar--start">
        <div class="shop-layout__sidebar">
            <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                <div class="block-sidebar__backdrop"></div>
                <div class="block-sidebar__body">
                    <div class="block-sidebar__header">
                        <div class="block-sidebar__title">Kategori</div>
                        <button class="block-sidebar__close" type="button">
                            <svg width="20px" height="20px">
                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#cross-20"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="block-sidebar__item">
                        <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                            <h4 class="widget-filters__title widget__title">Kategori</h4>
                            <div class="widget-filters__list">

                                <ul class="filter-categories__list">
                                    <?php $query = $this->db->get('tb_kategori_koleksi');
                                    foreach ($query->result_array() as $kat) {
                                    ?>
                                        <li class="filter-categories__item filter-categories__item--child">
                                            <a href="<?= base_url('koleksi/kategori/') . $kat['kategori_seo'] ?>"><?= $kat['nama_kategori'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-sidebar__item d-none d-lg-block">
                        <div class="widget-products widget">
                            <h4 class="widget__title">Koleksi Terbaru</h4>
                            <div class="widget-products__list">
                                <?php
                                $this->db->order_by('id_koleksi', 'DESC');
                                $this->db->limit('5');
                                $query2 = $this->db->get('tb_koleksi');
                                foreach ($query2->result_array() as $rowz) {
                                    if (trim($rowz['foto']) == '') {
                                        $foto_koleksi = 'no-image.png';
                                    } else {
                                        $foto_koleksi = $rowz['foto'];
                                    }
                                }
                                ?>
                                <div class="widget-products__item">
                                    <input clas='post' id="id_koleksi" name="id_koleksi" type="hidden" value="<?= $rowz['id_koleksi'] ?>">
                                    <div class="widget-products__image"><a href="<a href=" <?= base_url('koleksi/detail/') . $rowz['koleksi_seo']; ?>"><img src="<?= base_url('assets/images/koleksi/') . $foto_koleksi; ?>" alt=""></a></div>
                                    <div class="widget-products__info">
                                        <div class="widget-products__name">
                                            <a href="<?= base_url('koleksi/detail/') . $rowz['koleksi_seo']; ?>">
                                                <?= $rowz['nama_koleksi']; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-layout__content">
            <div class="block">
                <div class="products-view">
                    <div class="products-view__options">
                        <div class="view-options view-options--offcanvas--mobile">
                            <div class="view-options__filters-button"><button type="button" class="filters-button"><svg class="filters-button__icon" width="16px" height="16px">
                                        <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#filters-16"></use>
                                    </svg> <span class="filters-button__title">Kategori</span></button></div>
                            <div class="view-options__layout">
                                <div class="layout-switcher">
                                    <div class="layout-switcher__list">
                                        <button data-layout="grid-4-full" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-grid-16x16"></use>
                                            </svg></button> <button data-layout="grid-4-full" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-grid-with-details-16x16">
                                                </use>
                                            </svg></button> <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-list-16x16"></use>
                                            </svg></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($this->uri->segment(2) == 'kategori') {
                        $cek = $this->model_app->edit('tb_kategori_koleksi', array('kategori_seo' => $this->uri->segment(3)))->row_array();
                        $jumlah = $this->model_app->view_where('tb_koleksi', array('id_kategori_koleksi' => $cek['id_kategori_koleksi']))->num_rows();
                        if ($jumlah <= 0) { ?>
                            <div class="text-center mt-3 mb-3">
                                <h5>Maaf koleksi pada kategori ini belum tersedia.</h5>
                            </div>
                    <?php }
                    } ?>

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
                            } ?>

                            <div class="products-list__item">
                                <div class="product-card">

                                    <div class="product-card__image">
                                        <a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>">
                                            <img src="<?= base_url('assets/images/koleksi/') . $foto_koleksi; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>">
                                                <?= $row['nama_koleksi']; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="products-view__pagination">
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="mb-5">
                                    <?php echo $this->pagination->create_links(); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="shop-layout shop-layout--sidebar--start">
        <div class="shop-layout__sidebar">
            <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                <div class="block-sidebar__backdrop"></div>
                <div class="block-sidebar__body">
                    <div class="block-sidebar__header">
                        <div class="block-sidebar__title">Kategori</div>
                        <button class="block-sidebar__close" type="button">
                            <svg width="20px" height="20px">
                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#cross-20"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="block-sidebar__item">
                        <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                            <h4 class="widget-filters__title widget__title">Kategori</h4>
                            <div class="widget-filters__list">

                                <ul class="filter-categories__list">
                                    <?php $query = $this->db->get('tb_kategori_koleksi');
                                    foreach ($query->result_array() as $kat) {
                                    ?>
                                        <li class="filter-categories__item filter-categories__item--child">
                                            <a href="<?= base_url('koleksi/kategori/') . $kat['kategori_seo'] ?>"><?= $kat['nama_kategori'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-sidebar__item d-none d-lg-block">
                        <div class="widget-products widget">
                            <h4 class="widget__title">Koleksi Terbaru</h4>
                            <div class="widget-products__list">
                                <?php
                                $this->db->order_by('id_koleksi', 'DESC');
                                $this->db->limit('5');
                                $query2 = $this->db->get('tb_koleksi');
                                foreach ($query2->result_array() as $rowz) {
                                    if (trim($rowz['foto']) == '') {
                                        $foto_koleksi1 = 'no-image.png';
                                    } else {
                                        $foto_koleksi1 = $rowz['foto'];
                                    }
                                    $stok1 = $rowz['stok'];
                                    if ($stok1 !== 0) {
                                ?>
                                        <div class="widget-products__item">
                                            <input clas='post' id="id_koleksi" name="id_koleksi" type="hidden" value="<?= $rowz['id_koleksi'] ?>">
                                            <div class="widget-products__image"><a href="<?= base_url('koleksi/detail/') . $rowz['koleksi_seo']; ?>"><img src="<?= base_url('assets/images/koleksi/') . $foto_koleksi1; ?>" alt=""></a></div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="<?= base_url('koleksi/detail/') . $rowz['koleksi_seo']; ?>">
                                                        <?= $rowz['nama_koleksi']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-layout__content">
            <div class="block">
                <div class="products-view">

                    <div class="products-view__options">
                        <div class="view-options view-options--offcanvas--mobile">
                            <div class="view-options__filters-button"><button type="button" class="filters-button"><svg class="filters-button__icon" width="16px" height="16px">
                                        <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#filters-16"></use>
                                    </svg> <span class="filters-button__title">Kategori</span></button></div>
                            <div class="view-options__layout">
                                <div class="layout-switcher">
                                    <div class="layout-switcher__list"><button data-layout="grid-4-full" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-grid-16x16"></use>
                                            </svg></button> <button data-layout="grid-4-full" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-grid-with-details-16x16">
                                                </use>
                                            </svg></button> <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-list-16x16"></use>
                                            </svg></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($this->uri->segment(2) == 'kategori') {
                        $cek = $this->model_app->edit('tb_kategori_koleksi', array('kategori_seo' => $this->uri->segment(3)))->row_array();
                        $jumlah = $this->model_app->view_where('tb_koleksi', array('id_kategori_koleksi' => $cek['id_kategori_koleksi']))->num_rows();
                        if ($jumlah <= 0) { ?>
                            <div class="text-center mt-3 mb-3">
                                <h5>Maaf koleksi pada kategori ini belum tersedia.</h5>
                            </div>
                    <?php }
                    } ?>

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

                                $deskripsi = strip_tags($row['deskripsi']);
                                $des = substr($deskripsi, 0, 60);
                                $des = substr($deskripsi, 0, strrpos($des, " "));


                            ?>


                                <div class="products-list__item">
                                    <div class="product-card">

                                        <div class="product-card__image">
                                            <a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>">
                                                <img src="<?= base_url('assets/images/koleksi/') . $foto_koleksi; ?>" alt="" style="max-height: 160px;">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="<?= base_url('koleksi/detail/') . $row['koleksi_seo']; ?>">
                                                    <?= $row['nama_koleksi']; ?>
                                                </a>
                                            </div>

                                            <ul class="product-card__features-list">
                                                <li>Asal koleksi : <?= $row['asal_koleksi']; ?></li>
                                                <li>Cara Perolehan: <?= $row['cara_perolehan']; ?></li>

                                            </ul>
                                        </div>

                                        <div class="product-card__actions">
                                            <div class="product-card__prices">
                                                <p><?= $des ?>...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="products-view__pagination">
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="mb-5">
                                    <?php echo $this->pagination->create_links(); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>