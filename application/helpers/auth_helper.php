<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
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