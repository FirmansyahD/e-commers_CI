<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {
	public function index(){
		
		if($this->session->userdata('logged_in') == TRUE){
			$data['konten']="gallery";
			
	$this->load->view('template', $data);
		}
	else{
			$this->load->view('Login');
	
	}
}
}