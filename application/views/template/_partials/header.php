<?php $iden = $this->db->query("SELECT * FROM tb_web_identitas where id_identitas='1'")->row_array(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/gijgo/css/gijgo.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <script src="<?= base_url('assets/template/adminlte3/') ?>plugins/jquery/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon/') ?><?= $iden['favicon']; ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>magnific-popup.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/select2/css/select2.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <!-- Select2 -->
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/select2/js/select2.full.js"></script>
    <!-- date picekr  -->
    <link rel=" stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- time picker  -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/css/') ?>jquery.timepicker.css">
    <!-- end picker  -->

    <!-- Calendar  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" />

    <script>
        var site_url = "<?= base_url() ?>";
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">