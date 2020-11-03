<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>jurusan/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Jurusan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($jurusan as $i){ ?>
          <div class="row">
            <div class="form-group col-md-12">
              <label>Kode Jurusan</label>
              <input type="text" name="id_jurusan" class="form-control form-control-line" required="" value="<?php echo $i->id_jurusan; ?>" >
            </div>
            <div class="form-group col-md-12">
            <select name="id_bidang_keahlian" id="" class="form-control form-control-line" >
              <option value="">--Pilih Bidang Keahlian--</option>
              <?php
                foreach ($bidang_keahlian as $key => $value) {
              ?>
                  <option value="<?php echo $value->id_bidang_keahlian ?>" <?php echo $value->id_bidang_keahlian == $i->id_bidang_keahlian ? 'selected' : '' ?> ><?php echo $value->nama_bidang_keahlian ?></option>
              <?php
                }
              ?>
            </select>
          </div>
            <div class="form-group col-md-12">
              <label>Nama Jurusan</label>
              <input type="text" name="nama_jurusan" class="form-control form-control-line" required="" value="<?php echo $i->nama_jurusan; ?>" >
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
