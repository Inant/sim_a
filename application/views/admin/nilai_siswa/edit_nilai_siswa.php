
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
                <label for="kelas">Tahun Akemik</label>
                <select name="tahun_akademik" id="tahun_akademik" class="form-control">
                  <option value=""> --Pilih Tahun Akademik-- </option>
                  <?php
                  foreach ($tahun_akademik as $key => $value) {
                  ?>
                    <option value="<?= $value->id_tahun_akademik ?>" <?= isset($_GET['tahun_akademik']) && $_GET['tahun_akademik'] == $value->id_tahun_akademik ? 'selected' : '' ?> > <?= $value->tahun_akademik . ' ' . $value->semester ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
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
              <div class="form-group">
                <label for="mapel">Kategori Nilai</label>
                <select name="kategori_nilai" id="kategori_nilai" class="form-control">
                  <option value=""> --Pilih Kategori Nilai-- </option>
                  <?php
                  foreach ($kategori_nilai as $key => $value) {
                  ?>
                    <option value="<?= $value->id_kategoriNilai ?>" <?= isset($_GET['kategori_nilai']) && $_GET['kategori_nilai'] == $value->id_kategoriNilai ? 'selected' : '' ?> > <?= $value->nama_kategoriNilai ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-6"></div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
        
        <?php
        if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['kategori_nilai'])) {
        ?>
        <form onsubmit="return validate(this);" action="<?php echo base_url(). 'Nilai_siswa/update'; ?>" method="post">
          <input type="hidden" name="id_kelas" value="<?= $_GET['kelas'] ?>">
          <input type="hidden" name="id_mapel" value="<?= $_GET['mapel'] ?>">
          <input type="hidden" name="id_tahunAkademik" value="<?= $_GET['tahun_akademik'] ?>">
          <input type="hidden" name="id_rombel" value="<?= $_GET['rombel'] ?>">
          <input type="hidden" name="id_kategoriNilai" value="<?= $_GET['kategori_nilai'] ?>">
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php
                  $i = 0;
                  foreach ($nilai as $key => $value) {
                  ?>
                    <input type="text" class="hide" name="id_nilai[]" value="<?=$value->id_nilai?>">
                    <tr>
                      <td><?= $value->nis ?></td>
                      <td><?= $value->nama_siswa ?></td>
                      <td>
                        <input type="number" name="nilai[]" min="0" max="100" id="nilai" class="form-control" value="<?=$value->nilai?>" required>
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