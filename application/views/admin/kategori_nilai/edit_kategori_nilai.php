<div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo base_url(); ?>Kategori_nilai/update">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori Nilai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php foreach($kategori_nilai as $i){ ?>
                    <div class="row">
                        <input type="hidden" name="id_kategoriNilai" value="<?php echo $i->id_kategoriNilai ?>">
                        <div class="form-group col-md-12">
                          <label>Nama Kategori Nilai</label>
                          <input type="text" name="nama_kategoriNilai" id="nama_kategoriNilai" class="form-control" value="<?php echo $i->nama_kategoriNilai ?>" required>
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