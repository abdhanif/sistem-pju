<?php
class Merchant_model extends CI_Model
{
    private $table = "merchant";
    public function getAllMerchant()
    {
        $this->db->order_by("merchant.id_merchant DESC");
        return $this->db->get($this->table)->result();
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('merchant');
        $this->db->like('name_merchant', $keyword);
        return $this->db->get()->result();
    }

    public function tambah()
    {
        $data = [
            'name_merchant'  => htmlspecialchars($this->input->post('name_merchant', true)),
        ];

        $this->db->insert('merchant', $data);
        redirect('C_merchant');
    }

    public function hapus($id_merchant, $merchant)
    {
        $this->db->where($id_merchant);
        $this->db->delete($merchant);
    }

    public function update()
    {
        $id_merchant =  htmlspecialchars($this->input->post('id_merchant', true));
        $data = [
            'name_merchant'  => htmlspecialchars($this->input->post('name_merchant', true))
        ];

        $this->db->where('id_merchant', $id_merchant);
        $this->db->update('merchant', $data);

        redirect('C_merchant');
    }

    public function getById($id_merchant)
    {
        return $this->db->get_where('merchant', ['id_merchant' => $id_merchant]);
    }

    public function getMerchantById($id_merchant)
    {
        return $this->db->get_where('merchant', ['id_merchant' => $id_merchant])->row_array();
    }
}
