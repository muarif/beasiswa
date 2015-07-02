<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

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
	
	function add($post){
		$data = array(
				'username'	=>	$post['username'],
				'password'	=>	md5($post['password']),
				'id_level'		=>	$post['level'],
				'status'	=>	1
			);

		$result = $this->db->insert('user',$data);
		return $result;
	}
	
	function get_level(){
		$query = $this->db->query('SELECT * FROM level');
			
		$rq = $query->result_array();
		$result =array();
		foreach($rq as $value){
			$result[$value['id_level']] = $value['level'];
		}
		return $result;
	}
	function get_user_data($id){
		$query = $this->db->query('SELECT id_user, username, id_level level, status FROM user WHERE id_user = '.$id);
			
		return $query->result_array();
	}
	function update($post,$id){
		$data = array(
               'username' => $post['username'],
               'id_level' => $post['level']
            );
		if($post['password']!='') $data['password'] = md5($post['password']);
		$this->db->where('id_user', $id);
		$result = $this->db->update('user', $data); 
		return $result;
	}
	function delete($id){
		$result = $this->db->delete('user', array('id_user' => $id)); 
		return $result;
	}
}