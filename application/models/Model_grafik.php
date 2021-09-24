<?php
class Model_grafik extends Ci_Model
{

    public function index()
    {
        $query = $this->db->query("SELECT transaksi.id_transaksi as id
                FROM `transaksi`");
        return $query->result();
    }
}
