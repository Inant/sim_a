<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_keahlian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_bidang_keahlian");
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data["title"] = "Data bidang_keahlian Pelajaran";
    $data["bidang_keahlian"] = $this->M_bidang_keahlian->getBidangKeahlian();
       $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/bidang_keahlian/v_bidang_keahlian',$data);
    $this->load->view('common/footer');
  }

  public function add()
  {

    $rules = array(
      array(
        'field'=>'nama_bidang_keahlian',
        'label'=>'Nama Bidang Keahlian',
        'rules'=>'required'
      ),

    );

    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==TRUE){
      // Input data ke data bidang_keahlian
      $data =array(
        'nama_bidang_keahlian' => $this->input->post('nama_bidang_keahlian'),
      );
      $this->M_bidang_keahlian->addBidangKeahlian($data);

    }else{
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('bidang_keahlian');


  }
  function edit(){
    $id_bidang_keahlian = $this->input->post('id');
    $data['bidang_keahlian'] = $this->M_bidang_keahlian->get1BidangKeahlian(array('id_bidang_keahlian' => $id_bidang_keahlian));

    $this->load->view('admin/bidang_keahlian/edit_bidang_keahlian',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menbidang_keahlianin data terisi semua
    $rules = array(
      array(
        'field'=>'nama_bidang_keahlian',
        'label'=>'Nama Bidang Keahlian',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel BidangKeahlian
      $where = array('id_bidang_keahlian' => $this->input->post('id_bidang_keahlian'));
      $data = array(
        'nama_bidang_keahlian' => $this->input->post('nama_bidang_keahlian'),
      );
      $this->M_bidang_keahlian->updateBidangKeahlian($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('bidang_keahlian');
  }

  function hapus($id){
    $where = array('id_bidang_keahlian' => $id);
    $this->M_bidang_keahlian->deleteBidangKeahlian($where,'bidang_keahlian');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('bidang_keahlian');
  }
}


?>
