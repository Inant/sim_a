<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'nilai_kkm/edit'; ?>",
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
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Nilai KKM</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($nilai_kkm as $item) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $item->nama_mapel ?></td>
                  <td><?= $item->nama_kelas ?></td>
                  <td><?= $item->nilai_kkm ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-sm btn-success " onclick="edit('<?php echo $item->id_kkm; ?>')"><i class="fa fa-edit"></i>  Edit</button>
                  </td>
                </tr>
              <?php $no++; } ?>

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
      <form method="POST" name="input-nilai_kkm" action="<?php echo base_url(). 'nilai_kkm/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Nilai KKM</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label>Mata Pelajaran</label>
            <select name="id_mapel" id="" class="form-control form-control-line" >
              <option value="">--Pilih Mata Pelajaran--</option>
              <?php
                foreach ($mapel as $key => $value) {
              ?>
                  <option value="<?php echo $value->id_mapel ?>"><?php echo $value->nama_mapel ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label>Kelas</label>
            <select name="id_kelas" id="" class="form-control form-control-line" >
              <option value="">--Pilih Kelas--</option>
              <?php
                foreach ($kelas as $key => $value) {
              ?>
                  <option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label>Nilai KKM</label>
            <input type="number" name="nilai_kkm" class="form-control form-control-line" required="">
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
