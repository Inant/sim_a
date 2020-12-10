
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
        
        <form id="form-spp" action="<?php echo base_url(). 'Pembayaran_spp/update'; ?>" method="post">
        <div class="row">
          <input type="hidden" name="kode_pembayaran_spp" value="<?php echo $pembayaran['kode_pembayaran_spp'] ?>">
          <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="<?php echo $siswa['nisn'] ?>" readonly>
              </div>
          </div>
          
          <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Nama Siswa</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $siswa['nama_siswa'] ?>" readonly>
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Beasiswa</label>
                <input type="number" name="beasiswa" id="beasiswa" class="form-control" value="<?php echo $siswa['beasiswa'] ?>" readonly>
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Nominal SPP</label>
                <input type="number" name="nominal_spp" id="nominal_spp" class="form-control" value="<?php echo $nominalSpp['nominal'] ?>" readonly>
              </div>
          </div>

          <div class="col-md-6">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" id="" class="form-control" value="<?php echo $pembayaran['tanggal']?>">
          </div>
        </div>
          <hr>
          <label for="">Pilih Bulan</label>

          <div class="row">

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(7, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="7" value="7" name="<?php echo in_array(7, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(7, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(7, $terbayarDisable) ? 'disabled checked' : '' ?> >
                <label class="form-check-label <?php echo in_array(7, $telahTerbayar) ? 'text-success' : '' ?>" for="7">Juli</label>
              </div>
            </div>
            
            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(8, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="8" value="8" name="<?php echo in_array(8, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(8, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(8, $terbayarDisable) ? 'disabled checked' : '' ?> >
                <label class="form-check-label <?php echo in_array(8, $telahTerbayar) ? 'text-success' : '' ?>" for="8">Agustus</label>
              </div>
            </div>
            
            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(9, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="9" value="9" name="<?php echo in_array(9, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(9, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(9, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(9, $telahTerbayar) ? 'text-success' : '' ?> " for="9">September</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(10, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="10" value="10" name="<?php echo in_array(10, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(10, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(10, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(10, $telahTerbayar) ? 'text-success' : '' ?>" for="10">Oktember</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(11, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="11" value="11" name="<?php echo in_array(11, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(11, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(11, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(11, $telahTerbayar) ? 'text-success' : '' ?>" for="11">November</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(12, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="12" value="12" name="<?php echo in_array(12, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(12, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(12, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(12, $telahTerbayar) ? 'text-success' : '' ?>" for="12">Desember</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(1, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="1" value="1" name="<?php echo in_array(1, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(1, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(1, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(1, $telahTerbayar) ? 'text-success' : '' ?>" for="1">Januari</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(2, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="2" value="2" name="<?php echo in_array(2, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(2, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(2, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(2, $telahTerbayar) ? 'text-success' : '' ?>" for="2">Februari</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(3, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="3" value="3" name="<?php echo in_array(3, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(3, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(3, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(3, $telahTerbayar) ? 'text-success' : '' ?>" for="3">Maret</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(4, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="4" value="4" name="<?php echo in_array(4, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(4, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(4, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(4, $telahTerbayar) ? 'text-success' : '' ?>" for="4">April</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(5, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="5" value="5" name="<?php echo in_array(5, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(5, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(5, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(5, $telahTerbayar) ? 'text-success' : '' ?>" for="5">Mei</label>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input <?php echo in_array(6, $terbayarDisable) ? '' : 'edit_bulan' ?>" id="6" value="6" name="<?php echo in_array(6, $terbayarDisable) ? "" : 'bulan[]' ?>" <?php echo in_array(6, $telahTerbayar) ? 'checked' : '' ?> <?php echo in_array(6, $terbayarDisable) ? 'disabled checked' : '' ?>>
                <label class="form-check-label <?php echo in_array(6, $telahTerbayar) ? 'text-success' : '' ?>" for="6">Juni</label>
              </div>
            </div>

            <div class="col-md-4 mt-3">
              <div class="form-group">
                <label for="">Total</label>
                <input type="number" name="total" id="total" class="form-control" value="<?php echo $pembayaran['total'] ?>" readonly>
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
      </div>
    </div>
  </div>
</div>