<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_sekolah extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_identitas_sekolah');
  }
  public function index()
  {
    $data['title']="Identitas Sekolah";
    $data['identitas_sekolah']=$this->M_identitas_sekolah->getIdentitas_sekolah()->row_array();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/sekolah/v_sekolah',$data);
    $this->load->view('common/footer');
  }

  public function edit($id_sekolahInfo)
  {
    $where = array('id_sekolahInfo' => $id_sekolahInfo);
    $data['identitas_sekolah'] = $this->M_identitas_sekolah->edit_data($where, 'sekolah_info')->row_array();
    $this->form_validation->set_rules('nama_sekolah','Nama sekolah_info','required');
    if($this->form_validation->run() == FALSE )
    {
    $data['title']="Identitas Sekolah";
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/sekolah/edit_sekolah',$data);
    $this->load->view('common/footer');
    }else{
      $this->update();
    }
  }

  public function update()
  {
    $id_sekolahInfo = $this->input->post('id_sekolahInfo',true);
    $nama_sekolah = $this->input->post('nama_sekolah',true);
    $npsn = $this->input->post('npsn',true);
    $nss = $this->input->post('nss',true);
    $alamat = $this->input->post('alamat',true);
    $provinsi = $this->input->post('provinsi',true);
    $kabupaten = $this->input->post('kabupaten',true);
    $kecamatan = $this->input->post('kecamatan',true);
    $kodePos = $this->input->post('kodePos',true);
    $noTelp = $this->input->post('noTelp',true);
    $website = $this->input->post('website',true);
    $email = $this->input->post('email',true);
    $data= array(
        'id_sekolahInfo'=>$id_sekolahInfo,
        'nama_sekolah'=>$nama_sekolah,
        'npsn'=>$npsn,
        'nss'=>$nss,
        'alamat'=>$alamat,
        'provinsi'=>$provinsi,
        'kabupaten'=>$kabupaten,
        'kecamatan'=>$kecamatan,
        'kodePos'=>$kodePos,
        'noTelp'=>$noTelp,
        'website'=>$website,
        'email'=>$email
    );
    $where = array(

      'id_sekolahInfo' => $id_sekolahInfo,

    );
    $this->session->set_flashdata('message', 'Diubah !');
    $this->M_identitas_sekolah->update_data($where, $data, 'sekolah_info');
    redirect('identitas_sekolah');
  }


}
