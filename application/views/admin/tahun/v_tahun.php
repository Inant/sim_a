<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'tahun/edit'; ?>",
    type: "POST",
    data: {id_tahun_akademik: id},
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
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($tahun as $item) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $item->tahun_akademik ?></td>
                  <td><?= $item->semester ?></td>
                  <td><?= $item->status ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-sm btn-success " onclick="edit('<?php echo $item->id_tahun_akademik; ?>')"><i class="fa fa-edit"></i>  Edit</button>
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
  <div class="modal fade " id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" name="input-kelas" action="<?php echo base_url(). 'tahun/add'; ?>" >
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Tambah Data Tahun Akademik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          </div>
          <div class="modal-body">
            <div class="form-group ">
              <label class="control-label">Tahun Akademik</label>
              <input type="text" name="tahun_akademik" class="form-control form-control-line" required="">
            </div>
            <div class="form-group ">
              <label class="control-label">Semester</label>
              <select name="semester" class="form-control" required="">
                <option value="">--Pilih--</option>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
              </select>
            </div>
            <div class="form-group ">
              <label class="control-label">Status</label>
              <select name="status" class="form-control" required="">
                <option value="">--Pilih--</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>
          </div>
          <div class="modal-footer ">
            <button type="reset" class="btn btn-dark">Hapus</button>
            <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check">Simpan</i></button>

          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="modaledit">
  </div>
