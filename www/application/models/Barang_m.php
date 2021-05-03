<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_m extends CI_Model
{
    public function data()
    {
        return $this->db->get('barang')->result();
    }

    public function insert()
    {
        $data = $this->input->post();
        $this->db->insert('barang', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'kode' => $post['kode'],
            'nama' => $post['nama'],
            'stok' => $post['stok'],
            'harga_beli' => $post['harga_beli'],
            'harga_jual' => $post['harga_jual'],
        );
        $this->db->where('kode', $post['kode']);
        $this->db->update('barang', $data);
    }

    public function delete($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('barang');
    }
}
    
    /* End of file Barang_m.php */
