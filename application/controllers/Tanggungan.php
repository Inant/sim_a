<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggungan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_tanggungan');
  }

  public function index(){
    $data['kelas']= $this->M_tanggungan->getkelas();
    $data['title']= "Data Tanggungan";
    $data['tanggungan']= $this->M_tanggungan->getJoinTanggungan();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/tanggungan/v_tanggungan',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $data=[
      'id_tanggungan'=>$this->input->post("id_tanggungan"),
      'nama_tanggungan'=>$this->input->post("nama_tanggungan"),
      'nominal'=>$this->input->post("nominal"),
      'id_kelas'=>$this->input->post("id_kelas")

    ];
    $this->M_tanggungan->input_data($data, 'tanggungan');
    $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");
    redirect('tanggungan');
  }
  function edit(){
    $data['id'] = $this->input->post('id_tanggungan');
    $where = array(
      'id_tanggungan' => $this->input->post('id_tanggungan')
    );
    $data['tanggungan'] = $this->M_tanggungan->edit_data($where);
    $data['kelas'] = $this->M_tanggungan->getKelas();
    $this->load->view('admin/tanggungan/edit_tanggungan',$data);

  }

  public function update()  {

      $where = array('id_tanggungan' => $this->input->post('id_tanggungan'));
      $data = array(
        'id_tanggungan'=>$this->input->post("id_tanggungan"),
        'nama_tanggungan'=>$this->input->post("nama_tanggungan"),
        'nominal'=>$this->input->post("nominal"),
        'id_kelas'=>$this->input->post("id_kelas")
      );
      $this->M_tanggungan->updateTanggungan($where, $data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    redirect('tanggungan');
  }

  function hapus($id){
    $where = array('id_tanggungan' => $id);
    $this->M_tanggungan->hapus_data($where,'tanggungan');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('tanggungan');
  }



}
