<div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo base_url(); ?>jam/update">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jam Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php foreach($jam_kbm as $i){ ?>
                    <div class="row">
                        <input type="hidden" name="id_jamPelajaran" value="<?php echo $i->id_jamPelajaran ?>">
                        <div class="form-group col-md-12">
                          <label>Hari</label>
                          <select name="hari" id="hari" class="form-control" required>
                            <option value="">-- Pilih Hari --</option>
                            <option value="senin" <?php echo $i->hari == 'senin' ? 'selected' : '' ?> >Senin</option>
                            <option value="selasa" <?php echo $i->hari == 'selasa' ? 'selected' : '' ?>>Selasa</option>
                            <option value="rabu" <?php echo $i->hari == 'rabu' ? 'selected' : '' ?>>Rabu</option>
                            <option value="kamis" <?php echo $i->hari == 'kamis' ? 'selected' : '' ?>>Kamis</option>
                            <option value="jumat" <?php echo $i->hari == 'jumat' ? 'selected' : '' ?>>Jumat</option>
                            <option value="sabtu" <?php echo $i->hari == 'sabtu' ? 'selected' : '' ?>>Sabtu</option>
                            <option value="minggu" <?php echo $i->hari == 'minggu' ? 'selected' : '' ?>>Minggu</option>
                          </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                          <label>Jam Ke</label>
                          <input type="number" name="jam_ke" id="jam" class="form-control" value="<?php echo $i->jam_ke ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                          <label>Pukul Dari</label>
                          <input type="time" name="pukul_dari"  class="form-control" value="<?php echo date('H:i', strtotime($i->pukul_dari)) ?>">
                        </div>
                         <div class="form-group col-md-12">
                          <label>Pukul Sampai</label>
                          <input type="time" name="pukul_sampai"  class="form-control" value="<?php echo date('H:i', strtotime($i->pukul_sampai)) ?>">
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