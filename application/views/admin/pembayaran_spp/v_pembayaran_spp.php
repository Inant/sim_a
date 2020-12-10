
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
                <label for="kelas">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="<?php echo isset($_GET['nisn']) ? $_GET['nisn'] :'' ?>" required data-url="<?php echo base_url().'Pembayaran_spp/get_spp' ?>">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Nama Siswa</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo isset($_GET['nama']) ? $_GET['nama'] :'' ?>" readonly>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Beasiswa</label>
                <input type="number" name="beasiswa" id="beasiswa" class="form-control" value="<?php echo isset($_GET['beasiswa']) ? $_GET['beasiswa'] :'' ?>" readonly>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Nominal SPP</label>
                <input type="number" name="nominal_spp" id="nominal_spp" class="form-control" value="<?php echo isset($_GET['nominal_spp']) ? $_GET['nominal_spp'] :'' ?>" readonly>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Tahun Akemik</label>
                <select name="tahun_akademik" id="tahun_akademik" class="form-control" required>
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
                <label for="kelas">Tanggal Pembayaran</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d') ?>" required>
              </div>
            </div>

            <input type="hidden" name="spp" id="spp" value="<?php echo isset($_GET['spp']) ? $_GET['spp'] :'' ?>" >

            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
        
        <?php
        if (isset($_GET['nisn']) && isset($_GET['tahun_akademik']) && isset($_GET['tanggal'])) {
        ?>
        <hr>
        <form id="form-spp" action="<?php echo base_url(). 'Pembayaran_spp/add'; ?>" method="post">
          <input type="hidden" name="nisn" value="<?= $_GET['nisn'] ?>">
          <input type="hidden" name="id_tahun_akademik" value="<?= $_GET['tahun_akademik'] ?>">
          <input type="hidden" name="id_spp" value="<?= $_GET['spp'] ?>">
          <input type="hidden" name="tanggal" value="<?= $_GET['tanggal'] ?>">

          <label for="">Pilih Bulan</label>

          <div class="row">

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="7" value="7" name="bulan[]" <?php echo in_array(7, $telahTerbayar) ? 'disabled' : '' ?> >
                <label class="form-check-label <?php echo in_array(7, $telahTerbayar) ? 'text-success' : '' ?>" for="7">Juli</label>
              </div>
            </div>
            
            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="8" value="8" name="bulan[]" <?php echo in_array(8, $telahTerbayar) ? 'disabled' : '' ?> >
                <label class="form-check-label <?php echo in_array(8, $telahTerbayar) ? 'text-success' : '' ?>" for="8">Agustus</label>
              </div>
            </div>
            
            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="9" value="9" name="bulan[]" <?php echo in_array(9, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(9, $telahTerbayar) ? 'text-success' : '' ?> " for="9">September</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="10" value="10" name="bulan[]" <?php echo in_array(10, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(10, $telahTerbayar) ? 'text-success' : '' ?>" for="10">Oktember</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="11" value="11" name="bulan[]" <?php echo in_array(11, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(11, $telahTerbayar) ? 'text-success' : '' ?>" for="11">November</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="12" value="12" name="bulan[]" <?php echo in_array(12, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(12, $telahTerbayar) ? 'text-success' : '' ?>" for="12">Desember</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="1" value="1" name="bulan[]" <?php echo in_array(1, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(1, $telahTerbayar) ? 'text-success' : '' ?>" for="1">Januari</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="2" value="2" name="bulan[]" <?php echo in_array(2, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(2, $telahTerbayar) ? 'text-success' : '' ?>" for="2">Februari</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="3" value="3" name="bulan[]" <?php echo in_array(3, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(3, $telahTerbayar) ? 'text-success' : '' ?>" for="3">Maret</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="4" value="4" name="bulan[]" <?php echo in_array(4, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(4, $telahTerbayar) ? 'text-success' : '' ?>" for="4">April</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="5" value="5" name="bulan[]" <?php echo in_array(5, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(5, $telahTerbayar) ? 'text-success' : '' ?>" for="5">Mei</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input bulan" id="6" value="6" name="bulan[]" <?php echo in_array(6, $telahTerbayar) ? 'disabled' : '' ?>>
                <label class="form-check-label <?php echo in_array(6, $telahTerbayar) ? 'text-success' : '' ?>" for="6">Juni</label>
              </div>
            </div>

            <div class="col-md-4 mt-3">
              <div class="form-group">
                <label for="">Total</label>
                <input type="number" name="total" id="total" class="form-control" value="0" readonly>
              </div>
            </div>
            
            <div class="col-md-4 mt-3">
              <div class="form-group">
                <label for="">Total Bayar</label>
                <input type="number" name="bayar" id="bayar" min="0" class="form-control" value="" required>
              </div>
            </div>
            
            <div class="col-md-4 mt-3">
              <div class="form-group">
                <label for="">Kembalian</label>
                <input type="number" name="kembalian" id="kembalian" class="form-control" value="0" readonly>
              </div>
            </div>

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