<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_walikelas');

  }

  public function index(){
    $data['guru']= $this->M_walikelas->getGuru();
    $data['tahun']= $this->M_walikelas->getTahun();
    $data['rombel']= $this->M_walikelas->getRombel();
    $data['title']= "Walikelas";
    $data['walikelas']= $this->M_walikelas->getJoinWalikelas();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/walikelas/v_walikelas',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $data=[
      'id_waliKelas'=>$this->input->post("id_waliKelas"),
      'nip'=>$this->input->post("nip"),
      'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
      'id_kelasRombel'=>$this->input->post("id_kelasRombel")
    ];
    $this->M_walikelas->input_data($data, 'wali_kelas');
    $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");
    redirect('walikelas');
  }
  function edit(){
    $data['id'] = $this->input->post('id_waliKelas');
    $where = array(
      'id_waliKelas' => $this->input->post('id_waliKelas')
    );
    $data['walikelas'] = $this->M_walikelas->edit_data($where);
    $data['guru']= $this->M_walikelas->getGuru();
    $data['tahun']= $this->M_walikelas->getTahun();
    $data['rombel']= $this->M_walikelas->getRombel();
    $this->load->view('admin/walikelas/edit_walikelas',$data);

  }

  public function update()  {

      $where = array('id_waliKelas' => $this->input->post('id_waliKelas'));
      $data = array(
        'id_waliKelas'=>$this->input->post("id_waliKelas"),
        'nip'=>$this->input->post("nip"),
        'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
        'id_kelasRombel'=>$this->input->post("id_kelasRombel")
      );
      $this->M_walikelas->updateWalikelas($where, $data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    redirect('walikelas');
  }





}
