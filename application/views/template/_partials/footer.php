<footer class="main-footer">
    <strong>&copy; <?= date('Y') ?> <a href="https://ronisky.com" target="_BLANK">Museum Monumen Perjuangan Rakyat Jawa Barat</a></strong>
    <div class="float-right d-none d-sm-inline-block">

    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= base_url('assets/template/gijgo/js/gijgo.min.js') ?>"></script>
<script src="<?= base_url('assets/template/js/') ?>sweetalert2.min.js"></script>
<script src="<?= base_url('assets/template/js/') ?>jquery.magnific-popup.js"></script>

<!-- date time picker  -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- time picker  -->
<script src="<?= base_url('assets/template/js/'); ?>jquery.timepicker.js"></script>

<!-- end piscker -->

<!-- Calendar  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/template/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script> -->

<script>
    function logout() {
        let timerInterval;
        Swal.fire({
            title: 'Konfirmasi Keluar',
            text: "Apakah Anda ingin keluar dari Akun ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                        title: 'Berhasil!',
                        text: 'Logout berhasil',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    .then(() => {
                        window.location.href = site_url + '/auth/logout'
                    })
            }
        })
    }
</script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>



<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('.datetimePicker').datetimepicker();
</script>


<script>
    $(document).ready(function() {
        $('#table1').dataTable({
            "bInfo": false,
            "lengthChange": false,
            "paging": true,
            "searching": true,
            "scrollX": true,
            "ordering": false,
        });
        $('#table2').dataTable({
            "bInfo": false,
            "lengthChange": false,
            "paging": true,
            "searching": false,
            "scrollX": true,
            "autoWidth": false,
            "ordering": false,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    $(document).ready(function() {

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>


<script>
    /** add active class and stay opened when selected */
    var url = window.location;
    // for sidebar menu entirely but not cover treeview 
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');
    // for treeview 
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 500
    });
</script>
<script>
    $('.image-popup').magnificPopup({
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
    $(document).ready(function() {
        $('.timepickeradmin').timepicker({
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
            $("#datepickeradmin").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                minDate: 3,
                maxDate: "+2Y",
                beforeShowDay: $.datepicker.noWeekends
            });
        });
    });
</script>

<!-- Calendar  -->
<script type="text/javascript">
    var get_data = '<?php echo $get_data; ?>';
    var backend_url = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            eventClick: function(event, element) {
                deteil(event);
            },
            events: JSON.parse(get_data)
        });
    });

    function deteil(event) {
        $('#create_modal input[name=id_reservasi]').val(event.id);
        $('#create_modal input[name=start_time]').val(event.start);
        $('#create_modal input[name=end_time]').val(event.end);
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal textarea[name=alamat]').val(event.alamat);
        $('#create_modal input[name=jumlah]').val(event.jumlah);
        $('#create_modal input[name=kategori]').val(event.kategori);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
    }
</script>

<!-- Statistik -->
<?php $this->model_main->kunjungan(); ?>
</body>

</html>