<?php
class Agen_model extends CI_Model {

    public function insert()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['nama'], 
            'notelp' => $post['notelp'], 
            'alamat' => $post['alamat'], 
        );
        $this->db->insert('agen',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get()
    {
        return $this->db->get('agen')->result();
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('agen')->row_array();
    }

    public function update($id)        
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'], 
            'notelp' => $post['notelp'], 
            'alamat' => $post['alamat'], 
        );
        $this->db->where('id',$id);
        $this->db->update('agen',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('agen');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}