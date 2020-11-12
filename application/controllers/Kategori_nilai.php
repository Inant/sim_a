<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_nilai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_kategori_nilai");
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data["title"] = "Data Kategori Nilai";
    $data["kategori_nilai"] = $this->M_kategori_nilai->getKategoriNilai();
       $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/kategori_nilai/v_kategori_nilai',$data);
    $this->load->view('common/footer');
  }

  public function add()
  {

    $rules = array(
      array(
        'field'=>'nama_kategoriNilai',
        'label'=>'Nama Kategori Nilai',
        'rules'=>'required'
      ),

    );

    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==TRUE){
      // Input data ke data kategori_nilai
      $data =array(
        'nama_kategoriNilai' => $this->input->post('nama_kategoriNilai'),
      );
      $this->M_kategori_nilai->addKategoriNilai($data);

    }else{
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('Kategori_nilai');


  }
  function edit(){
    $id_kategoriNilai = $this->input->post('id');
    $data['kategori_nilai'] = $this->M_kategori_nilai->get1KategoriNilai(array('id_kategoriNilai' => $id_kategoriNilai));

    $this->load->view('admin/kategori_nilai/edit_kategori_nilai',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menkategori_nilaiin data terisi semua
    $rules = array(
      array(
        'field'=>'nama_kategoriNilai',
        'label'=>'Nama Kategori Nilai',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel KategoriNilai
      $where = array('id_kategoriNilai' => $this->input->post('id_kategoriNilai'));
      $data = array(
        'nama_kategoriNilai' => $this->input->post('nama_kategoriNilai'),
      );
      $this->M_kategori_nilai->updateKategoriNilai($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('Kategori_nilai');
  }

  function hapus($id){
    $where = array('id_kategoriNilai' => $id);
    $this->M_kategori_nilai->deleteKategoriNilai($where,'kategori_nilai');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('Kategori_nilai');
  }
}


?>
