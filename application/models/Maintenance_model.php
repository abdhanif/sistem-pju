<?php
class Maintenance_model extends CI_Model
{
    public function getAllMaintenance($limit, $start)
    {
        $this->db->select();
        $this->db->from('master_data_maintenance');
        $this->db->order_by("Deskripsi", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalRows()
    {
        $this->db->select();
        $this->db->from('master_data_maintenance');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function tambah()
    {
        $data = [
            'Deskripsi'  => htmlspecialchars($this->input->post('deskripsi', true)),
        ];

        $this->db->insert('master_data_maintenance', $data);
        redirect('C_maintenance');
    }

    public function hapus($ID, $maintenance)
    {
        $this->db->where($ID);
        $this->db->delete($maintenance);
    }

    public function getById($ID)
    {
        return $this->db->get_where('master_data_maintenance', ['ID' => $ID]);
    }

    public function update()
    {
        $ID =  htmlspecialchars($this->input->post('ID', true));
        $data = [
            'Deskripsi'  => htmlspecialchars($this->input->post('deskripsi', true)),
        ];

        $this->db->where('ID', $ID);
        $this->db->update('master_data_maintenance', $data);

        redirect('C_maintenance');
    }
}