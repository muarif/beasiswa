<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        // $this->load->model('beasiswa_model');
        $this->load->model('kandidat/kandidat_model');
        $this->load->model('beasiswa_model');
        if(!$this->session->userdata('logged_in'))
        {
           redirect('auth');
        }
        no_cache();
    }
		
	
	function index()
	{
		
		$search = $this->input->get('q');
		$page = '';
		
		$per_page=10;

		$sort = array(
			'id_user' => ($this->input->get('by')=='id_user') ? $this->input->get('sort') : 'asc',
			'username' => ($this->input->get('by')=='username') ? $this->input->get('sort') : 'asc',
			'level' => ($this->input->get('by')=='level') ? $this->input->get('sort') : 'asc'
		);
		/*Config Pagination*/
		$this->load->library('pagination');
		$config['base_url'] = site_url('user?'.getLink('per_page'));
		$config['total_rows'] = count($this->kandidat_model->get_data($search, $sort, '','',FALSE));
		$config['per_page'] = $per_page;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] = '&laquo';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$item['page'] = $this->pagination->create_links();

		/*/Config Pagination*/
		
		$item['sort'] = $sort;
		$item['user'] = $this->kandidat_model->get_data($search, $sort, $page, $per_page,TRUE);


		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function cetaksc(){
		$data = array();
		$getSC = $this->beasiswa_model->getSC();
		if(count($getSC)>0){
			
		}
		else{

			$kandidatData = $this->kandidat_model->getActiveCandidate();
			$result = $this->beasiswa_model->generateSC($kandidatData);
			
		}
		$data = $this->beasiswa_model->getSC();
		
	}
	
}