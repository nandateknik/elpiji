<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function viewPendapatan()
    {
        $tanggal = date('Y-m-d');
        return $this->db->get_where('penjualan', ['tanggal' => $tanggal])->result();
    }

    public function viewBarangTerjual()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('barang.nama,SUM(transaksi_penjualan.jumlah) as total,penjualan.tanggal')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->join('barang', 'barang.kode = transaksi_penjualan.id_brg')
            ->where('penjualan.tanggal', $tanggal)
            ->group_by('barang.nama');
        return $this->db->get()->result();
    }

    public function viewKeuntungan()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('penjualan.tanggal,barang.nama,SUM(transaksi_penjualan.jumlah) as jumlah,SUM((transaksi_penjualan.harga_jual - transaksi_penjualan.harga_beli) * transaksi_penjualan.jumlah) as untung')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->join('barang', 'barang.kode = transaksi_penjualan.id_brg')
            ->where('penjualan.tanggal', $tanggal)
            ->group_by('barang.nama');
        return $this->db->get()->result();
    }

    public function viewStokHabis()
    {
        return $this->db->query('SELECT * FROM barang WHERE stok <=10')->result();
    }

    public function CountPendapatanToday()
    {
        $tanggal = date('Y-m-d');
        $this->db->select_sum('total');
        $this->db->where('tanggal', $tanggal);
        return $this->db->get('penjualan')->row();
    }

    public function countPenjualanToday()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('penjualan.tanggal, transaksi_penjualan.id_brg, SUM(transaksi_penjualan.jumlah) as total')
            ->from('transaksi_penjualan')
            ->join('penjualan', 'penjualan.nota = transaksi_penjualan.id_penjualan')
            ->where('tanggal', $tanggal);
        return $this->db->get()->row();
    }

    public function countKeuntunganToday()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('penjualan.tanggal,transaksi_penjualan.id_brg, SUM(transaksi_penjualan.harga_jual*transaksi_penjualan.jumlah) - SUM(transaksi_penjualan.harga_beli*transaksi_penjualan.jumlah) as total')
            ->from('penjualan')
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan = penjualan.nota')
            ->where('tanggal', $tanggal);
        return $this->db->get()->row();
    }

    public function countBarangHabis()
    {
        $query = $this->db->query('SELECT * FROM barang WHERE stok <=10');
        return $query->num_rows();
    }
}
    
    /* End of file Dashboard_m.php */
