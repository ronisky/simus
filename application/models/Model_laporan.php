<?php
class Model_laporan extends CI_model
{
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

    function laporanSaranMasukan()
    {
        return $this->db->query("SELECT * FROM `tb_saran_masukan` ORDER BY tanggal DESC");
    }

    function laporanSaranMasukan1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal='$hari'");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_saran_masukan');
    }

    function laporanSaranMasukan7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_saran_masukan');
    }

    function laporanSaranMasukan30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_saran_masukan');
    }

    function laporanSaranMasukan360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('tb_saran_masukan');
    }
    // End laporan admin 


    // Start laporan resepsionis 
    function laporanPengunjung()
    {
        return $this->db->query("SELECT * FROM `tb_pengunjung` ORDER BY tanggal ASC");
    }
    function laporanPengunjung1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal='$hari'");
        $this->db->order_by('id_pengunjung', 'asc');
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

    // Laporan Reservasi 
    function laporanReservasi()
    {
        // $this->db->where("status='4'");
        $this->db->order_by('id_reservasi', 'asc');
        return $this->db->get('tb_reservasi');
    }
    function laporanReservasi1()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal='$hari'");
        $this->db->order_by('id_reservasi', 'asc');
        return $this->db->get('tb_reservasi');
    }

    function laporanReservasi7()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('id_reservasi', 'asc');
        return $this->db->get('tb_reservasi');
    }

    function laporanReservasi30()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('id_reservasi', 'asc');
        return $this->db->get('tb_reservasi');
    }

    function laporanReservasi360()
    {
        $hari = date('Y-m-d');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('id_reservasi', 'asc');
        return $this->db->get('tb_reservasi');
    }

    // Jumlah

    function jumlahPengunjung()
    {
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjung1()
    {
        $hari = date('Y-m-d');
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjung7()
    {
        $hari = date('Y-m-d');
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjung30()
    {
        $hari = date('Y-m-d');
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjung360()
    {
        $hari = date('Y-m-d');
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungUmum()
    {
        $kategori = 'Umum';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungUmum1()
    {
        $hari = date('Y-m-d');
        $kategori = 'Umum';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungUmum7()
    {
        $hari = date('Y-m-d');
        $kategori = 'Umum';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungUmum30()
    {
        $hari = date('Y-m-d');
        $kategori = 'Umum';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungUmum360()
    {
        $hari = date('Y-m-d');
        $kategori = 'Umum';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungTK()
    {
        $kategori = 'TK / PAUD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungTK1()
    {
        $hari = date('Y-m-d');
        $kategori = 'TK / PAUD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungTK7()
    {
        $hari = date('Y-m-d');
        $kategori = 'TK / PAUD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungTK30()
    {
        $hari = date('Y-m-d');
        $kategori = 'TK / PAUD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungTK360()
    {
        $hari = date('Y-m-d');
        $kategori = 'TK / PAUD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungSD()
    {
        $kategori = 'SD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSD1()
    {
        $hari = date('Y-m-d');
        $kategori = 'SD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSD7()
    {
        $hari = date('Y-m-d');
        $kategori = 'SD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSD30()
    {
        $hari = date('Y-m-d');
        $kategori = 'SD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSD360()
    {
        $hari = date('Y-m-d');
        $kategori = 'SD';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungSMP()
    {
        $kategori = 'SMP';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungSMP1()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMP';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMP7()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMP';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMP30()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMP';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMP360()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMP';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungSMA()
    {
        $kategori = 'SMA / SMK';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMA1()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMA / SMK';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMA7()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMA / SMK';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMA30()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMA / SMK';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungSMA360()
    {
        $hari = date('Y-m-d');
        $kategori = 'SMA / SMK';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungUniv()
    {
        $kategori = 'Universitas / PT';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungUniv1()
    {
        $hari = date('Y-m-d');
        $kategori = 'Universitas / PT';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungUniv7()
    {
        $hari = date('Y-m-d');
        $kategori = 'Universitas / PT';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungUniv30()
    {
        $hari = date('Y-m-d');
        $kategori = 'Universitas / PT';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungUniv360()
    {
        $hari = date('Y-m-d');
        $kategori = 'Universitas / PT';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungManca()
    {
        $kategori = 'Mancanegara';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungManca1()
    {
        $hari = date('Y-m-d');
        $kategori = 'Mancanegara';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungManca7()
    {
        $hari = date('Y-m-d');
        $kategori = 'Mancanegara';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungManca30()
    {
        $hari = date('Y-m-d');
        $kategori = 'Mancanegara';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungManca360()
    {
        $hari = date('Y-m-d');
        $kategori = 'Mancanegara';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("kategori='$kategori'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }

    function jumlahPengunjungNusan()
    {
        $negara = 'Indonesia';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("negara='$negara'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungNusan1()
    {
        $hari = date('Y-m-d');
        $negara = 'Indonesia';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal='$hari'");
        $this->db->where("negara='$negara'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungNusan7()
    {
        $hari = date('Y-m-d');
        $negara = 'Indonesia';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->where("negara='$negara'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungNusan30()
    {
        $hari = date('Y-m-d');
        $negara = 'Indonesia';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->where("negara='$negara'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }
    function jumlahPengunjungNusan360()
    {
        $hari = date('Y-m-d');
        $negara = 'Indonesia';
        $this->db->select('SUM(jumlah) as jumlah');
        $this->db->where("tanggal > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->where("negara='$negara'");
        $this->db->from('tb_pengunjung');
        return $this->db->get()->row()->jumlah;
    }


    // Penata 
    function laporanKoleksi()
    {
        return $this->db->query("SELECT * FROM tb_koleksi AS k INNER JOIN tb_ukuran_koleksi AS u ON k.id_ukuran = u.id_ukuran ORDER BY tanggal_pencatatan DESC ");
    }
}
