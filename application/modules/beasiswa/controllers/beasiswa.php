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
        if(!$this->session->userdata('logged_in')||$this->session->userdata('id_level')==3)
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
			'nama_kanwil' => ($this->input->get('by')=='nama_kanwil') ? $this->input->get('sort') : 'asc'
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
		$item['beasiswa'] = $this->beasiswa_model->get_data($search, $sort, $page, $per_page,TRUE);


		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function cetaksc(){
		$data = array();
		global $objPHPExcel;
		$this->load->library('excel');
		$objPHPExcel = $this->excel;
		$objPHPExcel->setActiveSheetIndex(0);
		$sheet = $objPHPExcel->getActiveSheet();
		$sheet->setPrintGridlines(FALSE);
		$getSC = $this->beasiswa_model->getSC();
		
		if($getSC<=0){
			$kandidatData = $this->kandidat_model->getActiveCandidate();
			$result = $this->beasiswa_model->generateSC($kandidatData);
		}
		
		$data = $this->beasiswa_model->getDataSC();

		
		$headerPos = 3;

		$field = array(
			'No',
			'Nomor Rekening',
			'Nominal Bayar',
			'Rekening Atas Nama',
		);


		$col = 'B';
		$colFirst = $col;
		$row = 4;
		$rowFirstRange = $headerPos;
		$colFirstRange = $col;
		$lastRow = $row;
		foreach ($field as $value) {
			if(!is_array($value)){
				$sheet->setCellValue($col.$headerPos, $value);
				$colEnd = $col;
				$col++;
				
			}
		}

		
		
		$style = array(
       	 	'alignment' => array(
            	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        	),
        	'borders' => array(
			    'allborders' => array(
			      	'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			    )
			)
		);

		$sheet->getStyle($colFirst.$headerPos.':'.$colEnd.($headerPos))->applyFromArray($style);
		
		
		$numRow = 1;
		foreach($data as $key => $val){
			$col = 'B';
			$colSt = $col;
			$sheet->setCellValue($col.$row, $numRow);
			$col++;
			$sheet->getColumnDimension($col)->setAutoSize(true);
			foreach($val as $iden => $value){

				$sheet->setCellValueExplicit($col.$row, $value,PHPExcel_Cell_DataType::TYPE_STRING);
				$sheet->getColumnDimension($col)->setAutoSize(true);
				
				$colEnd = $col;
				$col++;
				
				
			}
			$style = array(
		        	'borders' => array(
					    'allborders' => array(
					      	'style' => PHPExcel_Style_Border::BORDER_THIN
					    )
					)
				);
				$sheet->getStyle($colSt.$row.':'.$colEnd.$row)->applyFromArray($style);	
				$lastRow = $row;
			$row++;

			$numRow++;
		}
		$style = array(
        	'borders' => array(
			    'outline' => array(
			      	'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			    )
			)
		);
		$sheet->getStyle($colFirstRange.$rowFirstRange.':'.$colEnd.$lastRow)->applyFromArray($style);	
		
				
		$filename='Salary Crediting '.$this->input->get('month').'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
            

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  

		$objWriter->save('php://output');
	
		
		
	}
	function hapus($id){
		$delete = $this->beasiswa_model->delete($id);
		if($delete){
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses Hapus Data</div>');
			redirect(site_url('beasiswa'));
		}else{
			$this->session->set_flashdata('fail', '<div class="alert alert-danger" role="alert">Gagal Hapus Data</div>');
			redirect(site_url('beasiswa'));
		}
	}	
}