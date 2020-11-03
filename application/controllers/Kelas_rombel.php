<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_rombel extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_rombel');

  }

  public function index(){
    $data['kelas']= $this->M_rombel->getkelas();
    $data['jurusan']= $this->M_rombel->getjurusan();
    $data['title']= "Kelas Rombongan Belajar";
    $data['kelas_rombel']= $this->M_rombel->getJoinRombel();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/kelas_rombel/v_kelas_rombel',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $data=[
      'id_kelasRombel'=>$this->input->post("id_kelasRombel"),
      'id_kelas'=>$this->input->post("id_kelas"),
      'id_jurusan'=>$this->input->post("id_jurusan"),
      'nama_kelasRombel'=>$this->input->post("nama_kelasRombel")
    ];
    $this->M_rombel->input_data($data, 'kelas_rombel');
    $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");
    redirect('kelas_rombel');
  }
  function edit(){
    $data['id'] = $this->input->post('id_kelasRombel');
    $where = array(
      'id_kelasRombel' => $this->input->post('id_kelasRombel')
    );
    $data['kelas_rombel'] = $this->M_rombel->edit_data($where);
    $data['kelas'] = $this->M_rombel->getKelas();
    $data['jurusan'] = $this->M_rombel->getJurusan();
    $this->load->view('admin/kelas_rombel/edit_kelas_rombel',$data);

  }

  public function update()  {
  
      $where = array('id_kelasRombel' => $this->input->post('id_kelasRombel'));
      $data = array(
        'id_kelas'=> $this->input->post('id_kelas'),
        'id_jurusan'=> $this->input->post('id_jurusan'),
        'nama_kelasRombel'=> $this->input->post('nama_kelasRombel')
      );
      $this->M_rombel->updateRombel($where, $data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    redirect('kelas_rombel');
  }





}
