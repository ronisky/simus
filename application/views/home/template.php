<?php
$iden = $this->db->query("SELECT * FROM tb_web_identitas where id_identitas='1'")->row_array();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Bagus Maulana">
    <meta name="description" content="<?= $iden['meta_deskripsi']; ?>">
    <meta name="keywords" content="<?= $iden['meta_keyword']; ?>">
    <meta name="robots" content="all,index,follow">
    <meta http-equiv="Content-Language" content="id-ID">
    <meta NAME="Distribution" CONTENT="Global">
    <meta NAME="Rating" CONTENT="General">
    <link rel="canonical" href="<?= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:title" content="<?= $title; ?>" />
    <meta property="og:description" content="<?= $iden['meta_deskripsi']; ?>" />
    <meta property="og:url" content="<?= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:site_name" content="<?= $iden['nama_website']; ?>" />

    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon/') ?><?= $iden['favicon']; ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>css/style.scss">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>fonts/stroyka/stroyka.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>sweetalert2/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/gijgo/css/gijgo.min.css') ?>">
    <script src="<?= base_url('assets/template/tema/') ?>vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>magnific-popup.css">
    <!-- date picekr  -->
    <link rel=" stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- time picker  -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>jquery.timepicker.css">

    <!-- end picker  -->
    <script src=" <?= base_url('assets/template/js/header.js') ?>">
    </script>
    <script>
        var site_url = '<?= base_url() ?>';
    </script>

    <style>
        @media only screen and (max-width: 720px) {
            .ileft {
                text-align: right;
            }

            .iright {
                text-align: left;
            }

        }

        .foto-container {
            position: relative;

        }

        .foto-image {
            opacity: 1;
            display: block;
            width: 100%;
            height: 100%;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .foto-middle {
            transition: .5s ease;
            opacity: .3;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .foto-container:hover .foto-image {
            opacity: 0.5;
        }

        .foto-container:hover .foto-middle {
            opacity: 1;
        }

        .select2-container--default .select2-results>.select2-results__options {
            max-height: 400px;
            min-height: 400px;
            overflow-y: auto;
        }
    </style>

</head>

<body>
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>

    <!-- mobile menu -->
    <?php include '_include/mobilemenu.php'; ?>

    <!-- site -->
    <div class="site">

        <!-- navbar -->
        <?php include '_include/navbar.php'; ?>

        <div class="site__body">

            <!-- breadcrumb -->
            <?php
            if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'main') {
                echo '';
            } else { ?>
                <div class="page-header">
                    <div class="page-header__container container">
                        <div class="page-header__breadcrumb">
                            <nav aria-label="breadcrumb">
                                <small>
                                    <a href="<?= base_url() ?>">Home</a>

                                    <i class="fas fa-angle-right mx-2 text-secondary"></i>
                                    <?= $breadcrumb; ?>

                                </small>
                            </nav>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- slideshow -->
            <?php
            if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'main') {
                include '_include/slideshow.php';
            } ?>
            <!-- konten-->
            <div class="container">
                <?= $konten; ?>
            </div>

            <!-- artikel -->
            <?php
            if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'main') {
                include '_include/postingan.php';
            } ?>
        </div>



        <!-- footer -->
        <?php include '_include/footer.php'; ?>
    </div>

    <?php if ($this->uri->segment(1) == 'produk' && $this->uri->segment(2) == 'detail') { ?>
        <!-- photoswipe -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php $this->model_main->kunjungan(); ?>

    <script src="<?= base_url('assets/template/tema/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/nouislider/nouislider.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/select2/js/select2.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/number.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/main.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/header.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/svg4everybody/svg4everybody.min.js"></script>
    <script src="<?= base_url('assets/template/js/'); ?>sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/template/gijgo/js/gijgo.min.js') ?>"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/js/') ?>jquery.magnific-popup.js"></script>
    <!-- date time picker  -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- time picker  -->
    <script src="<?= base_url('assets/template/js/'); ?>jquery.timepicker.js"></script>

    <!-- end piscker -->
    <script src="<?= base_url('assets/template/js/footer.js') ?>"></script>
    <script>
        var owl = $('#MainSlider');
        owl.owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });

        // magnific popup
        $('.image-popup-zoom').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });

        $(document).ready(function() {
            $('.image-popup-detail').magnificPopup({
                type: 'image'
            });
        });
    </script>


    <script type="text/javascript">
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        // <!-- date piicker  -->
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
                minTime: '9',
                maxTime: '2:30pm',
                defaultTime: '9',
                startTime: '09:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: "dd-mm-yy",
                    changeMonth: true,
                    changeYear: true,
                    minDate: 0,
                    maxDate: "+2Y",
                    beforeShowDay: $.datepicker.noWeekends
                });
            });
        });
    </script>
</body>

</html>