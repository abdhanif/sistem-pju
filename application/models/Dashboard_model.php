<?php
class Dashboard_model extends CI_Model
{

    public function index()
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT transaksi.id_transaksi) as banyak_transaksi, COUNT(DISTINCT donatur.id_donatur) as banyak_dntr, CONCAT( FORMAT (SUM(transaksi.nominal), 0)) as total_transaksi
        FROM transaksi
        JOIN donatur ON donatur.id_donatur = transaksi.id_donatur
        JOIN merchant ON merchant.id_merchant = transaksi.id_merchant");
        return $query->result();
    }

    public function all()
    {
        $query = $this->db->query("SELECT merchant.name_merchant as name_merchant, COUNT(DISTINCT transaksi.id_transaksi) AS transaksi, donatur.name as name_donatur, SUM(transaksi.nominal) as nominal
        FROM `transaksi`
        JOIN donatur ON donatur.id_donatur = transaksi.id_donatur
        JOIN merchant ON merchant.id_merchant = transaksi.id_merchant
        GROUP BY transaksi.id_merchant");
        return $query->result();
    }

    public function allDonatur()
    {
        $query = $this->db->query("SELECT COUNT( DISTINCT donatur.id_donatur) as donatur, merchant.name_merchant as merchant
        FROM `transaksi`
        JOIN donatur ON donatur.id_donatur = transaksi.id_donatur
        JOIN merchant ON merchant.id_merchant = transaksi.id_merchant
        WHERE merchant.id_merchant
        GROUP BY merchant.id_merchant");
        return $query->result();
    }

    public function allNominal()
    {
        $query = $this->db->query("SELECT merchant.name_merchant as name_merchant, CONCAT( FORMAT (SUM(transaksi.nominal), 0)) as nominal
        FROM `transaksi`
        JOIN merchant ON merchant.id_merchant = transaksi.id_merchant
        GROUP BY transaksi.id_merchant");
        return $query->result();
    }
}
