<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>walikelas/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Walikelas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($walikelas as $i){ ?>
          <input type="hidden" name="id_waliKelas" value="<?php echo $i->id_waliKelas ?>">
          <div class="form-group">
            <label for="" class="pull-left">Guru</label>
            <select name="nip" class="form-control" id="kelas">
                <?php foreach ($guru as $temp ){ ?>
                    <option value="<?php echo $temp->nip ?>" <?php if($temp->nip == $i->nip){echo "Selected";} ?>><?php echo $temp->nama_guru ?>
                </option>
            <?php } ?>
        </select>
          </div>
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
            <label for="" class="pull-left">Kelas Rombel</label>
            <select name="id_kelasRombel" class="form-control" id="jurusan">
                <?php foreach ($rombel as $temp ){ ?>
                    <option value="<?php echo $temp->id_kelasRombel ?>" <?php if($temp->id_kelasRombel == $i->id_kelasRombel){echo "Selected";} ?>><?php echo $temp->nama_kelasRombel ?>
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
