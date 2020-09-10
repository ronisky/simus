<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php if ($this->session->level == 1) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">
                        <div class="notif_jumlah_saran"></div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                        <div class="notif_jumlah_saran"></div> Notifications
                    </span>
                    <div class="notif_content_saran"></div>
                </div>
            </li>
        <?php } elseif ($this->session->level == 2) { ?>

        <?php } elseif ($this->session->level == 3) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">
                        <div class="notif_jumlah"></div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                        <div class="notif_jumlah"></div> Notifications
                    </span>
                    <div class="notif_content"></div>
                </div>
            </li>
        <?php } else { ?>
        <?php }
        ?>





        <!-- to home  -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>" target="_blank">
                <i class="fas fa-external-link-alt fa-fw"></i>
            </a>
        </li>

    </ul>
</nav>