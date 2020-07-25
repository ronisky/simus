<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koleksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
        $this->load->model('model_artikel');
    }

    function index()
    {

        $jumlah = $this->model_app->view('tb_koleksi')->num_rows();
        $config['base_url'] = base_url() . 'koleksi/index';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 12;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <a class="page-link">';
        $config['cur_tag_close'] = '</a><span class="sr-only">(current)</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');


        if ($this->uri->segment('3') == '') {
            $dari = 0;
        } else {
            $dari = $this->uri->segment('3');
        }

        if (is_numeric($dari)) {

            if ($this->input->post('cari') != '') {
                $data['breadcrumb'] = 'Hasil Pencarian "' . filter($this->input->post('cari')) . '"';
                $data['title'] = title();
                $data['judul'] = "Hasil Pencarian keyword - " . filter($this->input->post('cari'));
                $data['record'] = $this->model_app->cari_koleksi(filter($this->input->post('cari')));
            } else {
                $data['title'] = 'Koleksi' . ' - ' . title();
                $data['breadcrumb'] = 'Koleksi';
                $data['judul'] = 'Semua Koleksi';
                $data['record'] = $this->model_app->view_ordering_limit('tb_koleksi', 'id_koleksi', 'DESC', $dari, $config['per_page']);
                $this->pagination->initialize($config);
            }
            $data['artikel'] = $this->model_artikel->semua_artikel(0, 15);
            $this->template->load('home/template', 'home/koleksi/view_koleksi', $data);
            //$this->load->view('home/template');
        } else {
            redirect('main');
        }
    }

    function kategori()
    {
        $cek = $this->model_app->edit('tb_kategori_koleksi', array('kategori_seo' => $this->uri->segment(3)))->row_array();
        $jumlah = $this->model_app->view_where('tb_koleksi', array('id_kategori_koleksi' => $cek['id_kategori_koleksi']))->num_rows();
        $config['base_url'] = base_url() . 'main/kategori/' . $this->uri->segment(3);
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 12;
        if ($this->uri->segment('4') == '') {
            $dari = 0;
        } else {
            $dari = $this->uri->segment('4');
        }

        if (is_numeric($dari)) {
            $data['title'] = "Koleksi Kategori $cek[nama_kategori]";
            $data['breadcrumb'] = "Koleksi Kategori $cek[nama_kategori]";
            $data['record'] = $this->model_app->view_where_ordering_limit('tb_koleksi', array('id_kategori_koleksi' => $cek['id_kategori_koleksi']), 'id_koleksi', 'DESC', $dari, $config['per_page']);
            $this->pagination->initialize($config);
            $this->template->load('home/template', 'home/koleksi/view_koleksi', $data);
        } else {
            redirect('main');
        }
    }

    function detail()
    {
        $query = $this->model_app->edit('tb_koleksi', array('koleksi_seo' => $this->uri->segment(3)));
        if ($query->num_rows() >= 1) {
            $cek = $query->row_array();
            $data['title'] = "$cek[nama_koleksi]";
            $data['breadcrumb'] = "$cek[nama_koleksi]";
            $data['judul'] = "$cek[nama_koleksi]";
            $data['row'] = $this->model_app->view_where('tb_koleksi', array('id_koleksi' => $cek['id_koleksi']))->row_array();

            $this->template->load('home/template', 'home/koleksi/view_detail_koleksi', $data);
        } else {
            redirect('main');
        }
    }
}
