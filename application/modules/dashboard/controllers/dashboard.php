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
		// $item['modal'] = $this->get_modal($this->session->userdata('id'));
	 //    if($this->session->userdata('level')!="Member"){
		// 	$item['check_privileges'] =  $this->check_privileges();
		// }else{
			$item['check_privileges'] = array();
		// }
		// $item['workload_all'] =  site_url('dashboard/workload_all');
		// $item['workload_all_detail'] =  site_url('dashboard/workload_all_detail');
		// $item['workload_all_detail2'] =  site_url('dashboard/workload_all_detail2');
		// $item['members'] = $this->dashboard_model->get_members();
		// $item['operating_day'] = $this->operating_day();
		// $item['operating_weeks'] = $this->operating_weeks();
		$data = array(
			'content'=>$this->load->view('content', $item, TRUE),
			// 'script'=>$this->load->view('content_js', '', TRUE)
		);
		$this->load->view('template', $data);
	}
	function div_list(){
		$division = $this->dashboard_model->get_division();
		$list = array();
		foreach ($division as $key_division => $div){
			$total_late = 0;
			$count_late = 0;
			$late = $this->dashboard_model->list_late($div['id']);
			$detail = array();
			foreach($late as $key => $data)
			{
				$login = $data['login_time'];
				$late_time = (strtotime($login) > strtotime('08:00:00') && strtotime($login) <= strtotime('12:00:00'))?strtotime($login)-strtotime('08:00:00'):"false";
				if($late_time=="false"){
				}
				else
				{
					$total_late = $total_late + $late_time;
					$count_late++;
				}
				array_push($detail,array('data' => $data, 'late_time' => $late_time));
			}
			if($count_late>0)
			{
			array_push($list,array(
											'division' => $div['division'],
											'minutes' => floor($total_late/60),
											'count' => $count_late,
											'detail' => $detail
											)
						);
			}
		}
		return $list;
	}
	function late(){
		$late_list = $this->dashboard_model->get_late_list();
		$list = $this->div_list();
		$str = '';
		$total = 0;
		$total_time = 0;
		if($late_list){
		if($this->session->userdata('level')!='Admin'){
	
			$str .='<ul style="height:75px; overflow:auto;">';
			
			$total = 0;
			$total_time = 0;
			if($late_list > 0){
				foreach($late_list as $row){
				
					$str .='<li>'.date('F d, Y',strtotime($row['date'])).'- Late (';
					$total +=1;
					$h = floor($row['late'] / 3600);
					$m = floor(($row['late'] % 3600)/60);
					$s = floor(($row['late'] % 3600)%60);
					if($h > 0){
						$str .= $h .' Hours, '. $m .' Minutes, '. $s .' Second';
					}else{
						$str .= floor(($row['late'] % 3600)/60).' Minutes,  '. $s .' Second';
					}
					
					$total_time += $row['late'];
					$str .=')</li>';
				}
			}
			$str .='</ul><p class="text-right">Total : '.$total.'Times - Late (';
			$h = $total_time / 3600;
			$m = floor(($total_time % 3600)/60);
			$s = floor(($total_time % 3600)%60);
			if($h > 0){
				$str .= floor($h) .' Hours, '. $m.' Minutes, '. $s .' Second';
			}else{
				$str .= floor(($total_time % 3600)/60).' Minutes, '. $s .' Second';
			}
			
			$total_time += $row['late'];
			$str .=')</p>';
		
		}else{
			$str .='<ul style="height:75px; overflow:auto;">';
	
			
			if(count($list>0)){
				foreach($list as $data => $row){ 
				
					$str .= '<li>'. $row['division'].' - '.$row['count'].' Late (';
				
					$total +=$row['count'];
					$total_time +=$row['minutes'];
					$str.= floor($row['minutes']/60) .' Hours, '. ($row['minutes'] - (floor($row['minutes']/60))*60).' Minutes';
					$str .=')</li>';
				
			
				}
			}
			$str .='</ul><p class="text-right">Total : '. $total.' Times - Late (';
			$str .= floor($total_time/60) .' Hours, '. ($total_time - (floor($total_time/60))*60).' Minutes)</p>';
		
		}
		}
		if($total_time > (10*60)&&$this->session->userdata('level')!='Admin'){
			$str.='<div class="alert alert-warning" role="alert" style="word-break: break-word;word-wrap: normal;white-space: normal;">You\'ve more than 10 minutes in a month. Please tell your Leader to confirm</div>';
		}
		echo $str;				
	}
	function absent(){
		$str = '';
		$total = 0;
		$absent_list = $this->dashboard_model->get_absent_list();
		if($absent_list){
			if($this->session->userdata('level')!='Admin'){
				$str .= '<ul style="height:75px; overflow:auto;">';
				
				if(count($absent_list[1]>0)){
					foreach($absent_list[1] as $row){
						$total += 1;
						$str .= '<li>'.date('F d, Y',strtotime($row['date'])).' - '.$row['status'].'</li>';
					}
				}
				$str .= '</ul><p class="text-right">Total : '.$total.' times Absent</p>';
						
			}else{
				$str .= '<ul style="height:75px; overflow:auto;">';
				
							
				foreach($absent_list as $key => $row){
					$total += $row;
					$str .= '<li>'. $key.' Unit '.$row .'times </li>';
				}
				$str .= '</ul><p class="text-right">Total : '.$total.'times Absent</p>';
			}
		}
		if($total > 4&&$this->session->userdata('level')!='Admin'){
			$str.='<div class="alert alert-danger" role="alert" style="word-break: break-word;word-wrap: normal;white-space: normal;">You\'ve more than 4 times absent in a month. Please tell your Leader to confirm</div>';
		}
		echo $str;		
	}
	function check_privileges()
	{
		
		return $this->dashboard_model->check_privileges();
	}
	/*-------------------------
		Attendance Chart
	-------------------------*/
	function table_attendance()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->table_attendance();
	}
	function chart_attendance()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->chart_attendance();
	}
	function detail_attendance()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->detail_attendance();
	}
	function view_attend(){
		$this->load->view('detail_attendance');
	}
	/*-------------------------
		End Attendance Chart
	--------------------------*/
	
	/*-------------------------
		Operation Rates
	-------------------------*/
	function operating_day()
	{
		$projectWorkload = $this->dashboard_model->projectWorkload();
		// echo var_dump($projectWorkload);
		return array(number_format((float)($projectWorkload[0]['pw']/($projectWorkload[0]['u']*8)*100), 2, '.', ''),$projectWorkload[0]['pw'],$projectWorkload[0]['date']);
		// return $projectWorkload;
	}
	
	function operating_weeks(){
		// $projectWorkloadWeeks = $this->dashboard_model->projectWorkloadWeeks();
		$projectWorkloadWeeks = $this->dashboard_model->get_pw();
		// echo var_dump($projectWorkloadWeeks);
		$total_est = ($projectWorkloadWeeks[0]['u'] * 8  );
		$pw = $projectWorkloadWeeks[0]['pw'];
		
		$day = $projectWorkloadWeeks[0]['total_day'];

         
		if($day == 0){
			$res = 0;
		}else{
		$res = $pw / $total_est / $day;
		}
		return array(number_format((float)$res*100, 2, '.', ''),$projectWorkloadWeeks[0]['pw'],$projectWorkloadWeeks[0]['dt']);
		// return array($projectWorkloadWeeks[0]['pw'],$projectWorkloadWeeks[0]['u'],$projectWorkloadWeeks[0]['total_day']);
		// return $projectWorkloadWeeks;
	}
	/*-------------------------
		End Operation Rates
	-------------------------*/
	
	/*****************************
	 * Workload Controllers
	 *****************************/

/* Workload ALl Report Configuration Controller */	 
	 
	function workload_all($division = false)
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->workload_all_table($division);
	}
	
	function workload_all_detail($division = false)
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->workload_all_table_detail($division);
	}
	
	function workload_all_detail2($division = false)
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->workload_all_table_detail2($division);
	}
	
	function operating_rate_all()
	{
		
		echo $this->dashboard_model->operating_rate_all();
	}

/* End Workload ALl Report Configuration Controller */

/* Workload Individual Report Configuration Controller */
	function individual_content($id_user = false)
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->individual_table($id_user);
	}
	
	function individual_detail($id_user = false)
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->individual_table_detail($id_user);
	}
	
	function individual_detail2($id_user = false)
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->dashboard_model->individual_table_detail2($id_user);
	}
	
/* End Workload Individual Report Configuration Controller */
	
	function get_member_num($division = false)
	{
		echo $this->dashboard_model->get_member_num($division);
	}
	
	function get_holiday()
	{
		
		echo $this->dashboard_model->get_holiday();
	}
}