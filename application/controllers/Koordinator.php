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
            $data['grapweb'] = $this->model_main->grafik_kunjungan_web();
            $data['grappengunjung'] = $this->model_main->grafik_kunjungan_museum();
            $this->template->load('template/template', 'admin/view_dashboard', $data);
        } else {
            redirect('koordinator');
        }
    }

    function users()
    {
        $data['title'] = 'Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->db->query("SELECT * FROM tb_pengguna ORDER BY level ASC,username ASC")->result_array();
        $this->template->load('template/template', 'koordinator/users/view_users', $data);
    }


    function saranMasukan()
    {
        $data['title'] = 'Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->db->query("SELECT * FROM tb_saran_masukan ORDER BY id_saran_masukan ASC")->result_array();
        $this->template->load('template/template', 'koordinator/saran_masukan/view_saran_masukan', $data);
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
        $id = $this->uri->segment(3);
        $data['title'] = 'Detail Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['kt'] = $this->db->query("SELECT * FROM tb_kategori_pengunjung")->result_array();
        $data['negara'] = $this->db->query("SELECT * FROM tb_negara")->result_array();
        $data['rows'] = $this->model_app->edit('tb_pengunjung', array('id_pengunjung' => $id))->row_array();
        $this->template->load('template/template', 'koordinator/pengunjung/view_detail_pengunjung', $data);
    }
}
