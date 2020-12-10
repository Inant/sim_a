
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
                <label for="kelas">Dari</label>
                <input type="date" name="dari" id="dari" class="form-control" value="<?php echo isset($_GET['dari']) ? $_GET['dari'] :'' ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelas">Sampai</label>
                <input type="date" name="sampai" id="sampai" class="form-control" value="<?php echo isset($_GET['sampai']) ? $_GET['sampai'] :'' ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
        
        <?php
        if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        ?>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Siswa</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Total Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total =0;
                $no = 1;
                foreach ($laporan as $key => $value) {
                  $total+=$value['total'];
                 echo "
                  <tr>
                    <td>". $no ."</td>
                    <td>". $value['nisn'] . ' - ' .$value['nama_siswa'] ."</td>
                    <td>". date('d-m-Y', strtotime($value['tanggal'])) ."</td>
                    <td>". number_format($value['total'], 0, ',', '.') ."</td>
                  </tr>
                 ";
                 $no++;
                }
                ?>
              </tbody>
              <tfoot>
                <th colspan="3" style="text-align: center;"><b>Total</b></th>
                <th style="text-align: center;"><b><?php echo "Rp " .number_format($total, 2, ',', '.') ?></b></th>
              </tfoot>
            </table>
          </div>

        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>