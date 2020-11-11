
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
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
        
        <?php
        if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel'])) {
          
          // echo "<pre>";
          // print_r ($absen);
          // echo "</pre>";
          
        ?>
        <br>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th rowspan="2" style="vertical-align: middle;text-align:center">NISN</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center">Nama Siswa</th>
                <th colspan="<?=$jumlah_pertemuan?>" style="vertical-align: middle;text-align:center">Pertemuan Ke</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center">Persentase Kehadiran</th>
                <th colspan="4" style="vertical-align: middle;text-align:center">Total</th>
              </tr>
              <tr>
                <?php
                for ($i=1; $i <= $jumlah_pertemuan ; $i++) { 
                  echo "<th style='vertical-align: middle;text-align:center'>$i</th>";
                }
                ?>
                <th style="vertical-align: middle;text-align:center">H</th>
                <th style="vertical-align: middle;text-align:center">I</th>
                <th style="vertical-align: middle;text-align:center">S</th>
                <th style="vertical-align: middle;text-align:center">A</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($siswa as $key => $value) {
                $absensi = $this->M_absensi->getKetByNisn($value->nisn, $_GET['tahun_akademik'], $_GET['kelas'], $_GET['rombel'], $_GET['mapel']);
                $jumlahHadir = 0;
                $jumlahIjin = 0;
                $jumlahSakit = 0;
                $jumlahAlpha = 0;
              ?>
                <tr>
                  <td><?=$value->nisn?></td>
                  <td><?=$value->nama_siswa?></td>
                  <?php
                  foreach ($absensi as $keyKet => $valueKet) {
                    
                    if ($valueKet->ket == 'H') {
                      $jumlahHadir += 1;
                    }
                    elseif ($valueKet->ket == 'I') {
                      $jumlahIjin += 1;
                    }
                    elseif ($valueKet->ket == 'S') {
                      $jumlahSakit += 1;
                    }
                    else{
                      $jumlahAlpha += 1;
                    }

                    echo "<td>$valueKet->ket</td>";
                  }
                  ?>
                  <td style="text-align: center;"><?= $jumlahHadir / $jumlah_pertemuan * 100 ?></td>
                  <td><?= $jumlahHadir ?></td>
                  <td><?= $jumlahIjin ?></td>
                  <td><?= $jumlahSakit ?></td>
                  <td><?= $jumlahAlpha ?></td>
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