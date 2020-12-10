
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

            <input type="hidden" name="spp" id="spp" value="<?php echo isset($_GET['spp']) ? $_GET['spp'] :'' ?>" >
            <div class="col-6"></div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
        
        <?php
        if (isset($_GET['nisn']) && isset($_GET['tahun_akademik'])) {
        ?>
        <hr>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Pembayaran SPP</th>
                <th>Tanggal Pembayaran</th>
                <th>Total</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($listPembayaran as $key => $value) {
              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $value['kode_pembayaran_spp'] ?></td>
                  <td><?php echo date('d-m-Y', strtotime($value['tanggal'])) ?></td>
                  <td><?php echo number_format($value['total'], 2, ',', '.') ?></td>
                  <td>
                    <a href="<?php echo base_url(). 'Pembayaran_spp/edit/' .$value['kode_pembayaran_spp'] ?>" class="btn btn-primary">Edit</a>
                  </td>
                </tr>
              <?php
                $no++;
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