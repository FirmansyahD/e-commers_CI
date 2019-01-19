<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function index()
    {
        $data['konten']="home";
        $this->load->view('template', $data);
    }
    
    public function data_diri()
    {
        $data['konten']="data_diri";
        $this->load->view('template', $data);
    }
}