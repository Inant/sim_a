<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_spp extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_kelas');
    $this->load->model('M_rombel');
    $this->load->model('M_siswa');
    $this->load->model('M_tahun');
    $this->load->model('M_spp');
    $this->load->model('M_pembayaran_spp');
  }
  public function index()
  {
    $data['title']="Pembayaran SPP";
    
    // $data['kelas']=$this->M_kelas->getKelas();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    // $data['siswa'] = '';
    if (isset($_GET['nisn']) && isset($_GET['tahun_akademik'])) {
      $bulanTerbayar = $this->db->query("SELECT bulan FROM detail_pembayaran_spp d JOIN pembayaran_spp p ON p.kode_pembayaran_spp = d.kode_pembayaran_spp WHERE p.nisn = '$_GET[nisn]' AND p.id_tahun_akademik = '$_GET[tahun_akademik]' ")->result_array();
      $data['telahTerbayar'] = array();
      foreach ($bulanTerbayar as $key => $value) {
        array_push($data['telahTerbayar'], $value['bulan']);
      }
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/pembayaran_spp/v_pembayaran_spp',$data);
    $this->load->view('common/footer');

  }

  public function get_spp()
  {
    $nisn = $_GET['nisn'];

    $data = $this->db->query("SELECT s.nama_siswa, s.beasiswa, sp.id_spp, sp.nominal FROM siswa s JOIN kelas_rombel r ON r.id_kelasRombel = s.id_kelasRombel JOIN kelas k ON k.id_kelas = r.id_kelas JOIN spp sp ON sp.id_kelas = k.id_kelas WHERE s.nisn = '$nisn'")->result_array();

    echo json_encode($data[0]);
  }

  function add(){
    $rules =[
      ['field' => 'nisn',
      'label' => 'NISN',
      'rules' => 'required'],

      ['field' => 'id_tahun_akademik',
      'label' => 'Tahun Akademik',
      'rules' => 'required'],
      
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){

      $pembayaran_spp = array(
        'kode_pembayaran_spp' => 3,
        'nisn' => $_POST['nisn'],
        'id_spp' => $_POST['id_spp'],
        'id_tahun_akademik' => $_POST['id_tahun_akademik'],
        'tanggal' => $_POST['tanggal'],
        'total' => $_POST['total'],
        'bayar' => $_POST['bayar'],
      );

      $this->M_pembayaran_spp->insert('pembayaran_spp', $pembayaran_spp);

      $bulan = $_POST['bulan'];

      foreach ($bulan as $key => $value) {
        $data=[
          'kode_pembayaran_spp' => 3,
          'bulan' => $_POST['bulan'][$key],
          'nominal' => $_POST['total'] / count($bulan)
        ];
        $this->M_pembayaran_spp->insert('detail_pembayaran_spp',$data);
      }
      
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('Pembayaran_spp');
  }

  public function pembayaranPerSiswa()
  {
    $data['title']="List Pembayaran SPP Per Siswa";
    
    // $data['kelas']=$this->M_kelas->getKelas();
    $data['tahun_akademik']=$this->M_tahun->getTahun();
    // $data['siswa'] = '';
    if (isset($_GET['nisn']) && isset($_GET['tahun_akademik'])) {
      $data['listPembayaran'] = $this->db->query("SELECT * FROM pembayaran_spp WHERE nisn = '$_GET[nisn]' AND id_tahun_akademik = '$_GET[tahun_akademik]' ")->result_array();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/pembayaran_spp/list_pembayaran_per_siswa',$data);
    $this->load->view('common/footer');
  }

  function edit($kode){
    $data['title']="Edit Pembayaran SPP";
    
    // $data['kelas']=$this->M_kelas->getKelas();
    $data['pembayaran'] = $this->db->query("SELECT * FROM pembayaran_spp WHERE kode_pembayaran_spp = '$kode' ")->result_array()[0];
    
    $nisn = $data['pembayaran']['nisn'];
    $idSpp = $data['pembayaran']['id_spp'];

    $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE nisn = '$nisn'")->result_array()[0];

    $data['nominalSpp'] = $this->db->query("SELECT nominal FROM spp WHERE id_spp = '$idSpp'")->result_array()[0];

    $bulanTerbayar = $this->db->query("SELECT bulan FROM detail_pembayaran_spp WHERE kode_pembayaran_spp = '$kode'")->result_array();
    $data['telahTerbayar'] = array();
    foreach ($bulanTerbayar as $value) {
      array_push($data['telahTerbayar'], $value['bulan']);
    }

    // $nisn = $data['pembayaran']['nisn'];

    $terbayarDisable = $this->db->query("SELECT d.bulan FROM detail_pembayaran_spp d JOIN pembayaran_spp p ON p.kode_pembayaran_spp = d.kode_pembayaran_spp WHERE d.kode_pembayaran_spp != '$kode' AND p.nisn = '$nisn' ")->result_array();
    $data['terbayarDisable'] = array();

    foreach ($terbayarDisable as $value) {
      array_push($data['terbayarDisable'], $value['bulan']);
    }
    

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/pembayaran_spp/edit_pembayaran_spp',$data);
    $this->load->view('common/footer');
  }

  function update(){
    $rules =[
      ['field' => 'nisn',
      'label' => 'NISN',
      'rules' => 'required'],
      
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $kode = $_POST['kode_pembayaran_spp'];

      $pembayaran_spp = array(
        // 'kode_pembayaran_spp' => 3,
        // 'nisn' => $_POST['nisn'],
        // 'id_spp' => $_POST['id_spp'],
        // 'id_tahun_akademik' => $_POST['id_tahun_akademik'],
        'tanggal' => $_POST['tanggal'],
        'total' => $_POST['total'],
        'bayar' => $_POST['bayar'],
      );

      $this->M_pembayaran_spp->update(['kode_pembayaran_spp' => $kode], $pembayaran_spp, 'pembayaran_spp');

      $bulan = $_POST['bulan'];

      $this->M_pembayaran_spp->delete('detail_pembayaran_spp',['kode_pembayaran_spp' => $kode]);

      foreach ($bulan as $key => $value) {
        $data=[
          'kode_pembayaran_spp' => $kode,
          'bulan' => $_POST['bulan'][$key],
          'nominal' => $_POST['total'] / count($bulan)
        ];
        $this->M_pembayaran_spp->insert('detail_pembayaran_spp',$data);
      }
      
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('Pembayaran_spp');
  }

  public function laporan()
  {
    $data['title']="Laporan Pembayaran SPP";
    // $data['absensi']=$this->M_absensi->getAbsensi();
    // $data['kelas']=$this->M_kelas->getKelas();
    // $data['rombel']=$this->M_rombel->getJoinRombel();
    // $data['mapel']=$this->M_mapel->getMapel();
    // $data['tahun_akademik']=$this->M_tahun->getTahun();
    // $data['kategori_nilai']=$this->M_kategori_nilai->getKategoriNilai();
    // $data['siswa'] = $this->db->query("SELECT nisn,nama_siswa FROM siswa")->result();
    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
      $data['laporan'] = $this->db->query("SELECT p.nisn, s.nama_siswa, p.tanggal, p.total FROM pembayaran_spp p JOIN siswa s ON s.nisn = p.nisn WHERE p.tanggal BETWEEN '$_GET[dari]' AND '$_GET[sampai]'")->result_array();
    }

    // $data['jadwalPelajaran']=$this->M_jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/pembayaran_spp/laporan_pembayaran_spp',$data);
    $this->load->view('common/footer');
  }

}
