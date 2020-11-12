<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'Kategori_nilai/edit'; ?>",
    type: "POST",
    data: {
      id: id
    },
    success: function(ajaxData) {
      $("#modaledit").html(ajaxData);
      $("#modaledit").modal('show', {
        backdrop: 'true'
      });
    }
  });
}
</script>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <!--  <a href="<?= base_url() ?>Kategori_nilai/add" class="btn btn-primary">Tambah Data</a> -->
            <button style="margin-left:10px;margin-bottom: 10px;" class="btn btn-primary btn-sm" data-target="#modaladd" data-toggle="modal"><i class="fa fa-plus-circle"></i> Tambah Data</button>
            <hr>
            <div class="table-responsive">
              <table id="myTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori Nilai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($kategori_nilai as $item) {
                    ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $item->nama_kategoriNilai ?></td>
                      <td>
                        <button type="button" class="btn btn-md btn-success" onclick="edit('<?php echo $item->id_kategoriNilai; ?>')"><i class="icofont-ui-edit"></i>Edit</button>
                        <a href="<?php echo base_url() . 'Kategori_nilai/hapus'; ?>/<?php echo $item->id_kategoriNilai ?>" class="btn btn-danger"onClick="return doconfirm();">Hapus</a>
                      </td>
                    </tr>
                  <?php
                  $no++;
                } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

<!-- Modal Tambah data  -->
<div class="modal fade bs-example-modal-md" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" name="input-Kategori_nilai" action="<?php echo base_url(). 'Kategori_nilai/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Kategori Nilai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <input type="hidden" name="id_kategoriNilai" class="form-control form-control-line" required="">
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label>Nama Kategori Nilai</label>
            <input type="text" name="nama_kategoriNilai" id="nama_kategoriNilai" class="form-control" required>
          </div>

        </div>
        <div class="modal-footer ">
        <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check">Simpan</i></button>
          <button type="reset" class="btn btn-dark">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="modaledit">
</div>
