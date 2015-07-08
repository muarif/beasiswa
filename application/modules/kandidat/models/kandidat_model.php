<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kandidat_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

		$this->db->select('id_siswa, id_beasiswa, nama_lengkap, jenis_rek, nama_preferensi, nama_kanwil, id_lulus, kandidat.status, desc');
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->join('provinsi pv', 'pv.id_provinsi = kandidat.id_provinsi');
		$this->db->join('preferensi pf', 'pf.id_preferensi = kandidat.id_preferensi');
		$this->db->join('status st', 'st.id_status = kandidat.desc_status','left');
		$this->db->like('nama_lengkap', $search,'both');
		$this->db->or_like('nama_preferensi', $search,'both');
		
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('kandidat');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	function get_export_data($search) 
    {

		$this->db->select('id_beasiswa, nama_lengkap, CONCAT(`tempat_lahir`,"/",`tanggal_lahir`) as ttl, nama_ayah, pekerjaan_ayah,'.
		'nama_ibu, pekerjaan_ibu ,CONCAT(`alamat_rumah`,",Kel. ", `kelurahan`,",Kec. ",`kecamatan`,",Kota/Kab. ",`kota`,", ",`kode_pos`,", ",`nama_provinsi`)as full_alamat,telepon,nama_sekolah,'.
		'id_kelas, jenis_rek, no_rek, rek_nama, nama_preferensi,alamat_preferensi, telepon_preferensi,email_preferensi,jabatan,nama_kanwil',FALSE);
		$this->db->join('kanwil kw', 'kw.id_kanwil = kandidat.id_kanwil');
		$this->db->join('provinsi pv', 'pv.id_provinsi = kandidat.id_provinsi');
		$this->db->join('preferensi pf', 'pf.id_preferensi = kandidat.id_preferensi');
		$this->db->join('status st', 'st.id_status = kandidat.desc_status','left');
		$this->db->like('nama_lengkap', $search,'both');
		$this->db->or_like('nama_preferensi', $search,'both');
		
		$query = $this->db->get('kandidat');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	
	function add($post){
		if($post['id_preferensi']== ''){
			$pref = array(
					'nama_preferensi'	=>	$post['nama_preferensi'],
					'nama_lembaga'	=>	$post['nama_lembaga'],
					'alamat_preferensi'	=>	$post['alamat_preferensi'],
					'jabatan'	=>	$post['jabatan'],
					'telepon_preferensi'	=>	$post['telepon_preferensi'],
					'email_preferensi'	=>	$post['email_preferensi'],
				);
			$post['id_preferensi'] = $this->insert_preferensi($pref);
		}

		unset($post['nama_preferensi']);
		unset($post['nama_lembaga']);
		unset($post['alamat_preferensi']);
		unset($post['jabatan']);
		unset($post['telepon_preferensi']);
		unset($post['email_preferensi']);

		$result = $this->db->insert('kandidat', $post); 
		return $result;
	}
	

	function get_provinsi(){
		$query = $this->db->query('SELECT * FROM provinsi');
			
		$rq = $query->result_array();
		$result =array();
		foreach($rq as $value){
			$result[$value['id_provinsi']] = $value['nama_provinsi'];
		}
		return $result;
	}

	function get_kanwil(){
		$query = $this->db->query('SELECT * FROM kanwil');
			
		$rq = $query->result_array();
		$result =array();
		foreach($rq as $value){
			$result[$value['id_kanwil']] = $value['nama_kanwil'];
		}
		return $result;
	}

	function get_kelas(){
		$kelas = $this->db->query('SELECT *, kelas.label as labels FROM kelas JOIN tingkatan ON kelas.id_tingkat = tingkatan.id_tingkatan');
		$kelasr = $kelas->result_array();

		$result =array();
		$i = 0;
		foreach($kelasr as $value){

			$result[$value['tingkatan']][$i]['id_kelas'] = $value['id_kelas'];
			$result[$value['tingkatan']][$i]['label'] = $value['labels'];
			$i++;
		}
		
		return $result;
	}

	function get_short_kelas(){
		$kelas = $this->db->query('SELECT short_label,id_kelas FROM kelas');
		return $kelas->result_array();
	}

	function get_kandidat_data($id){
		$query = $this->db->query('SELECT *,kandidat.status as kts, kelas.label as labelk,tingkatan.label as labelt FROM kandidat JOIN preferensi ON kandidat.id_preferensi = preferensi.id_preferensi JOIN provinsi ON kandidat.id_provinsi = provinsi.id_provinsi JOIN kanwil ON kandidat.id_kanwil = kanwil.id_kanwil JOIN kelas ON kelas.id_kelas = kandidat.id_kelas JOIN tingkatan ON tingkatan.id_tingkatan = kelas.id_tingkat WHERE id_siswa = '.$id);
			
		return $query->result_array();
	}
	function update($post,$id){
		if($post['id_preferensi']== ''){
			$pref = array(
					'nama_preferensi'	=>	$post['nama_preferensi'],
					'nama_lembaga'	=>	$post['nama_lembaga'],
					'alamat_preferensi'	=>	$post['alamat_preferensi'],
					'jabatan'	=>	$post['jabatan'],
					'telepon_preferensi'	=>	$post['telepon_preferensi'],
					'email_preferensi'	=>	$post['email_preferensi'],
				);
			$post['id_preferensi'] = $this->insert_preferensi($pref);
		}else{
			$pref = array(
					'nama_preferensi'	=>	$post['nama_preferensi'],
					'nama_lembaga'	=>	$post['nama_lembaga'],
					'alamat_preferensi'	=>	$post['alamat_preferensi'],
					'jabatan'	=>	$post['jabatan'],
					'telepon_preferensi'	=>	$post['telepon_preferensi'],
					'email_preferensi'	=>	$post['email_preferensi'],
				);
			$re = $this->update_preferensi($pref,$post['id_preferensi']);
			if(!$re){
				$this->session->set_flashdata('warning', '<div class="alert alert-warning" role="alert">Gagal Update Pereferensi</div>');
			}
		}

		unset($post['nama_preferensi']);
		unset($post['nama_lembaga']);
		unset($post['alamat_preferensi']);
		unset($post['jabatan']);
		unset($post['telepon_preferensi']);
		unset($post['email_preferensi']);


		$this->db->where('id_siswa', $id);

		$result = $this->db->update('kandidat', $post); 
		// echo $this->db->last_query();
		return $result;
	}

	function insert_preferensi($pref){
		$this->db->insert('preferensi', $pref); 
		return $this->db->insert_id();
	}

	function update_preferensi($pref,$id){
		$this->db->where('id_preferensi', $id);
		$a = $this->db->update('preferensi', $pref); 
		return $a;
	}

	function delete($id){
		$result = $this->db->delete('kandidat', array('id_siswa' => $id)); 
		return $result;
	}
	function setKelulusan($id){
		$post = $this->input->post();
		if($post['id_lulus'] == 1) $post['status'] = 1;
		$this->db->where('id_siswa',$id);
		$a = $this->db->update('kandidat',$post);
		if($a){
			if($post['id_lulus'] == 1) return '<div class="alert alert-success" role="alert">Berhasil meluluskan siswa</div>';
			elseif($post['id_lulus'] == 0) return '<div class="alert alert-warning" role="alert">Tidak meluluskan siswa</div>';
		}else{
			return false;
		}
	}
	function setStatus($id){
		$post = $this->input->post();
		$this->db->where('id_siswa',$id);
		$a = $this->db->update('kandidat',$post);
		if($a){
			if($post['status'] == 1) return '<div class="alert alert-success" role="alert">Siswa Aktif</div>';
			elseif($post['status'] == 0) return '<div class="alert alert-warning" role="alert">Siswa tidak aktif</div>';
		}else{
			return false;
		}
	}
	function get_status(){
		$query = $this->db->query('SELECT * FROM status');
			
		$rq = $query->result_array();
		$result =array();
		foreach($rq as $value){
			$result[$value['id_status']] = $value['desc'];
		}
		return $result;
	}

	function naikKelas(){
		$query = $this->db->query('UPDATE kandidat JOIN kelas ON kandidat.id_kelas = kelas.id_kelas SET 
			kandidat.id_kelas = CASE WHEN NOT (kandidat.id_kelas = 12 OR kandidat.id_kelas = 20) 
			AND ((id_tingkat <> 4 AND semester = 2 ) OR (id_tingkat = 4)) THEN kandidat.id_kelas + 1 ELSE kandidat.id_kelas END,
			status = CASE WHEN ((kandidat.id_kelas = 12 AND semester = 2) OR kandidat.id_kelas = 20) THEN 0 ELSE 1 END,
			desc_status = CASE WHEN ((kandidat.id_kelas = 12 AND semester = 2) OR kandidat.id_kelas = 20) THEN 4 ELSE desc_status END,
			semester = CASE WHEN (semester = 2) THEN 1 ELSE 2 END
			WHERE status = 1 AND id_lulus = 1
		');

		if($query){
			return '<div class="alert alert-success" role="alert">Berhasil mengubah tingkatan</div>';
			
		}else{
			return false;
		}
		
	}

	function getActiveCandidate(){
		$query = $this->db->select('*')
		->where('id_lulus','1')
		->where('status','1')
		->get('kandidat');
		
		return $query->result_array();
	}
}