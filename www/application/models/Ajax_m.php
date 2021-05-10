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

    public function getDataBar($i, $year)
    {
        return $this->db->query('SELECT SUM(total) as total,strftime("%m", tanggal) AS month, strftime("%Y", tanggal) AS year FROM penjualan WHERE month = "' . $i . '" AND year ="' . $year . '" GROUP BY month
        ')->row('total');
    }

    public function getDataArea($date)
    {
        $this->db->select('SUM(total) as total')
            ->from('penjualan')
            ->where('tanggal', $date)
            ->group_by('tanggal');
        return $this->db->get()->row('total');
    }
}
    
    /* End of file Ajax_m.php */
