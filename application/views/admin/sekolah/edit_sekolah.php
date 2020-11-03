<!--  Content-->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Identitas Sekolah</small>)</h4>
      </div>
      <div class="card-body">
          <form action="<?= base_url() ?>identitas_sekolah/update" method="post"class="form-horizontal form-bordered">
            <input type="hidden" name="id_sekolahInfo" value="<?= $identitas_sekolah['id_sekolahInfo'] ?>">

          <div class="form-body">

            <div class="form-group row">
              <label class="control-label text-right col-md-3">Nama Sekolah</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['nama_sekolah'] ?>" name="nama_sekolah"type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">NPSN</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['npsn'] ?>" type="text" name="npsn" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">NSS</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['nss'] ?>" type="text" name="nss" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Alamat</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['alamat'] ?>" type="text" name="alamat" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Provinsi</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['provinsi'] ?>" type="text" name="provinsi" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Kabupaten</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['kabupaten'] ?>" type="text" name="kabupaten" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Kecamatan</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['kecamatan'] ?>" type="text" name="kecamatan" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Kode Pos</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['kodePos'] ?>" type="text" name="kodePos" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Nomor Telp</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['noTelp'] ?>" type="text" name="noTelp" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Website</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['website'] ?>" type="text" name="website" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Email</label>
              <div class="col-md-9">
                <input value="<?= $identitas_sekolah['email'] ?>" type="text" name="email" class="form-control">
              </div>
            </div>

          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="offset-sm-3 col-md-9">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end content -->
