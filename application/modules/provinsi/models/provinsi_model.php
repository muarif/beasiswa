<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

		$this->db->select('id_provinsi, nama_provinsi, ibu_kota, status');
		$this->db->like('nama_provinsi', $search,'both');
		$this->db->or_like('ibu_kota', $search,'both');
		
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('provinsi');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	
	function add($post){
		$data = array(
				'nama_provinsi'	=>	$post['nama_provinsi'],
				'ibu_kota'	=>	$post['ibu_kota'],
			);

		$result = $this->db->insert('provinsi',$data);
		return $result;
	}
	
	function get_provinsi_data($id){
		$query = $this->db->query('SELECT id_provinsi, nama_provinsi, ibu_kota FROM provinsi WHERE id_provinsi = '.$id);
			
		return $query->result_array();
	}
	function update($post,$id){
		$data = array(
				'nama_provinsi'	=>	$post['nama_provinsi'],
				'ibu_kota'	=>	$post['ibu_kota'],
			);
		
		$this->db->where('id_provinsi', $id);
		$result = $this->db->update('provinsi', $data); 
		return $result;
	}
	function delete($id){
		$result = $this->db->delete('provinsi', array('id_provinsi' => $id)); 
		return $result;
	}
}