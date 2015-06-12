<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function get_data() 
    {
    	$this->load->library('datatables');
		$this->datatables->select('id_user, username, level, status')
			->from('user');
		return $this->datatables->generate();
    }
	
	
	
}