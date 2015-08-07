<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function kandidat_baru() 
    {

		$this->db->select('id_siswa, nama_lengkap, jenis_rek, nama_kanwil');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->where('id_lulus', 0);
		$this->db->limit(10);
		$query = $this->db->get('kandidat');
		return $query->result_array();
		
    }
	
	
}