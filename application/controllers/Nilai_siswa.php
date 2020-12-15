<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_nilai');
    $this->load->model('M_kategori_nilai');
    $this->load->model('M_kelas');
    $this->load->model('M_rombel');
    $this->load->model('M_siswa');
    $this->load->model('M_mapel');
    $this->load->model('M_tahun');
    // $this->load->model('M_jadwal_pelajaran');
  }
  public function index()
  {
    $data['title']="Input Nilai Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['mapel']=$this->M_mapel->getMapel();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    $data['kategori_nilai']=$this->M_kategori_nilai->getKategoriNilai();
    $data['siswa'] = '';
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['kategori_nilai'])) {
      $data['siswa'] = $this->db->query("SELECT nis,nama_siswa FROM siswa WHERE id_kelasRombel = '$_GET[rombel]'")->result();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/nilai_siswa/v_nilai_siswa',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'id_kelas',
      'label' => 'Kelas',
      'rules' => 'required'],
      ['field' => 'id_rombel',
      'label' => 'Rombel',
      'rules' => 'required'],
      ['field' => 'id_mapel',
      'label' => 'Mata Pelajaran',
      'rules' => 'required'],
      ['field' => 'id_kategoriNilai',
      'label' => 'Kategori Nilai',
      'rules' => 'required'],
      ['field' => 'id_tahunAkademik',
      'label' => 'Kategori Nilai',
      'rules' => 'required'],
      // ['field' => 'id_jadwalPelajaran',
      // 'label' => 'Rombel',
      // 'rules' => 'required'],
      
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){

      $allSiswa = $_POST['nis'];

      foreach ($allSiswa as $key => $value) {
        $ket = '';
        if ($_POST['nilai'][$key] <= 100 && $_POST['nilai'][$key] >= 95) {
          $ket = 'Sangat Bagus, Pertahankan';
        }
        else if ($_POST['nilai'][$key] <= 94 && $_POST['nilai'][$key] >= 80) {
          $ket = 'Bagus, dan lebih semangat belajar';
        }
        else if ($_POST['nilai'][$key] <= 79 && $_POST['nilai'][$key] >= 70) {
          $ket = 'Cukup, belajar lebih giat lagi';
        }
        else if ($_POST['nilai'][$key] <= 69 && $_POST['nilai'][$key] >= 0) {
          $ket = 'Kurang, belajar lebih giat lagi';
        }
        $data=[
          'id_rombel'=>$this->input->post("id_rombel"),
          'nis'=>$_POST['nis'][$key],
          'id_mapel'=>$this->input->post("id_mapel"),
          'id_tahunAkademik'=>$this->input->post("id_tahunAkademik"),
          'nilai'=>$_POST['nilai'][$key],
          'id_kategoriNilai'=>$this->input->post("id_kategoriNilai"),
          'ket'=>$ket,
        ];
        $this->M_nilai->addNilai($data);
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
    redirect('Nilai_siswa');
  }
  function edit(){
    $data['title']="Edit Nilai Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['mapel']=$this->M_mapel->getMapel();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    $data['kategori_nilai']=$this->M_kategori_nilai->getKategoriNilai();
    $data['siswa'] = '';
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['kategori_nilai'])) {
      $data['nilai'] = $this->db->query("SELECT DISTINCT n.*,s.nama_siswa FROM nilai n JOIN siswa s ON s.nis = n.nis WHERE n.id_rombel = '$_GET[rombel]' AND id_mapel ='$_GET[mapel]' AND id_tahunAkademik = '$_GET[tahun_akademik]' AND id_kategoriNilai = '$_GET[kategori_nilai]'")->result();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/nilai_siswa/edit_nilai_siswa',$data);
    $this->load->view('common/footer');
  }

  function update(){

    $rules =[
      ['field' => 'id_kelas',
      'label' => 'Kelas',
      'rules' => 'required'],
      ['field' => 'id_rombel',
      'label' => 'Rombel',
      'rules' => 'required'],
      ['field' => 'id_mapel',
      'label' => 'Mata Pelajaran',
      'rules' => 'required'],
      ['field' => 'id_kategoriNilai',
      'label' => 'Kategori Nilai',
      'rules' => 'required'],
      ['field' => 'id_tahunAkademik',
      'label' => 'Kategori Nilai',
      'rules' => 'required'],
      // ['field' => 'id_jadwalPelajaran',
      // 'label' => 'Rombel',
      // 'rules' => 'required'],
      
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){

      $allNilai = $_POST['id_nilai'];

      foreach ($allNilai as $key => $value) {
        $where = ['id_nilai' => $_POST['id_nilai'][$key]];

        $ket = '';
        if ($_POST['nilai'][$key] <= 100 && $_POST['nilai'][$key] >= 95) {
          $ket = 'Sangat Bagus, Pertahankan';
        }
        else if ($_POST['nilai'][$key] <= 94 && $_POST['nilai'][$key] >= 80) {
          $ket = 'Bagus, dan lebih semangat belajar';
        }
        else if ($_POST['nilai'][$key] <= 79 && $_POST['nilai'][$key] >= 70) {
          $ket = 'Cukup, belajar lebih giat lagi';
        }
        else if ($_POST['nilai'][$key] <= 69 && $_POST['nilai'][$key] >= 0) {
          $ket = 'Kurang, belajar lebih giat lagi';
        }
        $data=[
          // 'id_rombel'=>$this->input->post("id_rombel"),
          // 'nis'=>$_POST['nis'][$key],
          // 'id_mapel'=>$this->input->post("id_mapel"),
          // 'id_tahunAkademik'=>$this->input->post("id_tahunAkademik"),
          'nilai'=>$_POST['nilai'][$key],
          // 'id_kategoriNilai'=>$this->input->post("id_kategoriNilai"),
          'ket'=>$ket,
        ];
        $this->M_nilai->updateNilai($where, $data, 'nilai');
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
    redirect('Nilai_siswa');
  }

  public function rekap()
  {
    $data['title']="Rekap Nilai Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    // $data['mapel']=$this->M_mapel->getMapel();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    // $data['kategori_nilai']=$this->M_kategori_nilai->getKategoriNilai();
    $data['siswa'] = $this->db->query("SELECT nis,nama_siswa FROM siswa")->result();
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['nis'])) {
      $data['nilai'] = $this->M_nilai->getNilai($_GET['nis'], $_GET['rombel'], $_GET['tahun_akademik']);
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/nilai_siswa/rekap_nilai_siswa',$data);
    $this->load->view('common/footer');
  }

}
