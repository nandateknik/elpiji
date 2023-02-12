<?php
class dashboard_model extends CI_Model {

    public function sumTransaksi()
    {
       $tanggal = date('Y-m-d');
       $this->db->where('tanggal',$tanggal);
       $query = $this->db->get('transaksi');
       if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
            else
        {
        return 0;
        }
    }

    public function sumAgen()
    {
       $tanggal = date('Y-m-d');
       $this->db->where('tanggal',$tanggal);
       $this->db->group_by("id_agen");
       $query = $this->db->get('transaksi');
       if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
            else
        {
        return 0;
        }
    }

    public function sumFee()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('SUM(fee*560) as fee');
        $this->db->where('tanggal',$tanggal);
        $this->db->group_by("tanggal");
        
        return $this->db->get('transaksi')->row_array();
    }

    public function sumGain()
    {
        $tanggal = date('Y-m-d');
        $this->db->where('tanggal',$tanggal);
        return $this->db->get('neraca')->row_array();
    }

    public function sumBulan($bulan)
    {
        $tahun = date('Y');
        $tanggal1=''.$tahun.'-'.$bulan.'-01';
        $tanggal2=''.$tahun.'-'.$bulan.'-31';
        $this->db->select('SUM(fee*560) as fee');
        $this->db->where('tanggal >=', $tanggal1);
        $this->db->where('tanggal <=', $tanggal2);
        $data = $this->db->get('transaksi')->row_array();
        return $data;
    }
    
}