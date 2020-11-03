<div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo base_url(); ?>bidang_keahlian/update">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jam Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php foreach($bidang_keahlian as $i){ ?>
                    <div class="row">
                        <input type="hidden" name="id_bidang_keahlian" value="<?php echo $i->id_bidang_keahlian ?>">
                        <div class="form-group col-md-12">
                          <label>Nama Bidang Keahlian</label>
                          <input type="text" name="nama_bidang_keahlian" id="nama_bidang_keahlian" class="form-control" value="<?php echo $i->nama_bidang_keahlian ?>" required>
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