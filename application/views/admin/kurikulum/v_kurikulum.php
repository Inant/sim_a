<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'kurikulum/edit'; ?>",
    type: "POST",
    data: {
      id_kurikulum: id
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
                <th>Nama Kurikulum</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($kurikulum as $item) {
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $item->nama_kurikulum ?></td>
                  <td><?= $item->status ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-md btn-success " onclick="edit('<?php echo $item->id_kurikulum; ?>')"><i class="fa fa-edit"></i>  Edit</button>
                    <a href="<?php echo base_url() . 'kurikulum/hapus'; ?>/<?php echo $item->id_kurikulum ?>" class="btn btn-danger"onClick="return doconfirm();"><i class="fa fa-trash"></i> Hapus</a>

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
<div class="modal fade " id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" name="input-kurikulum" action="<?php echo base_url(). 'kurikulum/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Kurikulum</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <input type="hidden" name="id_kurikulum" class="form-control form-control-line" required="">
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label class="control-label">Nama Kurikulum</label>
            <input type="text" name="nama_kurikulum" class="form-control form-control-line" required="">
          </div>

        <div class="form-group ">
          <label class="control-label">Status</label>
          <select name="status" class="form-control" required="">
            <option value="">--Pilih--</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak</option>
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
