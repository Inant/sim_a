<!--  Content-->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Identitas Sekolah</h4>
      </div>
      <div class="card-body">
          <div class="form-body">
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Nama Sekolah</label>
              <div class="col-md-10">
                <input disabled name="nama_sekolah"type="text" value="<?php echo $identitas_sekolah['nama_sekolah']; ?>" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">NPSN</label>
              <div class="col-md-10">
                <input disabled type="text" name="npsn" class="form-control"value="<?php echo $identitas_sekolah['npsn']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">NSS</label>
              <div class="col-md-10">
                <input disabled type="text" name="nss" class="form-control"value="<?php echo $identitas_sekolah['nss']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Alamat</label>
              <div class="col-md-10">
                <input disabled type="text" name="alamat" class="form-control"value="<?php echo $identitas_sekolah['alamat']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Provinsi</label>
              <div class="col-md-10">
                <input disabled type="text" name="provinsi" class="form-control"value="<?php echo $identitas_sekolah['provinsi']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Kabupaten</label>
              <div class="col-md-10">
                <input disabled type="text" name="kabupaten" class="form-control"value="<?php echo $identitas_sekolah['kabupaten']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Kecamatan</label>
              <div class="col-md-10">
                <input disabled type="text" name="kecamatan" class="form-control"value="<?php echo $identitas_sekolah['kecamatan']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Kode Pos</label>
              <div class="col-md-10">
                <input disabled type="text" name="kodePos" class="form-control"value="<?php echo $identitas_sekolah['kodePos']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Nomor Telp</label>
              <div class="col-md-10">
                <input disabled type="text" name="noTelp" class="form-control"value="<?php echo $identitas_sekolah['noTelp']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Website</label>
              <div class="col-md-10">
                <input disabled type="text" name="website" class="form-control"value="<?php echo $identitas_sekolah['website']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-left col-md-2">Email</label>
              <div class="col-md-10">
                <input disabled type="text" name="email" class="form-control"value="<?php echo $identitas_sekolah['email']; ?>">
              </div>
            </div>

          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="offset-sm-2 col-md-10">
                      <a href="<?php echo base_url() . 'identitas_sekolah/edit'; ?>/<?= $identitas_sekolah['id_sekolahInfo'] ?>" class="btn btn-danger"><i class="fa fa-check"></i> Ubah</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- end content -->
