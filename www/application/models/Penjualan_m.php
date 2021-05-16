<?php class Penjualan_m extends CI_Model
{
    public function bayar()
    {
        $post = $this->input->post();
        $data = array(
            'nota' => $post['nota'],
            'tanggal' => date('Y-m-d'),
            'total' =>  $post['total'],
            'id_user' => $post['id_user'],
            'bayar' => $post['bayar'],
            'kembalian' => $post['kembalian']
        );
        $this->db->insert('penjualan', $data);
    }
    public function saveCart()
    {
        $inp = $this->input->post();

        foreach ($this->cart->contents() as $key) {
            $brg = $this->db->get_where('barang', ['kode' => $key['id']])->row();
            $cart = array(
                'id_penjualan' => $inp['nota'],
                'id_brg' => $key['id'],
                'jumlah' => $key['qty'],
                'harga_jual' => $key['price'],
                'harga_beli' => $brg->harga_beli,
                'keuntungan' => ($key['price'] - $brg->harga_beli) * $key['qty']
            );
            $stok = $brg->stok - $key['qty'];
            $this->updateStok($key['id'], $stok);
            $this->db->insert('transaksi_penjualan', $cart);
        }

        $this->cart->destroy();
    }
    public function addCart()
    {
        $post = $this->input->post();
        $data = array(
            array(
                'id'      => $post['kode_brg'],
                'qty'     => $post['jumlah'],
                'price'   => $post['harga_jual'],
                'name'    => $post['nama']
            )
        );
        $this->cart->insert($data);
    }
    public function minCart()
    {
        $post = $this->input->post();
        $qty  = $post['qty'] - 1;
        $data = array(
            'rowid' => $post['rowid'],
            'qty'   => $qty
        );
        $this->cart->update($data);
    }

    public function plsCart()
    {
        $post = $this->input->post();
        $qty  = $post['qty'] + 1;
        $data = array(
            'rowid' => $post['rowid'],
            'qty'   => $qty
        );
        $this->cart->update($data);
    }

    public function updateStok($kode, $stok)
    {
        $object = array(
            'stok' => $stok
        );
        $this->db->where('kode', $kode);
        $this->db->update('barang', $object);
    }
}
    
    /* End of file Penjualan_m.php */
