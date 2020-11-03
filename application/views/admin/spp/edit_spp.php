<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>spp/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data SPP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($spp as $i){ ?>
          <input type="hidden" name="id_spp" value="<?php echo $i->id_spp ?>">

          <div class="form-group ">
            <label>Nama SPP</label>
            <input type="text" name="nama_spp" class="form-control form-control-line" required="" value="<?php echo $i->nama_spp; ?>" >
          </div>

          <div class="form-group ">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control form-control-line" required="" value="<?php echo $i->nominal; ?>" >
          </div>
          <div class="form-group">
            <label for="" class="pull-left">Tingkatan Kelas</label>
            <select name="id_kelas" class="form-control" id="kelas">
                <?php foreach ($kelas as $temp ){ ?>
                    <option value="<?php echo $temp->id_kelas ?>" <?php if($temp->id_kelas == $i->id_kelas){echo "Selected";} ?>><?php echo $temp->nama_kelas ?>
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
