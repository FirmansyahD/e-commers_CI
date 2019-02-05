<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class motor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')!=TRUE) {
			redirect('user/login','refresh');
		}
		$this->load->model('Motor_model','motor');
	}

	public function index()
	{
		$data['data_motor']=$this->motor->tampil();
		$data['kategori']=$this->motor->data_kategori();
		$data['konten']="v_motor";
		$data['judul']="Daftar motor";
		$this->load->view('template', $data);
	}
	public function toko()
	{
		$data['data_motor']=$this->motor->tampil();
		$data['kategori']=$this->motor->data_kategori();
		$data['konten']="toko";
		$data['judul']="Toko Togamedia";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_motor', 'nama_motor', 'trim|required');
		$this->form_validation->set_rules('tahun_keluaran', 'tahun_keluaran', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('made_in', 'made_in', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['foto_cover']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('foto_cover')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}else {
					if ($this->motor->simpan_motor($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan', 'Sukses menambah ');
					}else{
						$this->session->set_flashdata('pesan', 'Gagal menambah');
					}
					redirect('motor','refresh');
				}
			}else{
				if ($this->motor->simpan_motor('')) {
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
				redirect('motor','refresh');
			}
			
		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('motor','refresh');
		}
	}
	public function edit_motor($id)
	{
		$data=$this->motor->detail($id);
		echo json_encode($data);
	}
	public function motor_update()
	{
		if($this->input->post('edit')){
			if($_FILES['foto_cover']['name']==""){
				if($this->motor->edit_motor()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('motor');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('motor');
				}
			} else {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto_cover')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('motor');
				}
				else{
					if($this->motor->edit_motor_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('motor');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('motor');
					}
				}
			}
			
		}

	}
	public function hapus($id_motor='')
	{
		if ($this->motor->hapus_motor($id_motor)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus motor');
			redirect('motor','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Hapus motor');
			redirect('motor','refresh');
		}
	}

}

/* End of file motor.php */
/* Location: ./application/controllers/motor.php */