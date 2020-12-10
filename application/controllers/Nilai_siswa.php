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
      $data['siswa'] = $this->db->query("SELECT nisn,nama_siswa FROM siswa WHERE id_kelasRombel = '$_GET[rombel]'")->result();
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

      $allSiswa = $_POST['nisn'];

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
          'nisn'=>$_POST['nisn'][$key],
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
    $id_nilai = $this->input->post('id');
    $data['nilai'] = $this->M_nilai->get1Absensi(array('id_nilai' => $id_nilai));
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['siswa']=$this->M_siswa->getSiswa();
    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('admin/absensi/editAbsensi',$data);
  }

  function update(){

    $id_absensi = $this->input->post('id_absensi',true);
    $data = array(
      'id_kelas'=>$this->input->post("id_kelas"),
      'id_rombel'=>$this->input->post("id_rombel"),
      'id_jadwalPelajaran'=>1,
      'nisn'=>$this->input->post("nisn"),
      'ket'=>$this->input->post("ket"),
      'tanggal_absen'=>$this->input->post("tanggal_absen"),
    );
    $where = array(
      'id_absensi' => $id_absensi,
    );
    $this->session->set_flashdata('message', 'Diubah !');
    $this->M_absensi->updateAbsensi($where, $data, 'absensi');
    redirect('Absensi');
  }

  public function rekap()
  {
    $data['title']="Rekap Nilai Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    // $data['mapel']=$this->M_mapel->getMapel();
    // $data['tahun_akademik']=$this->M_tahun->getTahun();
    // $data['kategori_nilai']=$this->M_kategori_nilai->getKategoriNilai();
    $data['siswa'] = $this->db->query("SELECT nisn,nama_siswa FROM siswa")->result();
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['nisn'])) {
      $data['nilai'] = $this->M_nilai->getNilai($_GET['nisn'], $_GET['rombel']);
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
