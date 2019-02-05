<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pesanan extends CI_Model {
	public function tm_pesanan()
	{
		$tm_pesanan=$this->db 
							  ->join('pembeli','pembeli.id_pembeli=nota.id_pembeli')
							  ->get('nota')
							  ->result();
		return $tm_pesanan;	
	}
	public function detail_pesanan($a)
	{
		return $this->db->join('motor','motor.id_motor=nota.id_motor')
					    ->get('nota')
					    ->result();
	}
}

/* End of file M_pesanan.php */
/* Location: ./application/models/M_pesanan.php */