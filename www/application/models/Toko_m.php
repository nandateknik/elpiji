<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Toko_m extends CI_Model
{

    public function get()
    {
        return $this->db->get('toko')->row();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $data = array(
            'toko' => $post['toko'],
            'alamat' => $post['alamat'],
            'telp' => $post['telp'],
        );

        $this->db->update('toko', $data, array('id' => $id));
    }
}
    
    /* End of file Toko_m.php */
