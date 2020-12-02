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
        'kode_pembayaran_spp' => 2,
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
          'kode_pembayaran_spp' => 2,
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
