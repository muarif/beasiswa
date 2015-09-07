<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kanwil_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

		$this->db->select('id_kanwil, nama_kanwil, wilayah_kerja, aktif');
		$this->db->like('nama_kanwil', $search,'both');
		$this->db->or_like('wilayah_kerja', $search,'both');
		
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('kanwil');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	
	function add($post){
		$data = array(
				'nama_kanwil'	=>	$post['nama_kanwil'],
				'wilayah_kerja'	=>	$post['wilayah_kerja'],
			);

		$result = $this->db->insert('kanwil',$data);
		return $result;
	}
	
	function get_kanwil_data($id){
		$query = $this->db->query('SELECT id_kanwil, nama_kanwil, wilayah_kerja FROM kanwil WHERE id_kanwil = '.$id);
			
		return $query->result_array();
	}
	function get_kanwil_list(){
		$query = $this->db->query('SELECT id_kanwil, nama_kanwil FROM kanwil');
		$rs = $query->result_array();
		$result = array();
		foreach($rs as $value){
			$result[$value['id_kanwil']] = $value['nama_kanwil'];
		}
		return $result;
	}
	function update($post,$id){
		$data = array(
				'nama_kanwil'	=>	$post['nama_kanwil'],
				'wilayah_kerja'	=>	$post['wilayah_kerja'],
			);
		
		$this->db->where('id_kanwil', $id);
		$result = $this->db->update('kanwil', $data); 
		return $result;
	}
	function delete($id){
		$result = $this->db->delete('kanwil', array('id_kanwil' => $id)); 
		return $result;
	}
}