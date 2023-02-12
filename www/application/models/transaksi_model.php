<?php
class Transaksi_model extends CI_Model {
    
    public function getSopir()
    {
        return $this->db->get('sopir')->result();
    }

    public function getAgen()
    {
        return $this->db->get('agen')->result();
    }


    public function get()
    {
        $this->db->select('transaksi.nopol,transaksi.id,transaksi.no_lo,transaksi.fee,transaksi.tanggal,sopir.nama as nama_sopir,agen.nama as nama_agen');
        $this->db->from('transaksi');
        $this->db->join('sopir', 'sopir.id = transaksi.id_sopir','left');
        $this->db->join('agen', 'agen.id = transaksi.id_agen','left');
        $this->db->order_by('transaksi.id', 'DESC');
        return $this->db->get()->result();
    }

    public function getTransaksiByDate($tanggal)
    {
        $this->db->where('tanggal',$tanggal);
        return $this->db->get('neraca')->row_array();
    }
    public function insertLo()
    {
        $post = $this->input->post();
        $tanggal = $post['tanggal']; 
        $neraca = $this->getTransaksiByDate($tanggal);
        $lo = 1680;
        $tangki = $neraca['tangki_lo'];
        $tambah = $tangki + $lo;

        $data = array(
            'tangki_lo' => $tambah,
         );
        $this->db->where('tanggal',$tanggal);
        $this->db->update('neraca',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function insertGain()
    {
        $post = $this->input->post();
        $tanggal = $post['tanggal']; 
        $neraca = $this->getTransaksiByDate($tanggal);

        $tangkiAwal = $neraca['tangki_awal'];
        $tangkiLo   = $neraca['tangki_lo'];
        $tangkiIsi  = $neraca['tangki_isi'];
        $tangkiAkhir = $neraca['tangki_akhir'];

        $akhir = $tangkiAwal - $tangkiLo + $tangkiIsi;
        $gain = $akhir - $tangkiAkhir;
        $data = array(
            'isi_akhir' => $akhir,
            'gain' => $gain,
         );

        $this->db->where('tanggal',$tanggal);
        $this->db->update('neraca',$data);
    }

    public function deleteLo($tanggal = null)
    {
        $neraca = $this->getTransaksiByDate($tanggal);
        $tangkiLo = $neraca['tangki_lo']; 
        $lo = 1680;

        $tambah = $tangkiLo - $lo;
        $data = array(
            'tangki_lo' => $tambah,
         );

        $this->db->where('tanggal',$tanggal);
        $this->db->update('neraca',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteGain($tanggal = null)
    {
        $neraca = $this->getTransaksiByDate($tanggal);
        $tangkiLo = $neraca['tangki_lo']; 
        $tangkiAwal = $neraca['tangki_awal'];
        $tangkiLo   = $neraca['tangki_lo'];
        $tangkiIsi  = $neraca['tangki_isi'];
        $tangkiAkhir = $neraca['tangki_akhir'];

        $akhir = $tangkiAwal - $tangkiLo + $tangkiAkhir;
        $gain = $akhir - $tangkiAkhir;
        $data = array(
            'isi_akhir' => $akhir,
            'gain' => $gain,
         );
        $this->db->where('tanggal',$tanggal);
        $this->db->update('neraca',$data);
    }

    public function insert()
    {
        $post = $this->input->post();
        $nopol = preg_replace('/\s+/', '', strtoupper($post['nopol']));
        $data = array(
            'tanggal' => $post['tanggal'], 
            'id_sopir' => $post['id_sopir'], 
            'id_agen' => $post['id_agen'], 
            'no_lo' => $post['no_lo'], 
            'fee' => $post['fee'],
            'nopol' => $nopol 

        );
            if ($this->insertLo()) {
                $this->insertGain();
                $this->db->insert('transaksi',$data);
            }
            return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('transaksi')->row_array();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $nopol = preg_replace('/\s+/', '', strtoupper($post['nopol']));
        $data = array(
            'tanggal' => $post['tanggal'], 
            'id_sopir' => $post['id_sopir'], 
            'id_agen' => $post['id_agen'], 
            'fee' => $post['fee'],
            'nopol' => $nopol
        );
        $this->db->where('id',$id);
        $this->db->update('transaksi',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function delete($id)
    {
        $this->db->where('id',$id);
        $neraca = $this->db->get('transaksi')->row_array();
        $tanggal = $neraca['tanggal'];
        if ($this->deleteLo($tanggal)) {
            $this->deleteGain($tanggal);
            $this->db->where('id',$id);
            $this->db->delete('transaksi');
        };
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}