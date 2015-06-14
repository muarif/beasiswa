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
		
		$item['user'] = $this->user_model->get_data();

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