<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function kandidat_baru() 
    {

		$this->db->select('id_siswa, nama_lengkap, jenis_rek, nama_kanwil');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->where('id_lulus', 0);
		$this->db->limit(10);
		if($this->session->userdata('id_level')==3){
			$this->db->where('id_user',$this->session->userdata('id_user'));
		}
		$query = $this->db->get('kandidat');
		
		return $query->result_array();
		
    }
	function kandidat_all() 
    {

		$this->db->select('id_siswa, nama_lengkap, jenis_rek, nama_kanwil');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->order_by('id_siswa', 'desc');
		$this->db->limit(10);
		$this->db->where('id_lulus',1);
		if($this->session->userdata('id_level')==3){
			$this->db->where('id_user',$this->session->userdata('id_user'));
		}
		$query = $this->db->get('kandidat');
		
		return $query->result_array();
		
    }
	function kandidat_aktif() 
    {

		$this->db->select('id_siswa, nama_lengkap, jenis_rek, nama_kanwil');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->order_by('id_siswa', 'desc');
		$this->db->limit(10);
		$this->db->where('status',1);
		if($this->session->userdata('id_level')==3){
			$this->db->where('id_user',$this->session->userdata('id_user'));
		}
		$query = $this->db->get('kandidat');
		
		return $query->result_array();
		
    }
    function kandidat_ta() 
    {

		$this->db->select('id_siswa, nama_lengkap, jenis_rek, nama_kanwil');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->order_by('id_siswa', 'desc');
		$this->db->limit(10);
		$this->db->where('status',0);
		if($this->session->userdata('id_level')==3){
			$this->db->where('id_user',$this->session->userdata('id_user'));
		}
		$query = $this->db->get('kandidat');
		
		return $query->result_array();
		
    }
}