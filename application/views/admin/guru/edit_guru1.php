<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Edit Data Guru</h4>
      </div>
      <div class="card-body">
        <?php foreach ($guru as $item) { ?>
        <form action="<?php echo base_url(). 'guru/update'; ?>" method="post">
          <div class="form-body">
            <h3 class="card-title">Identitas Guru</h3>
            <hr>
            <div class="row p-t-20">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">NIP</label>
                  <input type="text"value="<?php echo $item->nip ?>" name="nip" class="form-control" >
                </div>
              </div>
              <!--/span-->
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Nama Guru</label>
                  <input type="text" name="nama_guru" value="<?php echo $item->nama_guru ?>" class="form-control " >
                </div>
              </div>
              <!--/span-->
            </div>
            <!--/row-->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group ">
                  <label class="control-label">Jenis Kelamin</label>
                  <select name="jenis_kelamin"class="form-control custom-select">
                    <option value="">--Pilih--</option>
                    <option value="Laki-laki"<?php if($item['jenis_kelamin']=='Laki-laki'){echo "Selected";} ?>>Laki-laki</option>
                    <option value="Perempuan"<?php if($item['jenis_kelamin']=='Perempuan'){echo "Selected";} ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Tempat Lahir</label>
                  <input name="tempat_lahir"type="text" class="form-control" value="<?php echo $item->tempat_lahir ?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Tanggal Lahir</label>
                  <input name="tanggal_lahir" type="date" class="form-control" placeholder="dd/mm/yyyy"value="<?php echo $item->tanggal_lahir ?>">
                </div>
              </div>
              <!--/span-->
            </div>
            <!--/row-->

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">NIK</label>
                  <input name="nik"type="text" class="form-control"value="<?php echo $item->nik ?>" >
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">NUPTK</label>
                  <input name="nuptk"type="text" class="form-control"value="<?php echo $item->nuptk ?>" >
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Agama</label>
                  <select name="agama" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                    <option value="">--Pilih--</option>
                    <option value="Islam"<?php if($item['agama']==['Islam']){echo 'Selected';} ?>>Islam</option>
                    <option value="Kristen"<?php if($item['agama']==['Kristen']){echo 'Selected';} ?>>Kristen</option>
                    <option value="Katolik<?php if($item['agama']==['Katolik']){echo 'Selected';} ?>">Katolik</option>
                    <option value="Kong hu chu"<?php if($item['agama']==['Kong hu chu']){echo 'Selected';} ?>>Konghuchu</option>
                    <option value="Hindu"<?php if($item['agama']==['Hindu']){echo 'Selected';} ?>>Hindu</option>
                    <option value="Budha"<?php if($item['agama']==['Budha']){echo 'Selected';} ?>>Budha</option>
                  </select>
                </div>
              </div>
              <!--/span-->

            </div>
            <!--/row-->
            <h3 class="box-title m-t-40">Informasi Alamat</h3>
            <hr>
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label>Alamat Lengkap</label>
                  <input type="text" name="alamat_jalan"class="form-control"value="<?php echo $item->alamat_jalan ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>RT</label>
                  <input type="text"name="rt" class="form-control"value="<?php echo $item->rt ?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>RW</label>
                  <input type="text"name="rw" class="form-control"value="<?php echo $item->rw ?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama Dusun</label>
                  <input type="text"name="nama_dusun" class="form-control"value="<?php echo $item->nama_dusun ?>">
                </div>
              </div>

              <!--/span-->
            </div>
            <!--/row-->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama Desa</label>
                  <input type="text" name="desa_kelurahan" class="form-control"value="<?php echo $item->desa_kelurahan ?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama Kecamatan</label>
                  <input type="text"name="kecamatan" class="form-control"value="<?php echo $item->kecamatan ?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Kode Pos</label>
                  <input type="text"name="kode_pos" class="form-control"value="<?php echo $item->kode_pos ?>">
                </div>
              </div>
              <!--/span-->

            </div>
            <h3 class="box-title m-t-40">Informasi Kontak</h3>
            <hr>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text"name="telepon" class="form-control"value="<?php echo $item->telepon ?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>HP</label>
                  <input type="text" name="hp" class="form-control"value="<?php echo $item->hp?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control"value="<?php echo $item->email?>">
                </div>
              </div>

              <!--/span-->
            </div>
            <!--/row-->
            <h3 class="box-title m-t-40">Informasi Lainnya</h3>
            <hr>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>SK CPNS</label>
                  <input type="text" name="sk_cpns" class="form-control"value="<?php echo $item->sk_cpns?>">
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>NPWP</label>
                  <input type="text" name="npwp" class="form-control"value="<?php echo $item->npwp ?>">
                </div>
              </div>
              <!--/span-->

              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Kewarganegaraan</label>
                  <select name="kewarganegaraan" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                    <option value="">--Pilih--</option>
                    <option value="WNI"<?php if($item['kewarganegaraan']==['WNI']){echo 'Selected';} ?>>WNI</option>
                    <option value="WNA"<?php if($item['kewarganegaraan']==['WNA']){echo 'Selected';} ?>>WNA</option>
                  </select>
                </div>
              </div>
              <!--/span-->
            </div>
            <!--/row-->

          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
            <button type="button" class="btn btn-inverse">Cancel</button>
          </div>
        </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
