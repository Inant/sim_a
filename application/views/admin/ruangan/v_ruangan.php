<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'ruangan/edit'; ?>",
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
                <th>Nama Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($ruangan as $item) {
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $item->nama_ruangan ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-md btn-success " onclick="edit('<?php echo $item->id_ruangan; ?>')"><i class="fa fa-edit"></i>  Edit</button>
                    <a href="<?php echo base_url() . 'ruangan/hapus'; ?>/<?php echo $item->id_ruangan ?>" class="btn btn-danger"onClick="return doconfirm();"><i class="fa fa-trash"></i> Hapus</a>

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
      <form method="POST" name="input-ruangan" action="<?php echo base_url(). 'ruangan/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Ruangan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <input type="hidden" name="id_ruangan" class="form-control form-control-line" required="">
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label>Nama Ruangan</label>
            <input type="text" name="nama_ruangan" class="form-control form-control-line" required="">
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
