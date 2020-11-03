<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>mapel/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Mata Pelajaran</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($mapel as $i){ ?>
            <input type="hidden" name="id_mapel" value="<?php echo $i->id_mapel ?>">

            <div class="form-group ">
              <label>Nama Kelas</label>
              <input type="text" name="nama_mapel" class="form-control form-control-line" required="" value="<?php echo $i->nama_mapel; ?>" >
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
