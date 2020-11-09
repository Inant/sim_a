
<!--  Content-->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <?php
        echo $this->session->flashdata("input_success");
        echo $this->session->flashdata("input_failed");
        echo $this->session->flashdata("update_success");
        echo $this->session->flashdata("update_failed");
        echo $this->session->flashdata("delete_success");
        echo $this->session->flashdata("delete_failed");
        ?>
        
        <form action="" method="get">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                  <option value=""> --Pilih Kelas-- </option>
                  <?php
                  foreach ($kelas as $key => $value) {
                  ?>
                    <option value="<?= $value->id_kelas ?>" <?= isset($_GET['kelas']) && $_GET['kelas'] == $value->id_kelas ? 'selected' : '' ?> > <?= $value->nama_kelas ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="rombel">Rombel</label>
                <select name="rombel" id="rombel" class="form-control">
                  <option value=""> --Pilih Rombel-- </option>
                  <?php
                  foreach ($rombel as $key => $value) {
                  ?>
                    <option value="<?= $value->id_kelasRombel ?>" <?= isset($_GET['rombel']) && $_GET['rombel'] == $value->id_kelasRombel ? 'selected' : '' ?> > <?= $value->nama_kelasRombel ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>" >
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="mapel">Mapel</label>
                <select name="mapel" id="mapel" class="form-control">
                  <option value=""> --Pilih Mapel-- </option>
                  <?php
                  foreach ($mapel as $key => $value) {
                  ?>
                    <option value="<?= $value->id_mapel ?>" <?= isset($_GET['mapel']) && $_GET['mapel'] == $value->id_mapel ? 'selected' : '' ?> > <?= $value->nama_mapel ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
        
        <?php
        if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['tanggal'])) {
        ?>
        <form onsubmit="return validate(this);" action="<?php echo base_url(). 'Absensi/add'; ?>" method="post">
          <input type="hidden" name="id_kelas" value="<?= $_GET['kelas'] ?>">
          <input type="hidden" name="id_kelasRombel" value="<?= $_GET['rombel'] ?>">
          <input type="hidden" name="tanggal_absen" value="<?= $_GET['tanggal'] ?>">
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php
                  $i = 0;
                  foreach ($siswa as $key => $value) {
                  ?>
                    <input type="text" class="hide" name="nisn[]" value="<?=$value->nisn?>">
                    <tr>
                      <td><?= $value->nisn ?></td>
                      <td><?= $value->nama_siswa ?></td>
                      <td>
                        <input type="radio" name="ket[<?=$i?>]" id="H<?=$i?>" value="H"><label for="H<?=$i?>">&nbsp;Hadir</label> &nbsp;
                        <input type="radio" name="ket[<?=$i?>]" id="I<?=$i?>" value="I"><label for="I<?=$i?>">&nbsp;Izin</label> &nbsp;
                        <input type="radio" name="ket[<?=$i?>]" id="S<?=$i?>" value="S"><label for="S<?=$i?>">&nbsp;Sakit</label> &nbsp;
                        <input type="radio" name="ket[<?=$i?>]" id="A<?=$i?>" value="A"><label for="A<?=$i?>">&nbsp;Alpha</label> &nbsp;
                      </td>
                    </tr>
                  <?php
                  $i++;
                  }
                  ?>
              </tbody>
            </table>
          </div>
          <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-success">Simpan</button>
        </form>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    $('.hide').hide()
  });
</script>