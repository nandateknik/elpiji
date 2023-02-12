<?php
class Auth_model extends CI_Model {

    public function login()
    {
        $post = $this->input->post();
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $db = $this->db->get('user')->row_array();
        return $db;
    }
}