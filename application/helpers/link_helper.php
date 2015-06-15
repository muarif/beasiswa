<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getLink(){
		$CI =& get_instance();
		$numargs = func_get_args();
		$rawParam = array('per_page','q','sort','by');
		$param = array();
		$arr = array_diff($rawParam, $numargs);

		foreach($arr as $row){
			// if($row == $removeLink){
			// 	continue;
			// }else{
			// 	if($this->input->get($row)) $param[$row] = $this->input->get($row);
			// }
			if($CI->input->get($row)) $param[$row] = $CI->input->get($row);
		}
		
		$getLink = http_build_query($param);
		return $getLink;
}

/*function auth()
{	
		$CI =& get_instance(); 
		$auth_session = $CI->session->userdata('privileges');
		$permission = explode("|",$auth_session);
		if($CI->uri->segment(2)==""){
			
		}else{
			$module = $CI->uri->segment(1);
			$function = $CI->uri->segment(2)!=""?$CI->uri->segment(2) : "index" ;
			foreach($permission as $show){
				$get_function = explode("_",$show);
				$module_list[] = $get_function[0];
				//echo $show."</br>";
			}
			
			if(!in_array($module."_".$function,$permission)){
				if(!in_array($module,$module_list)){
					show_404();
				}else{
					true;
				}
			}else{
				true;
			};
			
			//echo $module."_".$function."<br/><br/>";
		}
			
}
function isCheckOut(){
	$CI =& get_instance(); 
	$CI->load->model('auth/auth_model');
	// $CI->load->model('auth_model');
	$isCheckOut =  $CI->auth_model->isCheckOut();
	if($isCheckOut){
		return false;
	}else{
		return true;
	}
}*/