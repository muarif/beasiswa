<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

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
		$config['total_rows'] = count($this->user_model->get_data($search, $sort, '','',FALSE));
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
		$item['user'] = $this->user_model->get_data($search, $sort, $page, $per_page,TRUE);


		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function insert(){
		$item['level'] = $this->user_model->get_level();
		$data = array(
			'content'=>$this->load->view('tambah', $item, TRUE),
			'script'=>$this->load->view('tambah_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function add(){
		$this->form_validation->set_error_delimiters('<div class="help-block col-md-10 col-md-offset-2">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password]');
		if($this->form_validation->run()==TRUE){
			$result = $this->user_model->add($this->input->post());
			if($result){
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Tambah Data</div>');
				redirect(site_url('user'));
			}else{
				$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Tambah Data</div>');
				$this->insert();
			}
		}else{
			$this->insert();
		}
	}
	function edit($id){
		$item['level'] = $this->user_model->get_level();
		$item['data'] = $this->user_model->get_user_data($id);
		$item['id'] = $id;
		$data = array(
			'content'=>$this->load->view('edit', $item, TRUE),
			// 'script'=>$this->load->view('', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function update($id){
		$this->form_validation->set_error_delimiters('<div class="help-block col-md-10 col-md-offset-2">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		if($this->form_validation->run()==TRUE){
			$result = $this->user_model->update($this->input->post(),$id);
			if($result){
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Edit Data</div>');
				redirect(site_url('user'));
			}else{
				$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Edit Data</div>');
				$this->edit($id);
			}
		}else{
			$this->edit($id);
		}
	}
	function hapus($id){
		$delete = $this->user_model->delete($id);
		if($delete){
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Hapus Data</div>');
			redirect(site_url('user'));
		}else{
			$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Hapus Data</div>');
			redirect(site_url('user'));
		}
	}
}