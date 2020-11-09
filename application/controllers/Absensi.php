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
    // $this->load->model('M_jadwal_pelajaran');
  }
  public function index()
  {
    $data['title']="Input Absensi Siswa";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    $data['kelas']=$this->M_kelas->getKelas();
    $data['rombel']=$this->M_rombel->getJoinRombel();
    $data['mapel']=$this->M_mapel->getMapel();
    $data['siswa'] = '';
    if (isset($_GET['kelas']) && isset($_GET['rombel']) && isset($_GET['mapel']) && isset($_GET['tanggal'])) {
      $data['siswa'] = $this->db->query("SELECT nisn,nama_siswa FROM siswa WHERE id_rombel = '$_GET[rombel]'")->result();
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
          'id_jadwalPelajaran'=>1,
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
    $id_absensi = $this->input->post('id');
    $data['absensi'] = $this->M_absensi->get1Absensi(array('id_absensi' => $id_absensi));
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
      'id_kelasRombel'=>$this->input->post("id_kelasRombel"),
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

}
