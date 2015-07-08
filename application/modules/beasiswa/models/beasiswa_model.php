<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beasiswa_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

		$this->db->select('id_user, username, level, status');
		$this->db->join('level l', 'l.id_level = user.id_level');
		$this->db->like('username', $search,'both');
		
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('user');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	
	function getSC(){
		$date = explode('-',$this->input->get('month'));
		$query = $this->db->query('SELECT * FROM beasiswa WHERE YEAR(waktu_cetak) = '.$date[1].' AND MONTH(waktu_cetak) = '.$date[0]);
		return $query->result_array();
	}
	function generateSC($kandidatData){
		date_default_timezone_set("Asia/Jakarta");

		$this->db->trans_begin();
		foreach ($kandidatData as $key => $value) {
			$data = array(
				'id_kandidat' => $value['id_siswa'],
				'waktu_cetak' => date('Y-m-d H:i:s')
			);

			$this->db->insert('beasiswa',$data);
		}
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return false;
			exit();
		}
		else
		{
			date_default_timezone_set("Asia/Jakarta");
		    $this->db->trans_commit();
		    return true;
		}
		
	}
}