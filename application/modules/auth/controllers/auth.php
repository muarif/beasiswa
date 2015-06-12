<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	 
    function __construct()
    {
        parent:: __construct();
        $this->load->model('auth_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->helper('cookie');
		no_cache();
    }   

	function index()
	{
		if(!$this->session->userdata('logged_in'))
        {
        	$data = array(
				'content'=>$this->load->view('content','',TRUE),
				// 'script'=>$this->load->view('content_js', '', TRUE)
			);
            $this->load->view('template',$data);    
        }
        else
        {
            redirect('dashboard');
        }
	}
    
    function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('alert', validation_errors());
            redirect('auth');
        }
        else
        {
            $user_log = $this->auth_model->check_user();
            
            if(!$user_log)
            {
                $this->session->set_flashdata('alert', 'Oops! Incorect NIP or password');
                redirect('auth');
            }
            else
            {
                $this->session->set_userdata($user_log);
                $this->session->set_flashdata('alert', 'Welcome '.$this->session->userdata('name').'!');
                redirect('dashboard');
            }
        }
    }
	
    function logout()
    {
    	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
        $this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
        $this->session->set_flashdata('alert', 'Thanks, You have successfuly logged out!');
        redirect('auth');
    }
}