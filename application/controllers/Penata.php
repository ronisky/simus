<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penata extends CI_Controller
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
        cek_session_penata();
    }

    function index()
    {

        if ($this->session->level == 4) {
            redirect('penata/home');
        } else {
            redirect('error404');
        }
    }

    function home()
    {
        if (!empty($this->session->userdata())) {

            $data['title'] = 'Penata Pameran - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['grap'] = $this->model_main->grafik_kunjungan();

            $this->template->load('template/template', 'admin/view_dashboard', $data);
        } else {
            redirect('penata');
        }
    }

    // Modul event 
    function event()
    {
        $data['title'] = 'Event - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_artikel->list_artikel();
        $this->template->load('template/template', 'admin/blog_artikel/view_artikel', $data);
    }
}
