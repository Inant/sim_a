<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_guru');
  }
  public function index()
  {
    $data['title']="Data Guru";
    $data['guru']=$this->M_guru->getGuru();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/guru/v_guru',$data);
    $this->load->view('common/footer');

  }
  public function add()
  {

    $this->form_validation->set_rules('nama_guru','Nama guru','required');
    if($this->form_validation->run() == FALSE )
    {
        $data['title']="Data Guru";
      $this->load->view('common/head');
      $this->load->view('common/topbar');
      $this->load->view('common/sidebar');
      $this->load->view('common/breadcrumb',$data);
      $this->load->view('admin/guru/input_guru');
      $this->load->view('common/footer');

    }else{

      $this->aksiAdd();
    }
  }
  public function aksiAdd(){

    $this->M_guru->input_data();
    $this->session->set_flashdata('message', 'Ditambahkan !');
    redirect('guru');
  }

  public function edit($nip)
  {
    $where = array('nip' => $nip);
    $data['guru'] = $this->M_guru->edit_data($where, 'guru')->result();
    $this->form_validation->set_rules('nama_guru','Nama guru','required');
    if($this->form_validation->run() == FALSE )
    {
    $data['title']="Data Guru";
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/guru/edit_guru');
    $this->load->view('common/footer');
    }else{
      $this->update();
    }
  }

  public function update()
  {
    $nip = $this->input->post('nip',true);
    $nama_guru = $this->input->post('nama_guru',true);
    $jenis_kelamin = $this->input->post('jenis_kelamin',true);
    $tempat_lahir = $this->input->post('tempat_lahir',true);
    $tanggal_lahir = $this->input->post('tanggal_lahir',true);
    $nik = $this->input->post('nik',true);
    $nuptk = $this->input->post('nuptk',true);
    $agama = $this->input->post('agama',true);
    $alamat_jalan = $this->input->post('alamat_jalan',true);
    $rt = $this->input->post('rt',true);
    $rw = $this->input->post('rw',true);
    $nama_dusun = $this->input->post('nama_dusun',true);
    $desa_kelurahan = $this->input->post('desa_kelurahan',true);
    $kecamatan = $this->input->post('kecamatan',true);
    $kode_pos = $this->input->post('kode_pos',true);
    $telepon = $this->input->post('telepon',true);
    $hp = $this->input->post('hp',true);
    $email = $this->input->post('email',true);
    $sk_cpns = $this->input->post('sk_cpns',true);
    $npwp = $this->input->post('npwp',true);
    $kewarganegaraan = $this->input->post('kewarganegaraan',true);
    $data= array(
        'nip'=>$nip,
        'nama_guru'=>$nama_guru,
        'jenis_kelamin'=>$jenis_kelamin,
        'tempat_lahir'=>$tempat_lahir,
        'tanggal_lahir'=>$tanggal_lahir,
        'nik'=>$nik,
        'nuptk'=>$nuptk,
        'agama'=>$agama,
        'alamat_jalan'=>$alamat_jalan,
        'rt'=>$rt,
        'rw'=>$rw,
        'nama_dusun'=>$nama_dusun,
        'desa_kelurahan'=>$desa_kelurahan,
        'kecamatan'=>$kecamatan,
        'kode_pos'=>$kode_pos,
        'telepon'=>$telepon,
        'hp'=>$hp,
        'email'=>$email,
        'sk_cpns'=>$sk_cpns,
        'npwp'=>$npwp,
        'kewarganegaraan'=>$kewarganegaraan
    );
    $where = array(

      'nip' => $nip,

    );
    $this->session->set_flashdata('message', 'Diubah !');
    $this->M_guru->update_data($where, $data, 'guru');
    redirect('guru');
  }

  function hapus($id){
    $where = array('id_guru' => $id);
    $this->M_guru->hapus_data($where,'guru');
    $this->session->set_flashdata('message', 'Dihapus !');

    redirect('guru');
  }
}


?>
