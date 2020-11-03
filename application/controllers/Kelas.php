<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_kelas');
  }
  public function index()
  {
    $data['title']="Data Kelas";
    $data['kelas']=$this->M_kelas->getKelas();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/kelas/v_kelas',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'nama_kelas',
      'label' => 'Nama Kelas',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $data=[
        'nama_kelas'=>$this->input->post("nama_kelas")
      ];
      $this->M_kelas->addKelas($data);
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('kelas');
  }
  function edit(){
    $id_kelas = $this->input->post('id');
    $data['kelas'] = $this->M_kelas->get1Kelas(array('id_kelas' => $id_kelas));

    $this->load->view('admin/kelas/editKelas',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Menjamin data terisi semua
    $rules = array(
      array(
        'field'=>'nama_kelas',
        'label'=>'Nama Kelas',
        'rules'=>'required'
      )

    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel Kelas
      $where = array('id_kelas' => $this->input->post('id_kelas'));
      $data = array(
        'nama_kelas' => $this->input->post('nama_kelas')
      );
      $this->M_kelas->updateKelas($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('kelas');
  }
  function hapus($id){
		$where = array('id_kelas' => $id);
		$this->M_kelas->deleteKelas($where,'kelas');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
		redirect('kelas');
	}

}
