<?php
class akun_model extends CI_Model {

    public function getById()
    {
        $id = $_SESSION['id'];
        $this->db->where('id',$id);
        return $this->db->get('user')->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'password' => $post['password'] 
        );
        $id = $_SESSION['id'];
        $this->db->where('id',$id);
        $this->db->update('user',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getNewSession()
    {
        $id = $_SESSION['id'];
        $this->db->where('id',$id);
        $db = $this->db->get('user')->row_array();
        $session = array(
            'nama' => $db['nama'],
        );
        $this->session->set_userdata($session);
    }
}