<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Koordinator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
        $this->load->model('model_main');
        $this->load->model('model_menu');
        $this->load->model('model_members');
        $this->load->model('model_laporan');
        $this->load->model('model_rekening');
        $this->load->model('model_berita');
        $this->load->model('model_halaman');
        $this->load->model('model_artikel');
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

            $this->template->load('template/template', 'admin/view_dashboard', $data);
        } else {
            redirect('admin');
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
        $data['record'] = $this->db->query("SELECT * FROM tb_saran_masukan ORDER BY id ASC")->result_array();
        $this->template->load('template/template', 'koordinator/saran_masukan/view_saran_masukan', $data);
    }
}
