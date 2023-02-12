<?php
class Laporan_model extends CI_Model {

    public function getLo($awal = null, $akhir = null)
    {
        $this->db->where('tanggal >=', $awal);
        $this->db->where('tanggal <=', $akhir);
        $total = $this->db->get('transaksi')->num_rows();
        return ($total*560)*3;
    }

    public function getGain()
    {
        $this->db->where('tanggal >=', $_SESSION['awal']);
        $this->db->where('tanggal <=', $_SESSION['akhir']);
        return $this->db->get('neraca')->result();
    }

    public function getSallary()
    {
        $this->db->select('transaksi.*,agen.nama as agen,sopir.nama as sopir');
        $this->db->from('transaksi');
        $this->db->join('agen', 'agen.id = transaksi.id_agen');
        $this->db->join('sopir', 'sopir.id = transaksi.id_sopir');
        $this->db->where('tanggal >=', $_SESSION['awal']);
        $this->db->where('tanggal <=', $_SESSION['akhir']);
    
        if($_SESSION['id_agen'] != 0){
            $this->db->where('id_agen =', $_SESSION['id_agen']);
        }
     
        return $this->db->get()->result();
    }

    public function getAll()
    {
        return $this->db->get('neraca')->result();
    }

    public function getAgen()
    {
        return $this->db->get('agen')->result();
    }

}