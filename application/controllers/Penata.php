<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
        $this->load->model('model_laporan');
        cek_session_penata();
    }

    function index()
    {

        if ($this->session->level == 4) {
            redirect('penata/koleksi');
        } else {
            redirect('error404');
        }
    }

    function kategori_koleksi()
    {

        $data['title'] = 'Kategori Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');

        $this->template->load('template/template', 'penata/kategori_koleksi/view_kategori_koleksi', $data);
    }

    function tambah_kategori_koleksi()
    {

        if (isset($_POST['submit'])) {
            $data = array('nama_kategori' => htmlspecialchars($this->input->post('a')), 'kategori_seo' => seo_title(htmlspecialchars($this->input->post('a'))));
            $this->model_app->insert('tb_kategori_koleksi', $data);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Kategori berhasil ditambahkan</center>
          		</div>');
            redirect('penata/kategori_koleksi');
        } else {
            $data['title'] = 'Tambah Kategori Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'penata/kategori_koleksi/view_kategori_koleksi_tambah', $data);
        }
    }

    function edit_kategori_koleksi()
    {
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $data = array('nama_kategori' => htmlspecialchars($this->input->post('a')), 'kategori_seo' => seo_title(htmlspecialchars($this->input->post('a'))));
            $where = array('id_kategori_koleksi' => $this->input->post('id'));
            $this->model_app->update('tb_kategori_koleksi', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Kategori berhasil diperbaharui</center>
          		</div>');
            redirect('penata/kategori_koleksi');
        } else {
            $edit = $this->model_app->edit('tb_kategori_koleksi', array('id_kategori_koleksi' => $id))->row_array();
            $data = array('rows' => $edit);
            $data['title'] = 'Ubah Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'penata/kategori_koleksi/view_kategori_koleksi_edit', $data);
        }
    }

    function delete_kategori_koleksi($id)
    {
        $where = array('id_kategori_koleksi' => $id);
        $this->model_app->delete('tb_kategori_koleksi', $where);
        echo json_encode(array("status" => TRUE));
    }

    function koleksi()
    {
        $data['title'] = 'Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_koleksi', 'nama_koleksi', 'ACS');
        $this->template->load('template/template', 'penata/koleksi/view_koleksi', $data);
    }

    function tambah_koleksi()
    {

        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/koleksi/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000'; // kb
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            if ($hasil['file_name'] == '') {
                $ukuran = array(
                    'tinggi'    => htmlspecialchars($this->input->post('tg')),
                    'panjang'   => htmlspecialchars($this->input->post('pjg')),
                    'lebar'     => htmlspecialchars($this->input->post('lb')),
                    'diameter'  => htmlspecialchars($this->input->post('dia')),
                    'berat'     => htmlspecialchars($this->input->post('br'))
                );

                $this->model_app->insert('tb_ukuran_koleksi', $ukuran);
                $data = array(
                    'id_ukuran'             => $this->db->insert_id(),
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );
            } else {
                $ukuran = array(
                    'tinggi'    => htmlspecialchars($this->input->post('tg')),
                    'panjang'   => htmlspecialchars($this->input->post('pjg')),
                    'lebar'     => htmlspecialchars($this->input->post('lb')),
                    'diameter'  => htmlspecialchars($this->input->post('dia')),
                    'berat'     => htmlspecialchars($this->input->post('br'))
                );
                $this->model_app->insert('tb_ukuran_koleksi', $ukuran);
                $data = array(
                    'id_ukuran'             => $this->db->insert_id(),
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'foto'                => $hasil['file_name'],
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );
            }

            $this->model_app->insert('tb_koleksi', $data);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Tambah data berhasil</center>
          		</div>');
            redirect('penata/koleksi');
        } else {

            $data['title'] = 'Tambah Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');
            $this->template->load('template/template', 'penata/koleksi/view_koleksi_tambah', $data);
        }
    }

    function edit_koleksi()
    {

        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/koleksi/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000'; // kb
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            if ($hasil['file_name'] == '') {
                $ukuran = array(
                    'tinggi'    => htmlspecialchars($this->input->post('tg')),
                    'panjang'   => htmlspecialchars($this->input->post('pjg')),
                    'lebar'     => htmlspecialchars($this->input->post('lb')),
                    'diameter'  => htmlspecialchars($this->input->post('dia')),
                    'berat'     => htmlspecialchars($this->input->post('br'))
                );
                $this->model_app->insert('tb_ukuran_koleksi', $ukuran);
                $data = array(
                    'id_ukuran'             => $this->db->insert_id(),
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );
            } else {
                $ukuran = array(
                    'tinggi'    => htmlspecialchars($this->input->post('tg')),
                    'panjang'   => htmlspecialchars($this->input->post('pjg')),
                    'lebar'     => htmlspecialchars($this->input->post('lb')),
                    'diameter'  => htmlspecialchars($this->input->post('dia')),
                    'berat'     => htmlspecialchars($this->input->post('br'))
                );
                $this->model_app->insert('tb_ukuran_koleksi', $ukuran);
                $data = array(
                    'id_ukuran'             => $this->db->insert_id(),
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'foto'                => $hasil['file_name'],
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );

                $query = $this->db->get_where('tb_koleksi', array('id_koleksi' => $this->input->post('id')));
                $row = $query->row();
                $gambar = $row->foto;
                $path = "assets/images/koleksi/";
                unlink($path . $gambar);
            }

            $where = array('id_koleksi' => $this->input->post('id'));
            $this->model_app->update('tb_koleksi', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil diperbaharui</center>
          		</div>');
            redirect('penata/koleksi');
        } else {

            $data['title'] = 'Edit - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');
            $data['uk'] = $this->model_app->edit('tb_ukuran_koleksi', array('id_ukuran' => $id))->row_array();
            $data['rows'] = $this->model_app->edit('tb_koleksi', array('id_koleksi' => $id))->row_array();
            $this->template->load('template/template', 'penata/koleksi/view_koleksi_edit', $data);
        }
    }

    function detail_koleksi()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Edit - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');
        $data['uk'] = $this->model_app->edit('tb_ukuran_koleksi', array('id_ukuran' => $id))->row_array();
        $data['rows'] = $this->model_app->edit('tb_koleksi', array('id_koleksi' => $id))->row_array();
        $this->template->load('template/template', 'penata/koleksi/view_koleksi_detail', $data);
    }

    function delete_koleksi($id)
    {
        $query = $this->db->get_where('tb_koleksi', array('id_koleksi' => $id));
        $row = $query->row();
        $gambar = $row->foto;
        $q = $row->id_ukuran;
        $path = "assets/images/koleksi/";
        unlink($path . $gambar);

        $sql = "DELETE tb_koleksi,Tb_ukuran_koleksi
        FROM tb_koleksi,Tb_ukuran_koleksi
        WHERE tb_koleksi.id_ukuran=tb_ukuran_koleksi.id_ukuran
        AND tb_koleksi.id_ukuran= $q";

        $this->db->query($sql, array($id));

        echo json_encode(array("status" => TRUE));
    }

    function laporanKoleksi()
    {
        $data['title'] = 'Laporan Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanKoleksi();
        $this->template->load('template/template', 'penata/laporan/view_lap_koleksi', $data);
    }
}
