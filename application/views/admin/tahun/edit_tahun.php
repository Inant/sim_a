<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>tahun/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Tahun Akademik</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($tahun as $i){ ?>
          <input type="hidden" name="id_tahun_akademik" value="<?php echo $i->id_tahun_akademik ?>">
          <div class="form-group">
            <label for="" class="pull-left">tahun Akademik</label>
            <select name="id_tahun_akademik" class="form-control" id="jurusan">
                <?php foreach ($tahun as $temp ){ ?>
                    <option value="<?php echo $temp->id_tahun_akademik ?>" <?php if($temp->id_tahun_akademik == $i->id_tahun_akademik){echo "Selected";} ?>><?php echo $temp->tahun_akademik ?>
                </option>
            <?php } ?>
        </select>
          </div>
          <div class="form-group">
            <label for="" class="pull-left">Semester</label>
            <select name="semester" class="form-control" >
                <?php foreach ($tahun as $temp ){ ?>
                    <option value="<?php echo $temp->tahun_akademik ?>" <?php if($temp->tahun_akademik == $i->tahun_akademik){echo "Selected";} ?>><?php echo $temp->semester ?>
                </option>
            <?php } ?>
        </select>
          </div>
          <div class="form-group">
            <label for="" class="pull-left">Status</label>
            <select name="status" class="form-control" >
                <?php foreach ($tahun as $temp ){ ?>
                    <option value="<?php echo $temp->tahun_akademik ?>" <?php if($temp->tahun_akademik == $i->tahun_akademik){echo "Selected";} ?>><?php echo $temp->status ?>
                </option>
            <?php } ?>
        </select>
          </div>
        <?php } ?>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check">Simpan</i></button>
          <button type="reset" class="btn btn-dark">Hapus</button>
        </div>
      </form>
    </div>
  </div>
