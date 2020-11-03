<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model
{

    public function getguru(){
        return $this->db->get("guru")->result();
    }

    public function get1guru($where){
        return $this->db->get_where($this->_tabel,$where)->result();
    }
    function input_data(){
        $nip = $this->input->post('nip',true);
        $nama_guru = $this->input->post('nama_guru',true);
        $jenis_kelamin = $this->input->post('jenis_kelamin',true);
        $tempat_lahir = $this->input->post('tempat_lahir',true);
        $tanggal_lahir = $this->input->post('tanggal_lahir',true);
        $nik = $this->input->post('nik',true);
        $nuptk = $this->input->post('nuptk',true);
        $agama = $this->input->post('agama',true);
        $alamat_jalan = $this->input->post('alamat_jalan',true);
        $rt = $this->input->post('rt',true);
        $rw = $this->input->post('rw',true);
        $nama_dusun = $this->input->post('nama_dusun',true);
        $desa_kelurahan = $this->input->post('desa_kelurahan',true);
        $kecamatan = $this->input->post('kecamatan',true);
        $kode_pos = $this->input->post('kode_pos',true);
        $telepon = $this->input->post('telepon',true);
        $hp = $this->input->post('hp',true);
        $email = $this->input->post('email',true);
        $sk_cpns = $this->input->post('sk_cpns',true);
        $npwp = $this->input->post('npwp',true);
        $kewarganegaraan = $this->input->post('kewarganegaraan',true);
        $data= array(
            'nip'=>$nip,
            'nama_guru'=>$nama_guru,
            'jenis_kelamin'=>$jenis_kelamin,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'nik'=>$nik,
            'nuptk'=>$nuptk,
            'agama'=>$agama,
            'alamat_jalan'=>$alamat_jalan,
            'rt'=>$rt,
            'rw'=>$rw,
            'nama_dusun'=>$nama_dusun,
            'desa_kelurahan'=>$desa_kelurahan,
            'kecamatan'=>$kecamatan,
            'kode_pos'=>$kode_pos,
            'telepon'=>$telepon,
            'hp'=>$hp,
            'email'=>$email,
            'sk_cpns'=>$sk_cpns,
            'npwp'=>$npwp,
            'kewarganegaraan'=>$kewarganegaraan
        );
        $this->db->insert('guru', $data);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}


?>
