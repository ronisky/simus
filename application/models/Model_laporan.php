<?php
class Model_laporan extends CI_model
{
    // function laporan1()
    // {
    //     $hari = date('Y-m-d');
    //     $this->db->where("proses='3'");
    //     $this->db->where("waktu_transaksi='$hari'");
    //     $this->db->order_by('waktu_transaksi', 'asc');
    //     return $this->db->get('tb_toko_penjualan');
    // }

    function laporan()
    {
        return $this->db->query("SELECT * FROM `tb_blog_artikel` ORDER BY tanggal DESC");
    }

    function laporan1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal='$hari'");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_blog_artikel');
    }

    function laporan7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_blog_artikel');
    }

    function laporan30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_blog_artikel');
    }

    function laporan360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_blog_artikel');
    }

    // Lapran Berita 
    function laporanBerita()
    {
        return $this->db->query("SELECT * FROM `tb_berita` ORDER BY tgl DESC");
    }
    function laporanBerita1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl='$hari'");
        $this->db->order_by('tgl', 'desc');
        return $this->db->get('tb_berita');
    }

    function laporanBerita7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('tgl', 'desc');
        return $this->db->get('tb_berita');
    }

    function laporanBerita30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('tgl', 'desc');
        return $this->db->get('tb_berita');
    }

    function laporanBerita360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('tgl', 'desc');
        return $this->db->get('tb_berita');
    }

    // Lapran Berita 
    function laporanPengguna()
    {
        return $this->db->query("SELECT * FROM `tb_pengguna` ORDER BY tgl_daftar DESC");
    }
    function laporanPengguna1()
    {
        $hari = date('Y-m-d');
        $this->db->where("id_pengguna='$hari'");
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get('tb_berita');
    }

    function laporanPengguna7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('tgl', 'asc');
        return $this->db->get('tb_berita');
    }

    function laporanPengguna30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('tgl', 'asc');
        return $this->db->get('tb_berita');
    }

    function laporanPengguna360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('tgl', 'asc');
        return $this->db->get('tb_berita');
    }
}
