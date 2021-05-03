<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_m extends CI_Model
{

    public function getSupplier($search)
    {
        $this->db->select('supplier.kode as id, supplier.nama as text')
            ->from('supplier')
            ->like('kode', $search)
            ->or_like('nama', $search);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBarang($search)
    {
        $this->db->select('barang.kode as id, barang.nama as text')
            ->from('barang')
            ->like('kode', $search)
            ->or_like('nama', $search);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBarangData($kode)
    {
        return $this->db->get_where('barang', ['kode' => $kode])->row();
    }

    public function addCart()
    {
        $post = $this->input->post();
        $data = array(
            array(
                'id'      => 1,
                'qty'     => 1,
                'price'   => 1000,
                'name'    => 'baju'
            )
        );
        $this->cart->insert($data);
    }
}
    
    /* End of file Ajax_m.php */
