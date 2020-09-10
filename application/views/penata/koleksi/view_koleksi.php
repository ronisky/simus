<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semua Koleksi</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('penata/tambah_koleksi'); ?>'>Tambah Koleksi</a>
            </div>
            <?= $this->session->flashdata('message') ?>
            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Koleksi</th>
                    <th>Asal Koleksi</th>
                    <th>Pemilik Asal</th>
                    <th>Cara Perolehan</th>
                    <th>Sumber Pusaka</th>
                    <th>Gambar</th>
                    <th>No Regis</th>
                    <th>Pencatatan</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    echo "
                    <tr>
                      <td>$no</td>
                      <td>$row[nama_koleksi]</td>
                      <td>$row[asal_koleksi]</td>
                      <td>$row[pemilik_asal]</td>
                      <td>$row[cara_perolehan]</td>
                      <td>$row[sumber_pusaka]</td>
                      <td class='image-popup-detail' href='" . base_url('assets/images/koleksi/') . $row['foto'] . "'>
                      <img src='" . base_url('assets/images/koleksi/') . $row['foto'] . "' alt='Gambar' style='height: 60px'>
                      </td>
                      <td>$row[no_registrasi]</td>
                      <td>$row[tanggal_pencatatan]</td>
                      <td>
                        <a class='btn btn-primary btn-xs' title='Detail' href='" . base_url() . "penata/detail_koleksi/" . encrypt_url($row['id_koleksi']) . "'><i class='fas fa-eye fa-fw'></i></a>
                        <a class='btn btn-success btn-xs' title='Ubah' href='" . base_url() . "penata/edit_koleksi/" . encrypt_url($row['id_koleksi']) . "'><i class='fas fa-edit fa-fw'></i></a>
                        <button class='btn btn-danger btn-xs' title='Hapus' data-id='$row[id_koleksi]' onclick=\"confirmation(event)\"><i class='fas fa-times fa-fw'></i></button>
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
          url: site_url + 'penata/delete_koleksi/' + data_id,
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
            console.debug(jqXHR);
            console.debug(textStatus);
            console.debug(errorThrown);
          },
        });
      }
    })
  }
</script>