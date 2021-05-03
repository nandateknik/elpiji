<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_m extends CI_Model
{

    public function insert()
    {
        $post = $this->input->post();
        $this->db->insert('pembelian', $post);
    }

    public function stokTambah()
    {
        $post = $this->input->post();
        $stok = $this->db->get_where('barang', ["kode" => $post['kode_brg']])->row();

        $jumlah = $post['jumlah'] + $stok->stok;
        $data = array(
            'harga_jual' => $post['harga_jual'],
            'harga_beli' => $post['harga_beli'],
            'stok' => $jumlah
        );

        $this->db->where('kode', $post['kode_brg']);
        $this->db->update('barang', $data);
    }

    public function get()
    {
        $this->db->select('barang.nama, pembelian.tanggal, pembelian.harga_jual, pembelian.harga_beli, pembelian.jumlah, user.user');
        $this->db->from('barang');
        $this->db->join('pembelian', 'pembelian.kode_brg = barang.kode');
        $this->db->join('user', 'user.id = pembelian.id_user');
        $query = $this->db->get();
        return $query->result();
    }
}
    
    /* End of file Pembelian_m.php */
