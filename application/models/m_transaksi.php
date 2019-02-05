<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	 public function simpan_cart_db()
	 {
	 	for($i=0; $i<count($this->cart->contents()); $i++){
				
				$stok = $this->db->where('id_motor', $this->input->post('id_motor')[$i])
								->get('motor')
								->row()
								->stok;
								 

				$qty = $this->input->post('qty')[$i];
				$sisa = $stok - $qty;
				$updatestok = array('stok' => $sisa);
				$this->db->where('id_motor', $this->input->post('id_motor')[$i])
						 ->update('motor', $updatestok);
		}
	 	
	 	$object=array(
		 'id_pembeli' => $this->input->post('id_pembeli'),
		 
	 	'tgl' => date('Y-m-d'),
	 	'grandtotal' => $this->input->post('total')
	 	);
	 	$this->db->insert('nota', $object);
	 	$tm_nota=$this->db->order_by('id_nota', 'desc')
	 					  ->limit(1)
	 					  ->get('nota')
	 					  ->row();
	 	$hasil=array();
	 	for ($i=0;$i<count($this->input->post('rowid')) ;$i++) { 
	 		$hasil[]=array(
	 		'id_pembeli' =>$tm_nota->id_pembeli,
	 		'id_motor' =>$this->input->post('id_motor')[$i],
	 		'qty'=>$this->input->post('qty')[$i]
	 		);
	 	}
	 	$proses=$this->db->insert_batch('nota', $hasil);
	 	if ($proses) {
	 		return $tm_nota->id_nota;
	 	} else{
	 		return 0;
	 	}
	 }
	 public function detail_nota($id_nota)
	 {
	 	return $this->db->where('id_nota', $id_nota)
	 				    ->get('nota')
	 				    ->row();
	 }
	 public function detail_pembelian($id_nota)
	 {
	 	return $this->db->where('id_nota', $id_nota)
	 					->join('motor','motor.id_motor=nota.id_motor')
	 					->join('kategori','kategori.id_kategori=motor.id_kategori')
	 					->get('nota')
	 					->result();
	 }
	 public function check(){

	$cek=1;

		for($i=0;$i<count($this->cart->contents());$i++){
				
				$stok = $this->db->where('id_motor', $this->input->post('id_motor')[$i])
								->get('motor')
								->row()
								->stok;

				$qty = $this->input->post('qty')[$i];

				$sisa= $stok - $qty;

				if($sisa < 0){
					$oke = 0;
				}else{
					$oke = 1;
				}
				$cek = $oke * $cek;
		}

		return $cek;
		
	}
	public function cek($id_motor){

		$cek_stok = $this->db->where('id_motor', $id_motor)->get('motor')->row()->stok;

		if($cek_stok == 0 ){
			return 0;
		}else{
			return 1;
		}
	}
	

}

/* End of file M_nota.php */
/* Location: ./application/models/M_nota.php */