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
    // Start Laporan Admin 
    // laporan artikel 
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

    // Lapran Pengguna 
    function laporanPengguna()
    {
        return $this->db->query("SELECT * FROM `tb_pengguna` ORDER BY tgl_daftar DESC");
    }
    function laporanPengguna1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl_daftar='$hari'");
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get('tb_pengguna');
    }

    function laporanPengguna7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl_daftar > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get('tb_pengguna');
    }

    function laporanPengguna30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl_daftar > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get('tb_pengguna');
    }

    function laporanPengguna360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tgl_daftar > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get('tb_pengguna');
    }
    // End laporan admin 


    // Start laporan resepsionis 
    function laporanPengunjung()
    {
        return $this->db->query("SELECT * FROM `tb_pengunjung` ORDER BY tanggal DESC");
    }
    function laporanPengunjung1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal='$hari'");
        $this->db->order_by('id_pengunjung', 'desc');
        return $this->db->get('tb_pengunjung');
    }

    function laporanPengunjung7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('id_pengunjung', 'asc');
        return $this->db->get('tb_pengunjung');
    }

    function laporanPengunjung30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('id_pengunjung', 'asc');
        return $this->db->get('tb_pengunjung');
    }

    function laporanPengunjung360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('id_pengunjung', 'asc');
        return $this->db->get('tb_pengunjung');
    }
}
