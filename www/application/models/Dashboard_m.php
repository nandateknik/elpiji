<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

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
        $this->db->select('penjualan.tanggal, transaksi_penjualan.id_brg')
            ->from('transaksi_penjualan')
            ->join('penjualan', 'penjualan.nota = transaksi_penjualan.id_penjualan')
            ->where('tanggal', $tanggal);
        return $this->db->count_all_results();
    }
}
    
    /* End of file Dashboard_m.php */
