<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>ruangan/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Ruangan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($ruangan as $i){ ?>
          <div class="row">
            <input type="hidden" name="id_ruangan" value="<?php echo $i->id_ruangan ?>">

            <div class="form-group col-md-12">
              <label>Nama Ruangan</label>
              <input type="text" name="nama_ruangan" class="form-control form-control-line" required="" value="<?php echo $i->nama_ruangan; ?>" >
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
