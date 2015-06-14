<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function check_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->db->select('id_user, username, password, id_level')
            ->from('user')
            ->where(array('username'=>$username, 'password'=>$password));
        $result = $this->db->get();
        
        if($result->num_rows() > 0)
        {
            $ess_ = array('logged_in'=>TRUE);
            return  array_merge($ess_, $result->row_array());
        }
        else
        {
            return FALSE;    
        }
    }
	
}