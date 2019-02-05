<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')!=TRUE) {
			redirect('user','refresh');
		}
		$this->load->model('m_transaksi','trans');
		$this->load->model('Motor_model','motor');
		$this->load->model('Pelanggan_Model');
		
		$this->load->library('cart');
	}

	public function index()
	{
		$data['data_motor']=$this->motor->tampil();
		$data['judul']="Transaksi";
		$data['konten']="v_transaksi";
		$data['AllDataPelanggan'] = $this->Pelanggan_Model->getDataPelanggan();
		$this->load->view('template', $data);
	}
	public function addcart($id)
	{
		$detail = $this->motor->detail($id);

		$data = array(
			'id' => $detail->id_motor, 
			'qty' => 1, 
			'price' => $detail->harga, 
			'name' => $detail->nama_motor,
			'options' => array('genre' => $detail->nama_kategori)
		);

		$this->cart->insert($data);
		redirect('transaksi','refresh');
	}
	public function simpan()
	{
		if ($this->input->post('update')) {
			for ($i=0;$i<count($this->input->post('rowid'));$i++) { 
				$data = array(
					'rowid' => $this->input->post('rowid')[$i],
					 'qty' => $this->input->post('qty')[$i]
				);
				$this->cart->update($data);
			}
				redirect('transaksi','refresh');
		}elseif ($this->input->post('bayar')) {
			$cek_nota =$this->trans->check();
			if ($cek_nota == 1) {
				$id=$this->trans->simpan_cart_db();
				if ($id) {
					$bayar = $this->input->post('uang_bayar');
					$total = $this->cart->total();

					$kembalian = $bayar - $total;

					$this->session->set_flashdata('pesan', 'sukses simpan');
					$this->session->set_flashdata('kembalian', $kembalian);
					$this->session->set_flashdata('bayar', $bayar);
					$data['nota']=$this->trans->detail_nota($id);
					$this->cart->destroy();
					redirect('transaksi');
				}
			}else{
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('transaksi','refresh');
			}
		}
	}
	public function hapus_cart($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('transaksi','refresh');
	}
	public function clearcart()
	{
		$this->cart->destroy();
		redirect('transaksi','refresh');
	}


}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */