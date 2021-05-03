<?php class Transaksi_pm extends CI_Model
{
    public function get()
    {
        return  $this->db->get('penjualan')->result();
    }


    function getByNota($nota)
    {
        $this->db->select('transaksi_penjualan.id_brg, barang.nama, transaksi_penjualan.jumlah, transaksi_penjualan.harga_jual, (transaksi_penjualan.jumlah * transaksi_penjualan.harga_jual) as total')
            ->from('transaksi_penjualan')
            ->join('barang', 'barang.kode = transaksi_penjualan.id_brg')
            ->where('id_penjualan', $nota);

        $query = $this->db->get();
        return $query->result();
    }

    public function getPenjualan($nota)
    {
        $this->db->select('penjualan.total, user.user, penjualan.tanggal, penjualan.nota')
            ->from('penjualan')
            ->join('user', 'user.id = penjualan.id_user')
            ->where('nota', $nota);

        $query = $this->db->get();
        return $query->row();
    }
}
    
    /* End of file Transaksi_pm.php */
