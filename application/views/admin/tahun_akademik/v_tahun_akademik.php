<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'Tahun_akademik/edit'; ?>",
    type: "POST",
    data: {id: id_tahun_akademik},
    success: function(ajaxData) {
      $("#modaledit").html(ajaxData);
      $("#modaledit").modal('show', {
        backdrop: 'true'
      });
    }
  });
}
</script>
<!--  Content-->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <?php
        echo $this->session->flashdata("input_success");
        echo $this->session->flashdata("input_failed");
        echo $this->session->flashdata("update_success");
        echo $this->session->flashdata("update_failed");
        echo $this->session->flashdata("delete_success");
        echo $this->session->flashdata("delete_failed");
        ?>
        <button class="btn btn-info d-none d-lg-block m-l-15" data-target="#modaladd" data-toggle="modal"><i class="fa fa-plus-circle"></i> Tambah Data</button>
        <hr>
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach ($tahun_akademik as $item) {
                ?>

                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?= $item->tahun_akademik ?></td>
                  <td><?= $item->semester ?></td>
                  <td><?= $item->status ?></td>

                  <td>
                    <button type="button" class="btn btn-sm btn-success" onclick="edit('<?php echo $item->id_tahun_akademik; ?>')"><i class="icofont-ui-edit"></i>Edit</button>

                    <a href="<?php echo base_url() . 'tahun_akademik/hapus'; ?>/<?php echo $item->id_tahun_akademik ?>" class="btn btn-danger"onClick="return doconfirm();">Hapus</a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end content -->
<!-- Modal Tambah data  -->
<div class="modal fade bs-example-modal-md" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" name="input-tahun_akademik" action="<?php echo base_url(). 'tahun_akademik/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Tahun Akademik</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_tahun_akademik" class="form-control form-control-line" required="">
          <div class="form-group col-md-12">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control form-control-line" required="">
          </div>
          <div class="col-md-12 form-group ">
            <label>Semester</label>
            <select name="semester" class="form-control" required="">
              <option value="">--Pilih--</option>
              <option value="Ganjil">Ganjil</option>
              <option value="Genap">Genap</option>
            </select>
          </div>
          <div class="col-md-12 form-group ">
            <label>Status</label>
            <select name="status" class="form-control" required="">
              <option value="">--Pilih--</option>
              <option value="Aktif">Aktif</option>
              <option value="Tidak">Tidak</option>
            </select>
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
