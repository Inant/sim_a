<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok_mapel extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_kelompok_mapel');
  }
  public function index()
  {
    $data['title']="Data Kelompok Mapel";
    $data['kelompok_mapel']=$this->M_kelompok_mapel->getKelompokMapel();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/kelompok_mapel/v_kelompok_mapel',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'nama_kelompok_mapel',
      'label' => 'Nama Kelompok Mapel',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $data=[
        'nama_kelompok_mapel'=>$this->input->post("nama_kelompok_mapel")
      ];
      $this->M_kelompok_mapel->addKelompokMapel($data);
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('Kelompok_mapel');
  }
  function edit(){
    $id_kelompok_mapel = $this->input->post('id');
    $data['kelompok_mapel'] = $this->M_kelompok_mapel->get1KelompokMapel(array('id_kelompok_mapel' => $id_kelompok_mapel));

    $this->load->view('admin/kelompok_mapel/editKelompokMapel',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menjamin data terisi semua
    $rules = array(
      array(
        'field'=>'nama_kelompok_mapel',
        'label'=>'Nama Kelompok Mapel',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel KelompokMapel
      $where = array('id_kelompok_mapel' => $this->input->post('id_kelompok_mapel'));
      $data = array(
        'nama_kelompok_mapel' => $this->input->post('nama_kelompok_mapel')
      );
      $this->M_kelompok_mapel->updateKelompokMapel($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('Kelompok_mapel');
  }

  function hapus($id){
    $where = array('id_kelompok_mapel' => $id);
    $this->M_kelompok_mapel->deleteKelompokMapel($where,'kelompok_mapel');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('Kelompok_mapel');
  }

}
