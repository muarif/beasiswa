<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('peserta_model');
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
		$config['total_rows'] = count($this->peserta_model->get_data($search, $sort, '','',FALSE));
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
		$item['kandidat'] = $this->peserta_model->get_data($search, $sort, $page, $per_page,TRUE);


		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function insert(){
		$item['provinsi'] = $this->peserta_model->get_provinsi();
		$item['kelas'] = $this->peserta_model->get_kelas();
		$item['kanwil'] = $this->peserta_model->get_kanwil();
		$data = array(
			'content'=>$this->load->view('tambah', $item, TRUE),
			'script'=>$this->load->view('tambah_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	
	function hapus($id){
		$delete = $this->peserta_model->delete($id);
		if($delete){
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Hapus Data</div>');
			redirect(site_url('kandidat'));
		}else{
			$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Hapus Data</div>');
			redirect(site_url('kandidat'));
		}
	}
	function view($id){
		$item['status'] = $this->peserta_model->get_status();
		$item['data'] = $this->peserta_model->get_kandidat_data($id);
		$item['id'] = $id;
		$data = array(
			'content'=>$this->load->view('view', $item, TRUE),
			'script'=>$this->load->view('view_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	

	function export($id=NULL){
		global $objPHPExcel;
		$this->load->library('excel');
		$objPHPExcel = $this->excel;
		$objPHPExcel->setActiveSheetIndex(0);
		$sheet = $objPHPExcel->getActiveSheet();
		$sheet->setPrintGridlines(FALSE);
		$styleArray = array(
			  	'borders' => array(
			    	'allborders' => array(
			      		'style' => PHPExcel_Style_Border::BORDER_THIN
			    	),
			    	'outline' => array(
				      	'style' => PHPExcel_Style_Border::BORDER_MEDIUM
				    )
			  	)
			);
		// PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
		if($id==NULL){
			
			
			$headerPos = 3;

			$field = array(
				'No.',
				'No. ID Beasiswa',
				'Nama Lengkap',
				'Tempat/Tanggal Lahir',
				array('label'=>'Orang Tua','data'=>array(
					'Ayah','Pekerjaan Ayah','Ibu','Pekerjaan Ibu'
				)),
				'Alamat',
				'No. Telp/HP',
				'Nama Sekolah',
				array('label'=>'Jenjang Pendidikan','data'=>array()),
				'Jenis Rekening BRI/BRIS',
				'Nomor Rekening',
				'Atas Nama',
				array('label'=>'Data Perekomendasi','data'=>array(
					'Nama','Alamat','No Tel/HP','Email','Unit Kerja'
				)),
				'Kanwil'
			);


			$kelas = $this->peserta_model->get_short_kelas();
			foreach($kelas as $key => $val){
				$field[8]['data'][] = $val['short_label'];
			}
			$col = 'B';
			$colFirst = $col;
			$row = 5;
			$rowFirstRange = $headerPos;
    		$colFirstRange = $col;
			foreach ($field as $value) {
				if(!is_array($value)){
					$sheet->mergeCells($col.$headerPos.':'.$col.($headerPos+1));
					$sheet->setCellValue($col.$headerPos, $value);
					$col++;
					
				}
				else{
					$sheet->setCellValue($col.$headerPos, $value['label']);

					$subHead = $headerPos+1;
					$colA = $col;
					$numItems = count($value['data']);
					$i = 0;
					foreach($value['data'] as $k => $v){
						$sheet->setCellValue($col.($subHead), $v);
						if(++$i === $numItems) {
						}else{
							$col++;
						}
						
					}
					$colB = $col;
					$sheet->mergeCells($colA.$headerPos.':'.$colB.$headerPos);

					$col++;
					
				}
				$colEnd = $col;
			}

			
			
			$style = array(
	       	 	'alignment' => array(
	            	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	            	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	        	)
    		);

    		$sheet->getStyle($colFirst.$headerPos.':'.$colEnd.($headerPos+1))->applyFromArray($style);

    		
    		
    		$search = $this->input->get('q');
    		$sort = array(
				'id_beasiswa' => ($this->input->get('by')=='id_beasiswa') ? $this->input->get('sort') : 'asc',
				'nama_lengkap' => ($this->input->get('by')=='nama_lengkap') ? $this->input->get('sort') : 'asc',
				'jenis_rek' => ($this->input->get('by')=='jenis_rek') ? $this->input->get('sort') : 'asc',
				'nama_preferensi' => ($this->input->get('by')=='nama_preferensi') ? $this->input->get('sort') : 'asc',
				'nama_kanwil' => ($this->input->get('by')=='nama_kanwil') ? $this->input->get('sort') : 'asc',
			);
    		$dataKandidat = $this->peserta_model->get_export_data($search);
    		
    		/*Ambil List Kelas*/
    		$kelasId = $this->peserta_model->get_short_kelas();
    		$kelasList = array();
    		foreach($kelasId as $value){
    			$kelasList[] = $value['id_kelas'];
    		}
    		/*--------------------*/
    		// print_r($dataKandidat);
    		
    		$numRow = 1;
    		foreach($dataKandidat as $key => $val){
    			$col = 'B';
    			$sheet->setCellValue($col.$row, $numRow);
    			$col++;
    			$sheet->getColumnDimension($col)->setAutoSize(true);
    			foreach($val as $iden => $value){

    				if($iden!='id_kelas'){
    					
	    				$sheet->setCellValue($col.$row, $value);
	    				$col++;
	    				$sheet->getColumnDimension($col)->setAutoSize(true);
	    				$sheet->getStyle($col.$row)->getNumberFormat()->setFormatCode(
					        PHPExcel_Style_NumberFormat::FORMAT_TEXT
					    );
	    			}
	    			else{
	    				foreach($kelasList as $kelasVal){
	    					if($value==$kelasVal){
	    						$sheet->setCellValue($col.$row, 'x');
	    					}
	    					$col++;
	    					$sheet->getColumnDimension($col)->setAutoSize(true);
	    				}
	    			}	
    			}

    			$row++;
    			$numRow++;
    		}
    		$columnIndex = PHPExcel_Cell::columnIndexFromString($col);
    		$columnString = PHPExcel_Cell::stringFromColumnIndex(($columnIndex-2));
    		$sheet->getStyle($colFirstRange.$rowFirstRange.':'.$columnString.($row-1))->applyFromArray($styleArray);
    		$sheet->getStyle($colFirst.$headerPos.':'.$colEnd.($headerPos+1))->applyFromArray($styleArray);

		}
		else{

			$data = $this->peserta_model->get_kandidat_data($id);

			/* Set Header */
			$row = 'B';
			$col = 2;

			$sheet->setCellValue($row.$col, 'Data Kandidat');
			$title = array(
			    'font'  => array(
			        'bold'  => true,
			        'size'  => 15
			    )
			);
			$sheet->getStyle($row.$col)->applyFromArray($title);

			$colField = $col + 2;

			$selData = $data[0];
			$heading = array(
				'Data Pribadi'=>array(
					'No. Beasiswa' => 'id_beasiswa',
					'Nama Lengkap' => 'nama_lengkap',
					'Jenis Kelamin' => 'jenis_kelamin',
					'Tempat / tanggal_lahir' => 'ttl',
					'Alamat Rumah' => 'alamat_rumah',
					'Kanwil' => 'nama_kanwil',
					'No Telp / HP' => 'telepon',
					'Email' => 'email',
					'Jenis Rekening' => 'jenis_rek',
					'Nomor Rekening' => 'no_rek',
					'Atas Nama' => 'rek_nama',
				),
				'Data Pendidikan'=>array(
					'Nama Sekolah'=>'nama_sekolah',
					'Kelas / Tingkatan'=>'label_kelas',
					'Alamat Sekolah'=>'alamat_sekolah',
					'No Telp / HP'=>'telepon_sekolah',
					'Nama Kepala Sekolah'=>'nama_kepsek'
				),
				'Data Orang Tua Siswa'=>array(
					'Nama Ayah' => 'nama_ayah',
					'Pekerjaan ayah' => 'pekerjaan_ayah',
					'Nama Ibu' => 'nama_ibu',
					'Pekerjaan Ibu' => 'pekerjaan_ibu',
					'Status Pekerjaan' => 'status_pekerjaan',
					'Lama Pekerjaan' => 'lama_pekerjaan',
					'Alamat Orang Tua' => 'alamat_ortu',
					'HP / Telepon Rumah' => 'telepon_ortu',
					'Rata-rata Penghasilan/Bulan' => 'pendapatan',
					'Rata-rata Pengeluaran/Bulan' => 'pengeluaran'
				),
				'Data Perekomendasi'=>array(
					'Nama Lengkap'	=> 	'nama_preferensi',
					'Nama Lembaga'	=>	'nama_lembaga',
					'Jabatan'		=>	'jabatan',
					'Alamat Perekomendasi'=>'alamat_preferensi',
					'HP / Telepon Pereferensi'=>'telepon_preferensi',
					'Email'			=>	'email_preferensi'
				),
				'Kelengkapan'=>array(
					'Fotocopy Raport Semester'	=>	'fc_raport',
					'Fotocopy KTP Orang Tua'	=>	'fc_ktp',
					'Fotocopy KK'				=>	'fc_kk',
					'Pas Foto Siswa'			=>	'pas_foto',
					'Surat Keterangan Masih Aktif'=>'ska',
					'Surat Keterangan Tidak Mampu'=>'sktm'
				)
			);
			$selData['id_beasiswa'] = ($selData['id_beasiswa'])?$selData['id_beasiswa'] : '-';
			$selData['jenis_kelamin'] = ($selData['jenis_kelamin']=='L')?'Laki-laki' : 'Perempuan';

			/*Tempat Tanggal Lahir*/
			$month = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
			$selData['ttl'] = $data[0]['tempat_lahir'].' / '.date('j',strtotime($data[0]['tanggal_lahir'])) . ' ' .$month[date('n',strtotime($data[0]['tanggal_lahir']))]. ' ' .date('Y',strtotime($data[0]['tanggal_lahir']));
			/*--------------------*/

			/*Alamat Rumah*/
			$selData['alamat_rumah'] = $selData['alamat_rumah'].', Kel. '.$selData['kelurahan'].', Kec. '.$selData['kecamatan'].','.$selData['kota'].', '.$selData['nama_provinsi'].', '.$selData['kode_pos'];
			/*--------------------*/

			/*Label Kelas*/
			$selData['label_kelas'] = $selData['labelk'].' '.$selData['labelt'];
			/*--------------------*/

			$titlePanel = array(
			    'font'  => array(
			        'bold'  => true,
			        'size'  => 11
			    )
			);
			$colFirst = $colField;
			foreach ($heading as $key => $value) {
				$sheet->setCellValue($row.$colField, $key);

				$sheet->getStyle($row.$colField)->applyFromArray($titlePanel);
				$colField++;
				$ri = PHPExcel_Cell::columnIndexFromString($row);
    			$r = PHPExcel_Cell::stringFromColumnIndex(($ri));
				foreach($value as $nKey => $nValue){
					$sheet->setCellValue($row.$colField, $nKey);
					$sheet->setCellValue($r.$colField, $selData[$nValue]);
					$colField++;
				}
				$sheet->getColumnDimension($row)->setAutoSize(true);
				$sheet->getColumnDimension($r)->setAutoSize(true);

			}
			$style = array(
		       	 	'alignment' => array(
		            	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		            	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		        	)
	    		);
			$sheet->getStyle($row.$colFirst.':'.$r.$colField)->applyFromArray($style);
		}
		
		$filename='Export_kandidat.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
            

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  

		$objWriter->save('php://output');
	
	}
}