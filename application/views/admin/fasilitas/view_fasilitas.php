<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Fasilitas</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_fasilitas'); ?>'><i class="fas fa-plus fa-fw mr-1"></i>Tambah Fasilitas</a>
            </div>

            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless" style="width: 100%">
                <thead>
                  <tr>
                    <th style='width:5%'>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>gambar</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record->result_array() as $row) {
                    echo "<tr><td>$no</td>
                              <td>$row[nama]</td>
                              <td>$row[deskripsi]</td>
                              <td class='image-popup-detail' href='" . base_url('assets/images/fasilitas/') . $row['gambar'] . "'>
                              <img src='" . base_url('assets/images/fasilitas/') . $row['gambar'] . "' alt='Gambar' style='height: 60px'>
                              </td>
                              <td>
                                <a class='btn btn-success btn-xs' title='Ubah' href='" . base_url() . "admin/edit_fasilitas/" . encrypt_url($row['id_fasilitas']) . "'><i class='fas fa-edit fa-fw'></i></a>
                                <button class='btn btn-danger btn-xs' title='Hapus' data-id='$row[id_fasilitas]' onclick=\"confirmation(event)\"><i class='fas fa-times fa-fw'></i></button>
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
          url: site_url + 'admin/delete_fasilitas/' + data_id,
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