<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function getById()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function updateProfile($id)
    {
        $post = $this->input->post();
        $data = array('nama' => $post['nama'],);
        $this->db->update('user', $data, array('id' => $id));
    }

    public function updatePassword($id)
    {
        $post = $this->input->post();
        $user = $this->db->get_where('user', ['id' => $id])->row('password');
        $push = array(
            'password' => $post['password'],
        );
        if ($post['password_lama'] == $user) {
            $this->db->where('id', $id);
            $this->db->update('user', $push);
            return 1;
        } else {
            return null;
        }
    }
}
    
    /* End of file User_m.php */
