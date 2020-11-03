<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_jurusan');
    $this->load->model('M_bidang_keahlian');
  }
  public function index()
  {
    $data['title']="Data Jurusan";
    $data['jurusan']=$this->M_jurusan->getJurusan();
    $data['bidang_keahlian']=$this->M_bidang_keahlian->getBidangKeahlian();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/jurusan/v_jurusan',$data);
    $this->load->view('common/footer');

  }
  function add(){
    $rules =[
      ['field' => 'id_jurusan',
      'label' => 'Kode Jurusan',
      'rules' => 'required','max_length[5]'],
      ['field' => 'nama_jurusan',
      'label' => 'Nama Jurusan',
      'rules' => 'required'],
      ['field' => 'id_bidang_keahlian',
      'label' => 'Nama Bidang Keahlian',
      'rules' => 'required']
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $data=[
        'id_jurusan'=>$this->input->post("id_jurusan"),
        'id_bidang_keahlian'=>$this->input->post("id_bidang_keahlian"),
        'nama_jurusan'=>$this->input->post("nama_jurusan")
      ];
      $this->M_jurusan->addJurusan($data);
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('jurusan');
  }
  function edit(){
    $id_jurusan = $this->input->post('id');
    $data['jurusan'] = $this->M_jurusan->get1Jurusan(array('id_jurusan' => $id_jurusan));
    $data['bidang_keahlian']=$this->M_bidang_keahlian->getBidangKeahlian();
    $this->load->view('admin/jurusan/editJurusan',$data);
  }

  function update(){

    $id_jurusan = $this->input->post('id_jurusan',true);
    $id_bidang_keahlian = $this->input->post('id_bidang_keahlian',true);
    $nama_jurusan = $this->input->post('nama_jurusan',true);
    $data = array(
      'id_jurusan' => $id_jurusan,
      'id_bidang_keahlian' => $id_bidang_keahlian,
      'nama_jurusan' => $nama_jurusan,
    );
    $where = array(
      'id_jurusan' => $id_jurusan,
    );
    $this->session->set_flashdata('message', 'Diubah !');
    $this->M_jurusan->updateJurusan($where, $data, 'jurusan');
    redirect('jurusan');
  }

}
