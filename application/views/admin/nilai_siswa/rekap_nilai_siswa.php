
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
                <label for="nis">Siswa</label>
                <select name="nis" id="nis" class="form-control">
                  <option value=""> --Pilih Siswa-- </option>
                  <?php
                  foreach ($siswa as $key => $value) {
                  ?>
                    <option value="<?= $value->nis ?>" <?= isset($_GET['nis']) && $_GET['nis'] == $value->nis ? 'selected' : '' ?> > <?= $value->nis . ' - ' . $value->nama_siswa ?> </option>
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
        if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['nis'])) {
          
          // echo "<pre>";
          // print_r ($absen);
          // echo "</pre>";
          
        ?>
        <br>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th style="vertical-align: middle;text-align:center">Kelas</th>
                <th style="vertical-align: middle;text-align:center">Rombel</th>
                <!-- <th style="vertical-align: middle;text-align:center">NISN</th> -->
                <th style="vertical-align: middle;text-align:center">Nama Siswa</th>
                <th style="vertical-align: middle;text-align:center">Mapel</th>
                <th style="vertical-align: middle;text-align:center">Kategori Nilai</th>
                <th style="vertical-align: middle;text-align:center">Nilai</th>
                <th style="vertical-align: middle;text-align:center">Ket</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($nilai as $key => $value) {
                // $no = 1;
              ?>
                <tr>
                  <td><?=$value->nama_kelas?></td>
                  <td><?=$value->nama_kelasRombel?></td>
                  <td><?=$value->nama_siswa?></td>
                  <td><?=$value->nama_mapel?></td>
                  <td><?=$value->nama_kategoriNilai?></td>
                  <td><?=$value->nilai?></td>
                  <td><?=$value->ket?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
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