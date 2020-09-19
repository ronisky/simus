<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Koordinator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_main');
        $this->load->model('model_app');
        cek_session_koordinator();
    }

    function index()
    {

        if ($this->session->level == 2) {
            redirect('koordinator/home');
        } else {
            redirect('error404');
        }
    }

    function home()
    {
        if (!empty($this->session->userdata())) {

            $data['title'] = 'Koordinator - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['grappengunjung'] = $this->model_main->grafik_kunjungan();
            $data['grap'] = $this->model_main->grafik_web();
            $this->template->load('template/template', 'admin/view_dashboard', $data);
        } else {
            redirect('koordinator');
        }
    }

    function pengguna()
    {
        $data['title'] = 'Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->db->query("SELECT * FROM tb_pengguna ORDER BY level ASC,username ASC")->result_array();
        $this->template->load('template/template', 'koordinator/pengguna/view_pengguna', $data);
    }

    function detail_pengguna()
    {
        $id = decrypt_url($this->uri->segment(3));

        $data['title'] = 'Detail Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['rows'] = $this->model_app->edit('tb_pengguna', array('id_pengguna' => $id))->row_array();
        $this->template->load('template/template', 'koordinator/pengguna/view_pengguna_detail', $data);
    }
    function saranMasukan()
    {
        $data['title'] = 'Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->db->query("SELECT * FROM tb_saran_masukan ORDER BY id_saran_masukan ASC")->result_array();
        $this->template->load('template/template', 'koordinator/saran_masukan/view_saran_masukan', $data);
    }

    function detail_saran_masukan()
    {
        $id = decrypt_url($this->uri->segment(3));
        $data['title'] = 'Detail Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->edit('tb_saran_masukan', array('id_saran_masukan' => $id))->row_array();
        $this->template->load('template/template', 'koordinator/saran_masukan/view_saran_masukan_detail', $data);
    }
    function pengunjung()
    {
        if (!empty($this->session->userdata())) {
            $data['title'] = 'Pengunjung Museum - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['kt'] = $this->db->query("SELECT * FROM tb_kategori_pengunjung")->result_array();
            $data['negara'] = $this->db->query("SELECT * FROM tb_negara")->result_array();
            $data['record'] = $this->db->query("SELECT * FROM tb_pengunjung ORDER BY id_pengunjung DESC")->result_array();
            $this->template->load('template/template', 'koordinator/pengunjung/view_pengunjung', $data);
        } else {
            redirect('koordinator', 'refresh');
        }
    }

    function detail_pengunjung()
    {
        $id = decrypt_url($this->uri->segment(3));
        $data['title'] = 'Detail Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['kt'] = $this->db->query("SELECT * FROM tb_kategori_pengunjung")->result_array();
        $data['negara'] = $this->db->query("SELECT * FROM tb_negara")->result_array();
        $data['rows'] = $this->model_app->edit('tb_pengunjung', array('id_pengunjung' => $id))->row_array();
        $this->template->load('template/template', 'koordinator/pengunjung/view_detail_pengunjung', $data);
    }

    function koleksi()
    {
        $data['title'] = 'Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_koleksi', 'id_koleksi', 'DESC');
        $this->template->load('template/template', 'koordinator/koleksi/view_koleksi', $data);
    }

    function detail_koleksi()
    {
        $id = decrypt_url($this->uri->segment(3));
        $data['title'] = 'Detail - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');
        $data['uk'] = $this->model_app->view_ordering('tb_ukuran_koleksi', 'id_ukuran', 'DESC');
        $data['rows'] = $this->model_app->edit('tb_koleksi', array('id_koleksi' => $id))->row_array();
        $this->template->load('template/template', 'koordinator/koleksi/view_koleksi_detail', $data);
    }

    // Modul Blog
    function postingan()
    {
        $data['title'] = 'Postingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_artikel->list_artikel();
        $this->template->load('template/template', 'koordinator/postingan/view_postingan', $data);
    }

    function detail_postingan()
    {
        $id = decrypt_url($this->uri->segment(3));

        $data['title'] = 'Detail Postingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['tag'] = $this->model_artikel->tag_artikel();
        $data['record'] = $this->model_artikel->kategori_artikel();
        $data['rows'] = $this->model_artikel->list_artikel_edit($id)->row_array();
        $this->template->load('template/template', 'koordinator/postingan/view_postingan_detail', $data);
    }

    // jadwal reservasi 
    public function jadwal()
    {
        $data_calendar = $this->model_app->get_list('tb_jadwal');

        $calendar = array();
        foreach ($data_calendar as $key => $val) {
            $calendar[] = array(
                'calender_id' => $val->id,
                'id'     => $val->id_reservasi,
                'title' => $val->nama,
                'start' => date_format(date_create($val->start_time), "Y-m-d H:i:s"),
                'end'     => date_format(date_create($val->end_time), "Y-m-d H:i:s"),
                'kategori' => $val->kategori,
                'jumlah' => $val->jumlah,
                'alamat' => $val->alamat,
            );
        }

        $data = array();
        $data['get_data']  = json_encode($calendar);
        $this->template->load('template/template', 'resepsionis/jadwal/view_jadwal', $data);
    }
}
