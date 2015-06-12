<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('user_model');
        if(!$this->session->userdata('logged_in'))
        {
           redirect('auth');
        }
        no_cache();
    }
	
	function index()
	{
		
		// $user = $this->user_model->

		$data = array(
			'content'=>$this->load->view('content', '', TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	
	function listUser(){
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		return $this->user_model->get_data();
	}
}