<?php
class Neraca_model extends CI_Model {

    public function insert()
    {
        $post = $this->input->post();
        $data = array(
            'tanggal' => $post['tanggal'],
            'tangki_awal' => $post['tangki_awal'],
            'tangki_isi' =>$post['tangki_isi'],
            'tangki_akhir' => $post['tangki_akhir'],
            'isi_akhir' => 0,
            'tangki_lo' => 0,
            'gain' =>0

        );

        $this->db->insert('neraca',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('neraca')->result();
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('neraca');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('neraca')->row_array();
    }
    
    public function update($id)
    {
        $post = $this->input->post();
        $data = array(
            'tanggal' => $post['tanggal'],
            'tangki_awal' => $post['tangki_awal'],
            'tangki_isi' =>$post['tangki_isi'],
            'tangki_akhir' => $post['tangki_akhir'],

        );
        $this->db->where('id',$id);
        $this->db->update('neraca',$data);

        $this->db->where('tanggal',$post['tanggal']);
        $neraca = $this->db->get('neraca')->row_array();

        $akhir = $neraca['tangki_awal'] - $neraca['tangki_lo'] + $neraca['tangki_isi'];
        $gain = $akhir - $neraca['tangki_akhir'];
        $data = array(
            'isi_akhir' => $akhir,
            'gain' => $gain,
         );

        $this->db->where('tanggal',$post['tanggal']);
        $this->db->update('neraca',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }


}