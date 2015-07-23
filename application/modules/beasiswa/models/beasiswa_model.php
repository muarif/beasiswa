<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beasiswa_model extends CI_Model {

	function get_data($search, $sort, $page, $per_page,$is_page=FALSE) 
    {

    	
		$this->db->select('id_sc, id_beasiswa, nama_lengkap, jenis_rek, nama_preferensi,nama_kanwil');
		$this->db->join('kandidat k', 'k.id_siswa = beasiswa.id_kandidat');
		$this->db->join('preferensi p', 'p.id_preferensi = k.id_preferensi');
		$this->db->join('kanwil ka', 'ka.id_kanwil= k.id_kanwil');
		if($this->input->get('month')){
			$date = explode('-',$this->input->get('month'));
			$this->db->where('YEAR(waktu_cetak)', $date[1],FALSE);
			$this->db->where('MONTH(waktu_cetak)', $date[0],FALSE);

		}
		$this->db->where("(id_beasiswa LIKE '%$search%' OR nama_lengkap LIKE '%$search%' OR jenis_rek LIKE '%$search%' OR jenis_rek LIKE '%$search%' OR nama_preferensi LIKE '%$search%' OR nama_kanwil LIKE '%$search%')");
		
				
		if($this->input->get('sort')&&$this->input->get('by')){
			$this->db->order_by($this->input->get('by'), $this->input->get('sort')); 
		}else{
			$this->db->order_by('MONTH(waktu_cetak)', 'asc'); 
		}
		if($is_page){
			$cur_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
			$this->db->limit($per_page, $per_page*($cur_page - 1));
		}

		$query = $this->db->get('beasiswa');
		// echo $this->db->last_query();	
		return $query->result_array();
		
    }
	
	function getSC(){
		$date = explode('-',$this->input->get('month'));
		$query = $this->db->query('SELECT * FROM beasiswa WHERE YEAR(waktu_cetak) = '.$date[1].' AND MONTH(waktu_cetak) = '.$date[0]);
		return $query->num_rows();
	}
	function generateSC($kandidatData){
		date_default_timezone_set("Asia/Jakarta");
		$date = explode('-',$this->input->get('month'));
		$dates = date('Y-m-d',strtotime('01-'.$this->input->get('month')));

		$this->db->trans_begin();
		foreach ($kandidatData as $key => $value) {
			
			$query = $this->db->query('SELECT * FROM beasiswa WHERE YEAR(waktu_cetak) = '.$date[1].' AND MONTH(waktu_cetak) = '.$date[0].' AND id_kandidat = '.$value['id_siswa']);
			$rowRes = $query->num_rows();
			if($rowRes > 0){
				$data = array(
					'waktu_cetak' => $dates
				);	
				$this->db->where('id_kandidat', $value['id_siswa']);
				$this->db->where('MONTH(waktu_cetak)', $date[0]);
				$this->db->where('YEAR(waktu_cetak)', $date[1]);
				$this->db->update('beasiswa',$data);
			}else{
				$data = array(
					'id_kandidat' => $value['id_siswa'],
					'waktu_cetak' => $dates
				);	
				$this->db->insert('beasiswa',$data);
			}
			
		}
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return false;
			exit();
		}
		else
		{
			date_default_timezone_set("Asia/Jakarta");
		    $this->db->trans_commit();
		    return true;
		}
		
	}
	function getDataSC(){
		$date = explode('-',$this->input->get('month'));
		$query = $this->db->select('no_rek, besaran, rek_nama')->where('YEAR(waktu_cetak)',$date[1],FALSE)
		->WHERE('MONTH(waktu_cetak)',$date[0],FALSE)
		->get('sc_view');

		return $query->result_array();
	}
	function delete($id){
		$result = $this->db->delete('beasiswa', array('id_sc' => $id)); 
		return $result;
	}
}