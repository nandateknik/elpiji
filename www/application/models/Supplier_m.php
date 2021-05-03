<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_m extends CI_Model
{
    public function insert()
    {
        $post = $this->input->post();
        $this->db->insert('supplier', $post);
    }

    public function get()
    {
        return $this->db->get('supplier')->result();
    }

    public function update()
    {
        $data = $this->input->post();
        $this->db->where('kode', $data['kode']);
        $this->db->update('supplier', $data);
    }

    public function delete($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('supplier');
    }
}
    
    /* End of file Supplier_m.php */
