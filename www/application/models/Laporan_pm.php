<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pm extends CI_Model
{

    public function getPenjualan()
    {
        $post = $this->input->post();

        $array = array(
            'start' => $post['start'],
            'end' => $post['end']
        );

        $this->session->set_userdata($array);

        $this->db->select('penjualan.tanggal, SUM(penjualan.total) as total, SUM(transaksi_penjualan.keuntungan) as keuntungan')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->where('tanggal >=', $post['start'])
            ->where('tanggal <=', $post['end'])
            ->group_by('tanggal');
        return $this->db->get()->result();
    }


    public function getCetakPenjualan()
    {
        $this->db->select('penjualan.tanggal, SUM(penjualan.total) as total, SUM(transaksi_penjualan.keuntungan) as keuntungan')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->where('tanggal >=',  $this->session->userdata('start'))
            ->where('tanggal <=', $this->session->userdata('end'))
            ->group_by('tanggal');
        return $this->db->get()->result();
    }

    public function getBarangById()
    {
        $post = $this->input->post();
        $array = array(
            'start' => $post['start'],
            'end' => $post['end'],
            'kode_brg' => $post['kode_brg']
        );
        $this->session->set_userdata($array);

        $this->db->select('penjualan.tanggal, barang.nama, SUM(transaksi_penjualan.jumlah) as jumlah, transaksi_penjualan.harga_beli, transaksi_penjualan.harga_jual, SUM(transaksi_penjualan.keuntungan) as untung, SUM(transaksi_penjualan.jumlah * transaksi_penjualan.harga_beli) as subtotal')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->join('barang', 'barang.kode = transaksi_penjualan.id_brg')
            ->where('tanggal >=', $post['start'])
            ->where('tanggal <=', $post['end'])
            ->where('transaksi_penjualan.id_brg', $post['kode_brg'])
            ->group_by('tanggal');

        return $this->db->get()->result();
    }

    public function CetakBarangById()
    {
        $this->db->select('penjualan.tanggal, barang.nama, SUM(transaksi_penjualan.jumlah) as jumlah, transaksi_penjualan.harga_beli, transaksi_penjualan.harga_jual, SUM(transaksi_penjualan.keuntungan) as untung, SUM(transaksi_penjualan.jumlah * transaksi_penjualan.harga_beli) as subtotal')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->join('barang', 'barang.kode = transaksi_penjualan.id_brg')
            ->where('tanggal >=', $this->session->userdata('start'))
            ->where('tanggal <=', $this->session->userdata('end'))
            ->where('transaksi_penjualan.id_brg', $this->session->userdata('kode_brg'))
            ->group_by('tanggal');

        return $this->db->get()->result();
    }
}
    
    /* End of file Laporan_pm.php */
