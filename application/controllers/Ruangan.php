<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_ruangan');
  }
  public function index()
  {
    $data['title']="Data Ruangan";
    $data['ruangan']=$this->M_ruangan->getRuangan();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/ruangan/v_ruangan',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'nama_ruangan',
      'label' => 'Nama Ruangan',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $data=[
        'nama_ruangan'=>$this->input->post("nama_ruangan")
      ];
      $this->M_ruangan->addRuangan($data);
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('ruangan');
  }
  function edit(){
    $id_ruangan = $this->input->post('id');
    $data['ruangan'] = $this->M_ruangan->get1Ruangan(array('id_ruangan' => $id_ruangan));

    $this->load->view('admin/ruangan/editRuangan',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menjamin data terisi semua
    $rules = array(
      array(
        'field'=>'nama_ruangan',
        'label'=>'Nama Ruangan',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel Ruangan
      $where = array('id_ruangan' => $this->input->post('id_ruangan'));
      $data = array(
        'nama_ruangan' => $this->input->post('nama_ruangan')
      );
      $this->M_ruangan->updateRuangan($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('ruangan');
  }
  function hapus($id){
		$where = array('id_ruangan' => $id);
		$this->M_ruangan->hapus_data($where,'ruangan');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
		redirect('ruangan');
	}

}
