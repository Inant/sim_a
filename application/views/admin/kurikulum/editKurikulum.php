<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>kurikulum/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Kurikulum</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($kurikulum as $i){ ?>
            <input type="hidden" name="id_kurikulum" value="<?php echo $i->id_kurikulum ?>">

            <div class="form-group ">
              <label>Nama Kurikulum</label>
              <input type="text" name="nama_kurikulum" class="form-control form-control-line" required="" value="<?php echo $i->nama_kurikulum; ?>" >
            </div>
            <div class="form-group">
              <label for="" class="pull-left">Status</label>
              <select name="status" class="form-control" >
                  <?php foreach ($kurikulum as $temp ){ ?>
                      <option value="<?php echo $temp->kurikulum ?>" <?php if($temp->kurikulum == $i->nama_kurikulum){echo "Selected";} ?>><?php echo $temp->status ?>
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
