<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'jurusan/edit'; ?>",
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
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Bidang Keahlian</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($jurusan as $item) {
                ?>
                <tr>
                  <td><?= $item->id_jurusan ?></td>
                  <td><?= $item->nama_jurusan ?></td>
                  <td><?= $item->nama_bidang_keahlian ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-sm btn-success " onclick="edit('<?php echo $item->id_jurusan; ?>')"><i class="fa fa-edit"></i>  Edit</button>
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
      <form method="POST" name="input-jurusan" action="<?php echo base_url(). 'jurusan/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Jurusan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label>Kode Jurusan</label>
            <input type="text" name="id_jurusan" class="form-control form-control-line" required="">
          </div>
          <div class="form-group col-md-12">
            <select name="id_bidang_keahlian" id="" class="form-control form-control-line" >
              <option value="">--Pilih Bidang Keahlian--</option>
              <?php
                foreach ($bidang_keahlian as $key => $value) {
              ?>
                  <option value="<?php echo $value->id_bidang_keahlian ?>"><?php echo $value->nama_bidang_keahlian ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control form-control-line" required="">
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
