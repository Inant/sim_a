<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>nilai_kkm/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Nilai KKM</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($nilai_kkm_edit as $i){ ?>
          <div class="row">
            <input type="hidden" name="id_kkm" value="<?php echo $i->id_kkm ?>">
            <div class="form-group col-md-12">
              <label>Mata Pelajaran</label>
              <select name="id_mapel" id="" class="form-control form-control-line" >
                <option value="">--Pilih Mata Pelajaran--</option>
                <?php
                  foreach ($mapel as $key => $value) {
                ?>
                    <option value="<?php echo $value->id_mapel ?>" <?php echo $value->id_mapel == $i->id_mapel ? 'selected' : '' ?> ><?php echo $value->nama_mapel ?></option>
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
                    <option value="<?php echo $value->id_kelas ?>" <?php echo $value->id_kelas == $i->id_kelas ? 'selected' : '' ?> ><?php echo $value->nama_kelas ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label>Nilai KKM</label>
              <input type="number" name="nilai_kkm" class="form-control form-control-line" required="" value="<?php echo $i->nilai_kkm; ?>" >
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
