<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tingkatan_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

		$this->db->select('id_tingkatan, tingkatan, label, besaran');
		$this->db->like('label', $search,'both');
		$this->db->or_like('tingkatan', $search,'both');
		
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('tingkatan');
		// echo $this->db->last_query();
		$result = array();
		foreach($query->result_array() as $key=>$val){
			$result[$key] = $val;
			$result[$key]['kelas'] = $this->get_kelas($val['id_tingkatan']);
		}	
		
		return $result;
		
    }
	function get_kelas($id){
		$get = $this->db->select('label')->where('id_tingkat',$id)->get('kelas');
		$result = $get->result_array();
		return $result;
	}
	function get_tingkatan_data($id){
		$query = $this->db->query('SELECT id_tingkatan, label, besaran FROM tingkatan WHERE id_tingkatan = '.$id);
		$result = $query->result_array();
		return $result[0];
	}
	function update($post,$id){
		$data = array(
				'besaran'	=>	$post['besaran'],
				
			);
		
		$this->db->where('id_tingkatan', $id);
		$result = $this->db->update('tingkatan', $data); 
		return $result;
	}
}