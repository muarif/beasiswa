<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kandidat extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('kandidat_model');
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
			'id_beasiswa' => ($this->input->get('by')=='id_beasiswa') ? $this->input->get('sort') : 'asc',
			'nama_lengkap' => ($this->input->get('by')=='nama_lengkap') ? $this->input->get('sort') : 'asc',
			'jenis_rek' => ($this->input->get('by')=='jenis_rek') ? $this->input->get('sort') : 'asc',
			'nama_preferensi' => ($this->input->get('by')=='nama_preferensi') ? $this->input->get('sort') : 'asc',
			'nama_kanwil' => ($this->input->get('by')=='nama_kanwil') ? $this->input->get('sort') : 'asc',
		);
		/*Config Pagination*/
		$this->load->library('pagination');
		$config['base_url'] = site_url('kandidat?'.getLink('per_page'));
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
		$item['kandidat'] = $this->kandidat_model->get_data($search, $sort, $page, $per_page,TRUE);


		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function insert(){
		$item['provinsi'] = $this->kandidat_model->get_provinsi();
		$item['kelas'] = $this->kandidat_model->get_kelas();
		$item['kanwil'] = $this->kandidat_model->get_kanwil();
		$data = array(
			'content'=>$this->load->view('tambah', $item, TRUE),
			'script'=>$this->load->view('tambah_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function add(){
		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_error_delimiters('<div class="help-block col-md-10 col-md-offset-2">', '</div>');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
		$this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('id_kanwil', 'Kanwil', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jenis_rek', 'Jenis Rekening', 'required');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required');
		$this->form_validation->set_rules('rek_nama', 'Nama Rekening', 'required');
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
		$this->form_validation->set_rules('id_kelas', 'Tingkatan Kelas', 'required');
		$this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'required');
		$this->form_validation->set_rules('telepon_sekolah', 'Telepon Sekolah', 'required');
		$this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required');
		$this->form_validation->set_rules('nama_ortu', 'Nama Orang Tua', 'required');
		$this->form_validation->set_rules('pekerjaan_ortu', 'Pekerjaan Orang Tua', 'required');
		$this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required');
		$this->form_validation->set_rules('lama_pekerjaan', 'Lama Pekerjaan', 'required');
		$this->form_validation->set_rules('alamat_ortu', 'Alamat Orang Tua', 'required');
		$this->form_validation->set_rules('telepon_ortu', 'Telepon Orang Tua', '');
		$this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required');
		$this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'required');
		$this->form_validation->set_rules('nama_preferensi', 'Nama Preferensi', 'required');
		$this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'required');
		$this->form_validation->set_rules('alamat_preferensi', 'Alamat Preferensi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('telepon_preferensi', 'Telepon Preferensi', 'required');
		$this->form_validation->set_rules('email_preferensi', 'Email Preferensi', 'required');
		$this->form_validation->set_rules('fc_raport', 'Fotokopi Raport', 'required');
		$this->form_validation->set_rules('fc_ktp', 'Fotokopi KTP', 'required');
		$this->form_validation->set_rules('fc_kk', 'Fotokopi KK', 'required');
		$this->form_validation->set_rules('pas_foto', 'Pas Foto', 'required');
		$this->form_validation->set_rules('ska', 'Surat Keterangan Masih Aktif', 'required');
		$this->form_validation->set_rules('sktm', 'Surat Keterangan Tidak Mampu', 'required');

		if($this->form_validation->run()==TRUE){
			$result = $this->kandidat_model->add($this->input->post());
			if($result){
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Tambah Data</div>');
				redirect(site_url('kandidat'));
			}else{
				$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Tambah Data</div>');
				$this->insert();
			}
		}else{
			$this->insert();
		}
	}

	function edit($id){
		$item['provinsi'] = $this->kandidat_model->get_provinsi();
		$item['kelas'] = $this->kandidat_model->get_kelas();
		$item['kanwil'] = $this->kandidat_model->get_kanwil();
		$item['data'] = $this->kandidat_model->get_kandidat_data($id);
		$item['id'] = $id;
		$data = array(
			'content'=>$this->load->view('edit', $item, TRUE),
			'script'=>$this->load->view('tambah_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function update($id){
		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_error_delimiters('<div class="help-block col-md-10 col-md-offset-2">', '</div>');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
		$this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('id_kanwil', 'Kanwil', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jenis_rek', 'Jenis Rekening', 'required');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required');
		$this->form_validation->set_rules('rek_nama', 'Nama Rekening', 'required');
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
		$this->form_validation->set_rules('id_kelas', 'Tingkatan Kelas', 'required');
		$this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'required');
		$this->form_validation->set_rules('telepon_sekolah', 'Telepon Sekolah', 'required');
		$this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required');
		$this->form_validation->set_rules('nama_ortu', 'Nama Orang Tua', 'required');
		$this->form_validation->set_rules('pekerjaan_ortu', 'Pekerjaan Orang Tua', 'required');
		$this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required');
		$this->form_validation->set_rules('lama_pekerjaan', 'Lama Pekerjaan', 'required');
		$this->form_validation->set_rules('alamat_ortu', 'Alamat Orang Tua', 'required');
		$this->form_validation->set_rules('telepon_ortu', 'Telepon Orang Tua', '');
		$this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required');
		$this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'required');
		$this->form_validation->set_rules('nama_preferensi', 'Nama Preferensi', 'required');
		$this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'required');
		$this->form_validation->set_rules('alamat_preferensi', 'Alamat Preferensi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('telepon_preferensi', 'Telepon Preferensi', 'required');
		$this->form_validation->set_rules('email_preferensi', 'Email Preferensi', 'required');
		$this->form_validation->set_rules('fc_raport', 'Fotokopi Raport', 'required');
		$this->form_validation->set_rules('fc_ktp', 'Fotokopi KTP', 'required');
		$this->form_validation->set_rules('fc_kk', 'Fotokopi KK', 'required');
		$this->form_validation->set_rules('pas_foto', 'Pas Foto', 'required');
		$this->form_validation->set_rules('ska', 'Surat Keterangan Masih Aktif', 'required');
		$this->form_validation->set_rules('sktm', 'Surat Keterangan Tidak Mampu', 'required');
		if($this->form_validation->run()==TRUE){
			$result = $this->kandidat_model->update($this->input->post(),$id);
			if($result){
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Edit Data</div>');
				redirect(site_url('kandidat'));
			}else{
				$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Edit Data</div>');
				$this->edit($id);
			}
		}else{
			$this->edit($id);
		}
	}
	function hapus($id){
		$delete = $this->kandidat_model->delete($id);
		if($delete){
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Hapus Data</div>');
			redirect(site_url('kandidat'));
		}else{
			$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Hapus Data</div>');
			redirect(site_url('kandidat'));
		}
	}
	function view($id){
		$item['provinsi'] = $this->kandidat_model->get_provinsi();
		$item['kelas'] = $this->kandidat_model->get_kelas();
		$item['kanwil'] = $this->kandidat_model->get_kanwil();
		$item['data'] = $this->kandidat_model->get_kandidat_data($id);
		$item['id'] = $id;
		$data = array(
			'content'=>$this->load->view('view', $item, TRUE),
			// 'script'=>$this->load->view('tambah_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
}