<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_mapel');
  }
  public function index()
  {
    $data['title']="Data Mapel";
    $data['mapel']=$this->M_mapel->getMapel();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/mapel/v_mapel',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'nama_mapel',
      'label' => 'Nama Mapel',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $data=[
        'nama_mapel'=>$this->input->post("nama_mapel")
      ];
      $this->M_mapel->addMapel($data);
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('mapel');
  }
  function edit(){
    $id_mapel = $this->input->post('id');
    $data['mapel'] = $this->M_mapel->get1Mapel(array('id_mapel' => $id_mapel));

    $this->load->view('admin/mapel/editMapel',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menjamin data terisi semua
    $rules = array(
      array(
        'field'=>'nama_mapel',
        'label'=>'Nama Mapel',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel Mapel
      $where = array('id_mapel' => $this->input->post('id_mapel'));
      $data = array(
        'nama_mapel' => $this->input->post('nama_mapel')
      );
      $this->M_mapel->updateMapel($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('mapel');
  }

}
