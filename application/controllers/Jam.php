<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jam extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_jam_kbm");
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data["title"] = "Data Jam Pelajaran";
    $data["jam_kbm"] = $this->M_jam_kbm->getJamPelajaran();
       $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/jam_kbm/v_jam',$data);
    $this->load->view('common/footer');
  }

  public function add()
  {

    $rules = array(
      array(
        'field'=>'hari',
        'label'=>'Hari',
        'rules'=>'required'
      ),
      array(
        'field'=>'jam',
        'label'=>'Jam Ke',
        'rules'=>'required'
      ),
      array(
        'field'=>'pukul',
        'label'=>'Pukul',
        'rules'=>'required'
      )

    );

    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==TRUE){
      // Input data ke data jam_kbm
      $data =array(
        'hari' => $this->input->post('hari'),
        'jam_ke' => $this->input->post('jam_ke'),
        'pukul_dari' => $this->input->post('pukul_dari'),
        'pukul_sampai' => $this->input->post('pukul_sampai')
      );
      $this->M_jam_kbm->addJamPelajaran($data);

    }else{
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('jam');


  }
  function edit(){
    $id_jamPelajaran = $this->input->post('id');
    $data['jam_kbm'] = $this->M_jam_kbm->get1JamPelajaran(array('id_jamPelajaran' => $id_jamPelajaran));

    $this->load->view('admin/jam_kbm/edit_jam',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menjamin data terisi semua
    $rules = array(
      array(
        'field'=>'hari',
        'label'=>'Hari',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel JamPelajaran
      $where = array('id_jamPelajaran' => $this->input->post('id_jamPelajaran'));
      $data = array(
        'hari' => $this->input->post('hari'),
        'jam_ke' => $this->input->post('jam_ke'),
        'pukul_dari' => $this->input->post('pukul_dari'),
        'pukul_sampai' => $this->input->post('pukul_sampai')
      );
      $this->M_jam_kbm->updateJamPelajaran($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('jam');
  }

  function hapus($id){
    $where = array('id_jamPelajaran' => $id);
    $this->M_jam_kbm->hapus_data($where,'jam_pelajaran');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('jam');
  }
}


?>
