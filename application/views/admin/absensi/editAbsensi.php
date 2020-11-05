<div class="modal-dialog">
  <div class="modal-content">
    <form method="POST" action="<?php echo base_url(); ?>Absensi/update">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Absensi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php foreach($absensi as $i){ ?>
          <input type="hidden" name="id_absensi" value="<?php echo $i->id_absensi ?>">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="">Kelas</label>
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
              <label for="">Rombel</label>
              <select name="id_kelasRombel" id="" class="form-control form-control-line" >
                <option value="">--Pilih Rombel--</option>
                <?php
                  foreach ($rombel as $key => $value) {
                ?>
                    <option value="<?php echo $value->id_kelasRombel ?>" <?php echo $value->id_kelasRombel == $i->id_kelasRombel ? 'selected' : '' ?> ><?php echo $value->nama_kelasRombel ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="">Siswa</label>
              <select name="nisn" id="" class="form-control form-control-line" >
                <option value="">--Pilih Siswa--</option>
                <?php
                  foreach ($siswa as $key => $value) {
                ?>
                    <option value="<?php echo $value->nisn ?>" <?php echo $value->nisn == $i->nisn ? 'selected' : '' ?> ><?php echo $value->nisn . ' -- ' . $value->nama_siswa ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="">Keterangan</label>
              <select name="ket" id="" class="form-control form-control-line" >
                <option value="">--Pilih Keterangan--</option>
                <option value="A" <?php echo $i->ket == 'A' ? 'selected' : '' ?>>A</option>
                <option value="I"<?php echo $i->ket == 'I' ? 'selected' : '' ?>>I</option>
                <option value="S"<?php echo $i->ket == 'S' ? 'selected' : '' ?>>S</option>
                <option value="H"<?php echo $i->ket == 'H' ? 'selected' : '' ?>>H</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label>Tanggal</label>
              <input type="date" name="tanggal_absen" value="<?php echo $i->tanggal_absen ?>" class="form-control form-control-line" required="">
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
