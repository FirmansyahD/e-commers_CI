<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class store extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')!=TRUE) {
			redirect('user/login','refresh');
		}
		$this->load->model('Motor_model','motor');
	}
    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
            
            
                $data['tampil_motor']=$this->motor->tampil();
                $data['kategori']=$this->motor->data_kategori();
                $data['konten']="store";
                $data['judul']="Toko Togamedia";
                $this->load->view('template', $data);
            
            
        
        }
    else{
            $this->load->view('Login');
    
    }
}
}