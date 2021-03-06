<!-- sidebar -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <!-- <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Prof. Mark</span></a>
        <ul aria-expanded="false" class="collapse">
        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </li> -->
    <li class="nav-small-cap">--- Pendaftaran</li>

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-graduation-cap"></i><span class="hide-menu">PPDB</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="university-students.html">All Students</a></li>
        <li><a href="university-add-student.html">Add Student</a></li>
        <li><a href="university-edit-student.html">Edit Student</a></li>
        <li><a href="university-student-profile.html">Student Profile</a></li>
      </ul>
    </li>

    <li class="nav-small-cap">--- Data Master</li>
    <li> <a class="waves-effect waves-dark" href="index.html"><i class="mdi mdi-cast-connected"></i><span class="hide-menu">Dashboard</span></a>
    </li>
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-fridge"></i><span class="hide-menu">Data Master</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="<?php echo base_url()."identitas_sekolah" ?>">Identitas Sekolah</a></li>
        <li><a href="<?php echo base_url()."bidang_keahlian";?>">Data Bidang Keahlian</a></li>
        <li><a href="<?php echo base_url()."jurusan";?>">Data Jurusan</a></li>
        <li><a href="<?php echo base_url()."kelas";?>">Data Kelas</a></li>
        <li><a href="<?php echo base_url()."ruangan";?>">Data Ruangan</a></li>
        <li><a href="<?php echo base_url()."kurikulum" ?>">Data Kurikulum</a></li>
        <li><a href="<?php echo base_url()."Kelompok_mapel";?>">Data Kelompok Mapel</a></li>
        <li><a href="<?php echo base_url()."mapel";?>">Data Mata Pelajaran</a></li>
        <li><a href="<?php echo base_url()."nilai_kkm";?>">Data Nilai KKM</a></li>
        <li><a href="<?php echo base_url()."jam" ?>">Data Jam KBM</a></li>
        <li><a href="<?php echo base_url()."spp" ?>">Data Spp</a></li>
        <li><a href="<?php echo base_url()."tanggungan" ?>">Data Tanggungan</a></li>
        <li><a href="<?php echo base_url()."tahun" ?>">Data Tahun Akademik</a></li>
        <li><a href="<?php echo base_url()."kategori_nilai" ?>">Data Kategori Nilai</a></li>
      </ul>
    </li>

    <li class="nav-small-cap">--- Akademik</li>
    <li> <a class="waves-effect waves-dark" href="<?php echo base_url()."kelas_rombel" ?>"><i class="fa fa-institution"></i><span class="hide-menu">Kelas (Rombel)</span></a>
    </li>

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-graduation-cap"></i><span class="hide-menu">Data Siswa</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="university-students.html">All Students</a></li>
        <li><a href="university-add-student.html">Add Student</a></li>
        <li><a href="university-edit-student.html">Edit Student</a></li>
        <li><a href="university-student-profile.html">Student Profile</a></li>
      </ul>
    </li>
    <li> <a href="<?php echo base_url()."guru" ?>"class=" waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Data Guru</span></a>

    </li>
    <li> <a href="<?php echo base_url()."walikelas" ?>"class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">Data Wali Kelas</span></a>

    </li>
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Jadwal MaPel</span></a></li>
      <ul aria-expanded="false" class="collapse">
        <li><a href="university-courses.html">All Courses</a></li>
        <li><a href="university-add-course.html">Add Course</a></li>
        <li><a href="university-edit-course.html">Edit Course</a></li>
        <li><a href="university-course-info.html">Course Information</a></li>
      </ul>
    </li>

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-note"></i><span class="hide-menu">Absensi</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="<?php echo base_url()."Absensi" ?>">Input Absensi</a></li>
        <li><a href="<?php echo base_url()."Absensi/edit" ?>">Edit Absensi</a></li>
        <li><a href="<?php echo base_url()."Absensi/rekap" ?>">Rekap Absensi</a></li>
      </ul>
    </li>
    
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-note"></i><span class="hide-menu">Nilai Siswa</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="<?php echo base_url()."Nilai_siswa" ?>">Input Nilai Siswa</a></li>
        <li><a href="<?php echo base_url()."Nilai_siswa/edit" ?>">Edit Nilai Siswa</a></li>
        <li><a href="<?php echo base_url()."Nilai_siswa/rekap" ?>">Rekap Nilai Siswa</a></li>
      </ul>
    </li>

    <!-- <li> <a href="<?php echo base_url()."Absensi" ?>"class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-note"></i><span class="hide-menu">Absensi</span></a></li> -->

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Rapot</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="university-departments.html">Departments</a></li>
        <li><a href="university-add-department.html">Add Department</a></li>
        <li><a href="university-edit-department.html">Edit Department</a></li>
      </ul>
    </li>

    <li class="nav-small-cap">--- Keuangan</li>
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">SPP</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="<?php echo base_url(). 'Pembayaran_spp' ?>">Pembayaran SPP</a></li>
        <li><a href="<?php echo base_url(). 'Pembayaran_spp/pembayaranPerSiswa' ?>">Edit Pembayaran SPP</a></li>
        <li><a href="<?php echo base_url(). 'Pembayaran_spp/laporan' ?>">Laporan Pembayaran SPP</a></li>
      </ul>
    </li>
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">Tanggungan</span></a>
      <ul aria-expanded="false" class="collapse">
        <li><a href="table-basic.html">Basic Tables</a></li>
        <li><a href="table-layout.html">Table Layouts</a></li>
        <li><a href="table-data-table.html">Data Tables</a></li>
        <li><a href="table-footable.html">Footable</a></li>
        <li><a href="table-jsgrid.html">Js Grid Table</a></li>
        <li><a href="table-responsive.html">Responsive Table</a></li>
        <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
        <li><a href="table-editable-table.html">Editable Table</a></li>
      </ul>
    </li>

  </ul>
</nav>
<!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>
<!-- end Sidebar -->
