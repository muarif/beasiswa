<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('dashboard_model');
        if(!$this->session->userdata('logged_in'))
        {
           header('Location: '.site_url('auth'));
        }
        no_cache();
    }
	
	function index()
	{
		$item['kandidat_baru'] = $this->dashboard_model->kandidat_baru();
		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', NULL, TRUE),
		);
		$this->load->view('template', $data);
	}
	
}