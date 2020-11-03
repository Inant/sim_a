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
          <a href="<?= base_url() ?>guru/add" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Data</a>
        <hr>
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered" width="100%" cellspacing="0">

            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($guru as $item) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $item->nip ?></td>
                  <td><?= $item->nama_guru ?></td>
                  <td><?= $item->alamat_jalan ?></td>
                  <td><?= $item->email ?></td>
                  <td><?= $item->hp ?></td>

                  <td style="text-align: center;">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-outline-info dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        Pilih
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" ><i class="mdi mdi-account-key"></i>  Aktivasi Akun</a>
                        <a class="dropdown-item" ><i class="fa fa-eye"></i>  Detail</a>
                        <a href="<?php echo base_url() . 'guru/edit'; ?>/<?= $item->nip ?>"class="dropdown-item" ><i class="fa fa-pencil"></i>  Edit</a>
                        <a class="dropdown-item " ><i class="fa fa-gear"></i>  Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end content -->
