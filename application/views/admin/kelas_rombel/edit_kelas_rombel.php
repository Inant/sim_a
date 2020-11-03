<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>Kelas_rombel/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Kelas Rombel</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($kelas_rombel as $i){ ?>
          <input type="hidden" name="id_kelasRombel" value="<?php echo $i->id_kelasRombel ?>">
          <div class="form-group">
            <label for="" class="pull-left">Kelas</label>
            <select name="id_kelas" class="form-control" id="kelas">
                <?php foreach ($kelas as $temp ){ ?>
                    <option value="<?php echo $temp->id_kelas ?>" <?php if($temp->id_kelas == $i->id_kelas){echo "Selected";} ?>><?php echo $temp->nama_kelas ?>
                </option>
            <?php } ?>
        </select>
          </div>
          <div class="form-group">
            <label for="" class="pull-left">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="jurusan">
                <?php foreach ($jurusan as $temp ){ ?>
                    <option value="<?php echo $temp->id_jurusan ?>" <?php if($temp->id_jurusan == $i->id_jurusan){echo "Selected";} ?>><?php echo $temp->nama_jurusan ?>
                </option>
            <?php } ?>
        </select>
          </div>
          <div class="form-group ">
            <label>Kelas Rombel</label>
            <input type="text" name="nama_kelasRombel" class="form-control form-control-line" required="" value="<?php echo $i->nama_kelasRombel; ?>" >
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
