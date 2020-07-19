<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori Pengunjung</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('resepsionis/tambah_kategori_pengunjung'); ?>'>Tambah Kategori</a>
            </div>

            <?= $this->session->flashdata('message') ?>
            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Kategori Pengunjung</th>
                    <th style="width:10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    echo "<tr><td>$no</td>
                              <td>$row[nama_kategori]</td>
                              <td>
                                <a class='btn btn-success btn-xs' title='Ubah' href='" . base_url() . "resepsionis/edit_kategori_pengunjung/$row[id_kategori_pengunjung]'><i class='fas fa-edit fa-fw'></i></a>
                                <button class='btn btn-danger btn-xs' title='Hapus' data-id='$row[id_kategori_pengunjung]' onclick=\"confirmation(event)\"><i class='fas fa-times fa-fw'></i></button>
                              </td>
                          </tr>";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  function confirmation(ev) {
    ev.preventDefault();
    var data_id = ev.currentTarget.getAttribute('data-id');
    var currentLocation = window.location;
    Swal.fire({
      title: 'Konfirmasi Hapus Data',
      text: "Apakah Anda ingin menghapus data ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: site_url + 'resepsionis/delete_kategori_pengunjung/' + data_id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              title: 'Dihapus!',
              text: 'Data berhasil dihapus',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload();
            })
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
              title: 'Gagal!',
              text: 'Terdapat pengunjung yang menggunakan kategori ini',
              icon: 'error',
              showConfirmButton: false,
              timer: 2000
            })
          },
        });
      }
    })
  }
</script>