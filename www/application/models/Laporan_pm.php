<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pm extends CI_Model
{

    public function getPenjualan()
    {
        $post = $this->input->post();
        $this->db->select('tanggal, SUM(total) as total')
            ->from('penjualan')
            ->where('tanggal >=', $post['start'])
            ->where('tanggal <=', $post['end'])
            ->group_by('tanggal');
        return $this->db->get()->result();
    }

    public function getPenjualanTotal()
    {
        $post = $this->input->post();
        $this->db->select('SUM(total) as total2')
            ->from('penjualan')
            ->where('tanggal >=', $post['start'])
            ->where('tanggal <=', $post['end']);
        return $this->db->get()->row();
    }
}
    
    /* End of file Laporan_pm.php */
