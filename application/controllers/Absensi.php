<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_absensi');
    $this->load->model('M_kelas');
    $this->load->model('M_rombel');
    $this->load->model('M_siswa');
    $this->load->model('M_mapel');
    $this->load->model('M_tahun');
    // $this->load->model('M_jadwal_pelajaran');
  }
  public function index()
  {
    $data['title']="Input Absensi Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['mapel']=$this->M_mapel->getMapel();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    $data['siswa'] = '';
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['tanggal'])) {
      $data['siswa'] = $this->db->query("SELECT nisn,nama_siswa FROM siswa WHERE id_kelasRombel = '$_GET[rombel]'")->result();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/absensi/v_absensi',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'id_kelas',
      'label' => 'Kelas',
      'rules' => 'required'],
      ['field' => 'id_kelasRombel',
      'label' => 'Rombel',
      'rules' => 'required'],
      ['field' => 'id_mapel',
      'label' => 'Mata Pelajaran',
      'rules' => 'required'],
      // ['field' => 'id_jadwalPelajaran',
      // 'label' => 'Rombel',
      // 'rules' => 'required'],
      ['field' => 'tanggal_absen',
      'label' => 'Tanggal Absen',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){

      $allSiswa = $_POST['nisn'];
      $allAbsen = $_POST['ket'];

      foreach ($allSiswa as $key => $value) {
        $data=[
          'id_kelas'=>$this->input->post("id_kelas"),
          'id_kelasRombel'=>$this->input->post("id_kelasRombel"),
          'id_jadwalPelajaran'=>$this->input->post("id_mapel"),
          'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
          'nisn'=>$_POST['nisn'][$key],
          'ket'=>$_POST['ket'][$key],
          'tanggal_absen'=>$this->input->post("tanggal_absen"),
        ];
        $this->M_absensi->addAbsensi($data);
      }
      
      // echo "<pre>";
      // print_r ($_POST);
      // echo "</pre>";
      
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('Absensi');
  }
  function edit(){
    $data['title']="Edit Absensi Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['mapel']=$this->M_mapel->getMapel();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    $data['siswa'] = '';
    if (isset($_GET['tahun_akademik']) && isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['tanggal'])) {
      $data['absensi'] = $this->db->query("SELECT a.id_absensi, a.nisn,s.nama_siswa, a.ket FROM absensi a JOIN siswa s ON s.nisn = a.nisn WHERE a.id_kelasRombel = '$_GET[rombel]' AND a.id_kelas = '$_GET[kelas]' AND a.id_jadwalPelajaran = '$_GET[mapel]' AND a.id_tahun_akademik = '$_GET[tahun_akademik]' AND a.tanggal_absen = '$_GET[tanggal]'")->result();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/absensi/edit_absensi',$data);
    $this->load->view('common/footer');
  }

  function update(){

    $rules =[
      ['field' => 'id_kelas',
      'label' => 'Kelas',
      'rules' => 'required'],
      ['field' => 'id_kelasRombel',
      'label' => 'Rombel',
      'rules' => 'required'],
      ['field' => 'id_mapel',
      'label' => 'Mata Pelajaran',
      'rules' => 'required'],
      // ['field' => 'id_jadwalPelajaran',
      // 'label' => 'Rombel',
      // 'rules' => 'required'],
      ['field' => 'tanggal_absen',
      'label' => 'Tanggal Absen',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){

      // $allSiswa = $_POST['nisn'];
      // $allAbsen = $_POST['ket'];

      foreach ($_POST['id_absensi'] as $key => $value) {
        $id = ['id_absensi' => $_POST['id_absensi'][$key] ];
        $data=[
          // 'id_kelas'=>$this->input->post("id_kelas"),
          // 'id_kelasRombel'=>$this->input->post("id_kelasRombel"),
          // 'id_jadwalPelajaran'=>$this->input->post("id_mapel"),
          // 'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
          // 'nisn'=>$_POST['nisn'][$key],
          'ket'=>$_POST['ket'][$key],
          // 'tanggal_absen'=>$this->input->post("tanggal_absen"),
        ];
        $this->M_absensi->updateAbsensi($id, $data);
        
        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";
        // echo "<pre>";
        // print_r ($id);
        // echo "</pre>";
        
      }
      
      // echo "<pre>";
      // print_r ($_POST);
      // echo "</pre>";
      
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil diperbarui.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal diperbarui!!<br>".$gagal."</div>");
    }
    redirect('Absensi');
  }

  public function rekap()
  {
    $data['title']="Rekap Absensi Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['mapel']=$this->M_mapel->getMapel();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel'])) {
      $data['jumlah_pertemuan'] = $this->db->query("SELECT count(id_absensi) jumlah_pertemuan FROM absensi WHERE id_kelas = '$_GET[kelas]' AND id_kelasRombel = '$_GET[rombel]' AND id_jadwalPelajaran = '$_GET[mapel]' AND id_tahun_akademik = '$_GET[tahun_akademik]' GROUP BY nisn")->result();
      if ($data['jumlah_pertemuan']) {
        $data['jumlah_pertemuan'] = $data['jumlah_pertemuan'][0]->jumlah_pertemuan;
      }
      else {
        $data['jumlah_pertemuan'] = 0;
      }

      $data['siswa'] = $this->db->query("SELECT a.nisn, s.nama_siswa FROM absensi a JOIN siswa s ON a.nisn = s.nisn WHERE a.id_kelas = '$_GET[kelas]' AND a.id_kelasRombel = '$_GET[rombel]' AND a.id_jadwalPelajaran = '$_GET[mapel]' AND a.id_tahun_akademik = '$_GET[tahun_akademik]' GROUP BY a.nisn")->result();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/absensi/rekap_absensi',$data);
    $this->load->view('common/footer');
  }

}
