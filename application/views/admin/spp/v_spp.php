<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'spp/edit'; ?>",
    type: "POST",
    data: {id_spp: id},
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
                <th>Nama SPP</th>
                <th>Nominal</th>
                <th>Tingkatan Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($spp as $item) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $item->nama_spp ?></td>
                  <td><?= $item->nominal ?></td>
                  <td><?= $item->nama_kelas ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-md btn-success " onclick="edit('<?php echo $item->id_spp; ?>')"><i class="fa fa-edit"></i>  Edit</button>
                    <a href="<?php echo base_url() . 'spp/hapus'; ?>/<?php echo $item->id_spp ?>" class="btn btn-danger"onClick="return doconfirm();"><i class="fa fa-trash"></i> Hapus</a>

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
        <form method="POST" name="input-kelas" action="<?php echo base_url(). 'spp/add'; ?>" >
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Tambah Data spp</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          </div>
          <div class="modal-body">

            <div class="form-group ">
              <label>Nama SPP</label>
              <input type="text" name="nama_spp" class="form-control form-control-line" required="">
            </div>

            <div class="form-group ">
              <label>Nominal</label>
              <input type="number" name="nominal" class="form-control form-control-line" required="">
            </div>
            <div class="form-group ">
              <label class="control-label">Nama Kelas</label>
              <select name="id_kelas" class="form-control">
                <option value="">--Pilih--</option>
                <?php foreach ($kelas as $item) {
                  ?>
                  <option value="<?php echo $item->id_kelas ?>"><?php echo $item->nama_kelas ?></option>
                <?php } ?>
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
