<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>tahun_akademik/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Tahun Akademik</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($tahun_akademik as $temp){ ?>
          <div class="row">
            <input type="hidden" name="tahun_akademik" class="form-control form-control-line" required=""value="<?php $temp->id_tahun_akademik ?>">

            <div class="form-group col-md-12">
              <label>Tahun Akademik</label>
              <input type="text" name="tahun_akademik" class="form-control form-control-line" required=""value="<?php $temp->tahun_akademik ?>">
            </div>
            <div class="col-md-6 form-group ">
              <label>Semester</label>
              <select name="semester" class="form-control" required="">
                <option value="">--Pilih--</option>
                <option value="Ganjil"<?php echo $temp->semester == 'Ganjil' ? 'selected' : '' ?>>Ganjil</option>
                <option value="Genap"<?php echo $temp->semester == 'Genap' ? 'selected' : '' ?>>Genap</option>
              </select>
            </div>
            <div class="col-md-6 form-group ">
              <label>Status</label>
              <select name="status" class="form-control" required="">
                <option value="">--Pilih--</option>
                <option value="Aktif"<?php echo $temp->status == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak"<?php echo $temp->status == 'Tidak' ? 'selected' : '' ?>>Tidak Aktif</option>
              </select>
            </div>

          <?php } ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check">Simpan</i></button>
          <button type="reset" class="btn btn-dark">Hapus</button>
        </div>
      </form>
    </div>
  </div>
