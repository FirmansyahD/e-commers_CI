<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motor_model extends CI_Model {
    public function tampil()
    {
        $tm_motor=$this->db
                      ->join('kategori','kategori.id_kategori=motor.id_kategori')
                      ->get('motor')
                      ->result();
        return $tm_motor;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_motor($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'id_motor' => $this->input->post('id_motor'), 
                'nama_motor' => $this->input->post('nama_motor'), 
                'tahun_keluaran' => $this->input->post('tahun_keluaran'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'made_in' => $this->input->post('made_in'), 
                'stok' => $this->input->post('stok')
             );
        }else{
            $object = array(
                'id_motor' => $this->input->post('id_motor'), 
                'nama_motor' => $this->input->post('nama_motor'), 
                'tahun_keluaran' => $this->input->post('tahun_keluaran'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'made_in' => $this->input->post('made_in'),  
                'stok' => $this->input->post('stok'),
                'foto_cover' => $file_cover
             );
        }
        return $this->db->insert('motor', $object);
    }
    public function detail($a)
    {
        $tm_motor=$this->db
                      ->join('kategori', 'kategori.id_kategori=motor.id_kategori')
                      ->where('id_motor', $a)
                      ->get('motor')
                      ->row();
        return $tm_motor;
    }
    public function edit_motor()
    {
        $data = array(
                'id_motor' => $this->input->post('id_motor'), 
                'nama_motor' => $this->input->post('nama_motor'), 
                'tahun_keluaran' => $this->input->post('tahun_keluaran'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga'), 
                'made_in' => $this->input->post('made_in')

            );

        return $this->db->where('id_motor', $this->input->post('id_motor_lama'))
                        ->update('motor', $data);
    }
    public function edit_motor_dengan_foto($file_cover)
    {
        $data = array(
                'id_motor' => $this->input->post('id_motor'), 
                'nama_motor' => $this->input->post('nama_motor'), 
                'tahun_keluaran' => $this->input->post('tahun_keluaran'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga'), 
                'made_in' => $this->input->post('made_in'), 
                'foto_cover' => $file_cover

            );

        return $this->db->where('id_motor', $this->input->post('id_motor_lama'))
                        ->update('motor', $data);
    }
    public function hapus_motor($id_motor='')
    {
        return $this->db->where('id_motor', $id_motor)
                    ->delete('motor');
    }
    

}

/* End of file M_motor.php */
/* Location: ./application/models/M_motor.php */