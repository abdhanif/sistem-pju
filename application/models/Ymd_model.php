<?php
class Ymd_model extends CI_Model
{

    public function index()
    {
        $query = $this->db->query("SELECT transaksi.`id_donatur`, donatur.name, MAX(transaksi.tanggal_transaksi) AS terakhir, COUNT(transaksi.id_donatur) AS total, SUM(transaksi.nominal) AS jumlah, MIN(datediff(current_date(), tanggal_transaksi)) as selisih
                FROM `transaksi`
                JOIN `donatur` ON donatur.`id_donatur` = transaksi.`id_donatur` GROUP BY `id_donatur`");
        return $query->result();
    }

    public function treshold()
    {
        $query = $this->db->query("SELECT CEIL (COUNT(DISTINCT transaksi.id_donatur)* 0.33) AS ta, CEIL (COUNT(DISTINCT transaksi.id_donatur)* 0.66) AS tb
        FROM `transaksi`
        JOIN `donatur` ON donatur.`id_donatur` = transaksi.`id_donatur`");
        return $query->result();
    }

    public function recency()
    {
        $query = $this->db->query("SELECT MIN(datediff(current_date(
        ), tanggal_transaksi)) as selisih
                FROM `transaksi`
                JOIN `donatur` ON donatur.`id_donatur` = transaksi.`id_donatur` GROUP BY transaksi.`id_donatur`
                ORDER BY selisih ASC");
        return $query->result();
    }

    public function frequency()
    {
        $query = $this->db->query("SELECT COUNT(transaksi.id_donatur) AS total
                FROM `transaksi`
                JOIN `donatur` ON donatur.`id_donatur` = transaksi.`id_donatur` GROUP BY transaksi.`id_donatur`
                ORDER BY total ASC");
        return $query->result();
    }

    public function monetary()
    {
        $query = $this->db->query("SELECT SUM(transaksi.nominal) AS jumlah
                FROM `transaksi`
                JOIN `donatur` ON donatur.`id_donatur` = transaksi.`id_donatur` GROUP BY transaksi.`id_donatur`
                ORDER BY jumlah ASC");
        return $query->result();
    }
}
