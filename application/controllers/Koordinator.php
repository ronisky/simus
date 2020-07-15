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
            $data['grap'] = $this->model_main->grafik_kunjungan();

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

    // Profile 
    function profile()
    {
        $id = $this->session->id_pengguna;
        $data['title'] = 'Profile Saya - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $row = $this->db->get_where('tb_pengguna', "id_pengguna='$id'")->row_array();
        $data['record'] = $row;
        $id_alamat = $row['id_alamat'];
        $data['rows'] = $this->model_app->alamat_konsumen($id_alamat)->row_array();
        $this->template->load('template/template', 'koordinator/profile/view_profile', $data);
    }

    function edit_profile()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('g');
            $hasil = $this->upload->data();

            if ($hasil['file_name'] != '') {
                $data = array(
                    'username' => $this->db->escape_str(strip_tags($this->input->post('a'))),
                    'nama_lengkap' => $this->db->escape_str(strip_tags($this->input->post('b'))),
                    'email' => $this->db->escape_str(strip_tags($this->input->post('aa'))),
                    'jenis_kelamin' => $this->db->escape_str($this->input->post('d')),
                    'tgl_lahir' => $this->db->escape_str($this->input->post('e')),
                    'no_telp' => $this->db->escape_str(strip_tags($this->input->post('f'))),
                    'foto' => $hasil['file_name'],
                );
            } else {
                $data = array(
                    'username' => $this->db->escape_str(strip_tags($this->input->post('a'))),
                    'nama_lengkap' => $this->db->escape_str(strip_tags($this->input->post('b'))),
                    'email' => $this->db->escape_str(strip_tags($this->input->post('aa'))),
                    'jenis_kelamin' => $this->db->escape_str($this->input->post('d')),
                    'tgl_lahir' => $this->db->escape_str($this->input->post('e')),
                    'no_telp' => $this->db->escape_str(strip_tags($this->input->post('f')))
                );
            }
            $where = array('username' => $this->input->post('id'));
            $this->model_app->update('tb_pengguna', $data, $where);

            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Profile berhasil diperbaharui</center>
          		</div>');

            redirect('koordinator/profile/');
        } else {
            $data['title'] = 'Ubah Profil Saya';
            $data['breadcrumb'] = 'Ubah Profil';
            $data['row'] = $this->model_app->profile_konsumen($this->session->id_pengguna)->row_array();
            $data['kota'] = $this->model_app->view('tb_kota');
            $this->template->load('template/template', 'koordinator/profile/view_profile_edit', $data);
        }
    }

    function edit_alamat()
    {
        $row = $this->db->get_where('tb_pengguna', array('id_pengguna' => $this->session->id_pengguna))->row_array();
        $id_alamat = $row['id_alamat'];
        if (isset($_POST['submit'])) {

            $data = array(
                'alamat' => $this->db->escape_str(strip_tags($this->input->post('alamat'))),
                'id_kota' => $this->db->escape_str(strip_tags($this->input->post('kab'))),
                'kecamatan' => $this->db->escape_str(strip_tags($this->input->post('kec'))),
                'kode_pos' => $this->db->escape_str(strip_tags($this->input->post('kode_pos')))
            );
            $this->model_app->alamat_update(decrypt_url($this->input->post('id')), $data);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Alamat berhasil diperbaharui</center>
          		</div>');
            redirect('koordinator/profile/');
        } else {
            $data['title'] = 'Ubah Alamat Saya - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['row'] = $this->db->get_where('tb_alamat', array('id_alamat' => $id_alamat))->row_array();
            $data['kota'] = $this->model_app->view('tb_kota');
            $this->template->load('template/template', 'koordinator/profile/view_alamat', $data);
        }
    }

    function password()
    {
        $id = $this->session->id_pengguna;
        $pass = $this->input->post('pass');
        $pass_new = $this->input->post('pass1');

        $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek',
            'required' => 'Password baru wajib diisi'
        ]);

        $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]', [
            'matches' => 'Password tidak sama',
            'required' => 'Konfirmasi password baru wajib diisi'
        ]);

        $this->form_validation->set_rules('pass', 'Password', 'required|trim', [
            'required' => 'Password saat ini wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Ganti Password - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'koordinator/profile/view_password', $data);
        } else {

            $this->db->from('tb_pengguna');
            $this->db->where("(tb_pengguna.id_pengguna = '$id')");
            $user = $this->db->get()->row_array();

            if (password_verify($pass, $user['password'])) {
                $data = array('password' => password_hash($pass_new, PASSWORD_DEFAULT));
                $where = array('id_pengguna' => $id);
                $this->model_app->update('tb_pengguna', $data, $where);
                $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Profile berhasil diperbaharui</center>
          		</div>');
                redirect('koordinator/password');
            } else {
                $this->session->set_flashdata('message1', '
				<div class="alert alert-danger col-sm-12" role="alert">
            	<center>Password salah</center>
				</div>');
                redirect('koordinator/password');
            }
        }
    }
    function saranMasukan()
    {
        $data['title'] = 'Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->db->query("SELECT * FROM tb_saran_masukan ORDER BY id ASC")->result_array();
        $this->template->load('template/template', 'koordinator/saranMasukan/view_saran_masukan', $data);
    }
}
