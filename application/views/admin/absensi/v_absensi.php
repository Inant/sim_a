<script>
function edit(id) {
  $.ajax({
    url: "<?php echo base_url() . 'Absensi/edit'; ?>",
    type: "POST",
    data: {
      id: id
    },
    success: function(ajaxData) {
      $("#modaledit").html(ajaxData);
      $("#modaledit").modal('show', {
        backdrop: 'true'
      });
    }
  });
}
</script>
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
        <button class="btn btn-info d-none d-lg-block m-l-15" data-target="#modaladd" data-toggle="modal"><i class="fa fa-plus-circle"></i> Tambah Data</button>
        <hr>
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Nama Rombel</th>
                <th>Tanggal</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($absensi as $item) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $item->nama_kelas ?></td>
                  <td><?= $item->nama_kelasRombel ?></td>
                  <td><?= $item->tanggal_absen ?></td>
                  <td><?= $item->nisn ?></td>
                  <td><?= $item->nama_siswa ?></td>
                  <td><?= $item->ket ?></td>

                  <td style="text-align: center;">
                    <button type="button" class="btn btn-sm btn-success " onclick="edit('<?php echo $item->id_absensi; ?>')"><i class="fa fa-edit"></i>  Edit</button>
                  </td>
                </tr>
              <?php $no++; } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end content -->
<!-- Modal Tambah data  -->
<div class="modal fade bs-example-modal-md" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" name="input-absensi" action="<?php echo base_url(). 'Absensi/add'; ?>" >
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Jurusan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label for="">Kelas</label>
            <select name="id_kelas" id="" class="form-control form-control-line" >
              <option value="">--Pilih Kelas--</option>
              <?php
                foreach ($kelas as $key => $value) {
              ?>
                  <option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
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
                  <option value="<?php echo $value->id_kelasRombel ?>"><?php echo $value->nama_kelasRombel ?></option>
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
                  <option value="<?php echo $value->nisn ?>"><?php echo $value->nisn . ' -- ' . $value->nama_siswa ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Keterangan</label>
            <select name="ket" id="" class="form-control form-control-line" >
              <option value="">--Pilih Keterangan--</option>
              <option value="A">A</option>
              <option value="I">I</option>
              <option value="S">S</option>
              <option value="H">H</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label>Tanggal</label>
            <input type="date" name="tanggal_absen" class="form-control form-control-line" required="">
          </div>
        </div>
        <div class="modal-footer ">
          <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check">Simpan</i></button>
          <button type="reset" class="btn btn-dark">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="modaledit">
</div>
