<?php
class Transaksi_model extends CI_Model
{
    public function getAllTransaksi()
    {
        $this->db->select();
        $this->db->from('transaksi');
        $this->db->join('donatur', 'donatur.id_donatur = transaksi.id_donatur');
        $this->db->join('merchant', 'merchant.id_merchant = transaksi.id_merchant');
        $this->db->order_by("tanggal_transaksi", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function search($keyword)
    {
        $this->db->select();
        $this->db->from('transaksi');
        $this->db->join('donatur', 'donatur.id_donatur = transaksi.id_donatur');
        $this->db->join('merchant', 'merchant.id_merchant = transaksi.id_merchant');
        $this->db->like('name', $keyword);
        return $this->db->get()->result();
    }

    public function tambah()
    {
        $data = [
            'id_donatur'  => htmlspecialchars($this->input->post('id_donatur', true)),
            'jenis_transaksi'  => htmlspecialchars($this->input->post('jenis_transaksi', true)),
            'keterangan'  => htmlspecialchars($this->input->post('keterangan', true)),
            'nominal'  => htmlspecialchars($this->input->post('nominal', true)),
            'payment_gateway'  => htmlspecialchars($this->input->post('payment_gateway', true)),
            'tanggal_transaksi'  => htmlspecialchars($this->input->post('tanggal_transaksi', true)),
            'id_merchant'  => htmlspecialchars($this->input->post('id_merchant', true)),
        ];

        $this->db->insert('transaksi', $data);
        redirect('C_transaksi');
    }

    public function update()
    {
        $id_transaksi =  htmlspecialchars($this->input->post('id_transaksi', true));
        $data = [
            'id_donatur'  => htmlspecialchars($this->input->post('id_donatur', true)),
            'jenis_transaksi'  => htmlspecialchars($this->input->post('jenis_transaksi', true)),
            'keterangan'  => htmlspecialchars($this->input->post('keterangan', true)),
            'nominal'  => htmlspecialchars($this->input->post('nominal', true)),
            'payment_gateway'  => htmlspecialchars($this->input->post('payment_gateway', true)),
            'tanggal_transaksi'  => htmlspecialchars($this->input->post('tanggal_transaksi', true)),
            'id_merchant'  => htmlspecialchars($this->input->post('id_merchant', true)),
        ];

        $this->db->where("id_transaksi", $id_transaksi);
        $this->db->update('transaksi', $data);
        redirect('C_transaksi');
    }
    public function getById($id_transaksi)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi]);
    }

    public function getTransaksiById($id_transaksi)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    }

    public function hapus($id_transaksi, $transaksi)
    {
        $this->db->where($id_transaksi);
        $this->db->delete($transaksi);
    }
}
