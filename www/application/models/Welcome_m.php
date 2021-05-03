<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_m extends CI_Model
{

    public function login()
    {
        $post = $this->input->post();
        $data = $this->db->get_where('user', array('user' => $post['username']))->row();

        if (empty($data)) {
            $this->session->set_userdata('login', false);
        } else {
            if ($data->password = $post['password']) {
                $newdata = array(
                    'id'  => $data->id,
                    'user'  => $data->user,
                    'role'     => $data->role_id,
                    'login' => TRUE
                );
                $this->session->set_userdata($newdata);
            }
        }
    }
}
    
    /* End of file Welcome_m.php */
