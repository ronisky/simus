<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_artikel');
	}

	function index()
	{
		$jumlah = $this->model_app->view('tb_toko_produk')->num_rows();
		$config['base_url'] = base_url() . 'produk/index';
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


			$data['title'] = title();
			$data['record'] = $this->model_app->view_ordering_limit('tb_toko_produk', 'id_produk', 'DESC', $dari, $config['per_page']);
			$data['artikel'] = $this->model_artikel->semua_artikel(0, 15);
			$this->pagination->initialize($config);
			$this->template->load('home/template', 'home/view_home', $data);
			//$this->load->view('home/template');
		} else {
			redirect('main');
		}
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
		$this->template->load('template/template', 'home/profile/view_profile', $data);
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

			redirect('main/profile/');
		} else {
			$data['title'] = 'Ubah Profil Saya';
			$data['breadcrumb'] = 'Ubah Profil';
			$data['row'] = $this->model_app->profile_konsumen($this->session->id_pengguna)->row_array();
			$data['kota'] = $this->model_app->view('tb_kota');
			$this->template->load('template/template', 'home/profile/view_profile_edit', $data);
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
			redirect('main/profile/');
		} else {
			$data['title'] = 'Ubah Alamat Saya - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['row'] = $this->db->get_where('tb_alamat', array('id_alamat' => $id_alamat))->row_array();
			$data['kota'] = $this->model_app->view('tb_kota');
			$this->template->load('template/template', 'home/profile/view_alamat', $data);
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
			$this->template->load('template/template', 'home/profile/view_password', $data);
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
				redirect('main/password');
			} else {
				$this->session->set_flashdata('message1', '
				<div class="alert alert-danger col-sm-12" role="alert">
            	<center>Password salah</center>
				</div>');
				redirect('main/password');
			}
		}
	}
}
