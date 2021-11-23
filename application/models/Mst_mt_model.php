<?php
class Mst_mt_model extends CI_Model
{
    private $table = "master_data_maintenance";
    public function getAllMstMt()
    {
        $this->db->order_by("master_data_maintenance.id ASC");
        return $this->db->get($this->table)->result();
    }
}