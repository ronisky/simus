<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main');
		$this->load->model('model_menu');
		$this->load->model('model_laporan');
		$this->load->model('model_berita');
		$this->load->model('model_halaman');
		$this->load->model('model_artikel');
		cek_session_admin();
	}

	function index()
	{

		// if ($this->session->level == 1) {
		redirect('admin/home');
		// } else {
		// 	redirect('error404');
		// }
	}

	function home()
	{
		if (!empty($this->session->userdata())) {

			$data['title'] = 'Administrator - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['grappengunjung'] = $this->model_main->grafik_kunjungan();
			$data['grap'] = $this->model_main->grafik_web();

			$this->template->load('template/template', 'admin/view_dashboard', $data);
		} else {
			redirect('admin');
		}
	}

	// Modul Web
	function website()
	{
		if (isset($_POST['submit'])) {
			$this->model_main->identitas_update();
			redirect('admin/website');
		} else {
			$data['record'] = $this->model_main->identitas()->row_array();

			$data['title'] = 'Identitas Website - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$this->template->load('template/template', 'admin/website_identitas/view_identitas', $data);
		}
	}

	function menu()
	{
		$data['record'] = $this->model_menu->menu_website();
		$data['title'] = 'Menu Website - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$this->template->load('template/template', 'admin/website_menu/view_menu', $data);
	}

	function tambah_menu()
	{
		if (isset($_POST['submit'])) {
			$this->model_menu->menu_website_tambah();
			redirect('admin/menu');
		} else {
			$data['title'] = 'Tambah Menu Website - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['record'] = $this->model_menu->menu_utama();
			$this->template->load('template/template', 'admin/website_menu/view_menu_tambah', $data);
		}
	}

	function edit_menu()
	{
		$id = decrypt_url($this->uri->segment(3));
		if (isset($_POST['submit'])) {
			$this->model_menu->menu_website_update();
			redirect('admin/menu');
		} else {

			$data['title'] = 'Ubah Menu Website - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['record'] = $this->model_menu->menu_utama();
			$data['rows'] = $this->model_menu->menu_edit($id)->row_array();
			$this->template->load('template/template', 'admin/website_menu/view_menu_edit', $data);
		}
	}

	function delete_menu($id)
	{
		$this->model_menu->menu_delete($id);
		echo json_encode(array("status" => TRUE));
	}


	function logo()
	{
		if (isset($_POST['submit'])) {
			$this->model_main->logo_update();
			redirect('admin/logo');
		} else {

			$data['title'] = 'Logo Website - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['record'] = $this->model_main->logo();
			$this->template->load('template/template', 'admin/website_logo/view_logowebsite', $data);
		}
	}


	function slider()
	{
		$data['record'] = $this->model_main->slide();
		$data['title'] = 'Slider - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$this->template->load('template/template', 'admin/website_slider/view_slider', $data);
	}

	function tambah_slider()
	{
		if (isset($_POST['submit'])) {
			$this->model_main->slide_tambah();
			redirect('admin/slider');
		} else {

			$data['title'] = 'Tambah Slider - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$this->template->load('template/template', 'admin/website_slider/view_slider_tambah', $data);
		}
	}

	function edit_slider()
	{
		$id = decrypt_url($this->uri->segment(3));
		if (isset($_POST['submit'])) {
			$this->model_main->slide_update();
			redirect('admin/slider');
		} else {

			$data['title'] = 'Edit Slider - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['rows'] = $this->model_main->slide_edit($id)->row_array();
			$this->template->load('template/template', 'admin/website_slider/view_slider_edit', $data);
		}
	}

	function delete_slider($id)
	{
		$query = $this->db->get_where('tb_web_slide', array('id_slide' => $id));
		$row = $query->row();
		$gambar_besar = $row->gambar_besar;
		$gambar_kecil = $row->gambar_kecil;
		$path = "assets/images/slider/";
		unlink($path . $gambar_besar);
		unlink($path . $gambar_kecil);

		$this->model_main->slide_delete($id);
		echo json_encode(array("status" => TRUE));
	}

	function halaman()
	{
		$data['record'] = $this->model_halaman->halaman();

		$data['title'] = 'Halaman - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$this->template->load('template/template', 'admin/website_halaman/view_halaman', $data);
	}

	function tambah_halaman()
	{
		if (isset($_POST['submit'])) {
			$this->model_halaman->halaman_tambah();
			redirect('admin/halaman');
		} else {

			$data['title'] = 'Tambah Halaman Baru - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$this->template->load('template/template', 'admin/website_halaman/view_halaman_tambah');
		}
	}

	function edit_halaman()
	{
		$id = decrypt_url($this->uri->segment(3));
		if (isset($_POST['submit'])) {
			$this->model_halaman->halaman_update();
			redirect('admin/halaman');
		} else {
			$data['title'] = 'Ubah Halaman Baru - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['rows'] = $this->model_halaman->halaman_edit($id)->row_array();
			$this->template->load('template/template', 'admin/website_halaman/view_halaman_edit', $data);
		}
	}

	function delete_halaman($id)
	{
		$this->model_halaman->halaman_delete($id);
		echo json_encode(array("status" => TRUE));
	}

	// Modul Blog
	function artikel()
	{
		$data['title'] = 'Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_artikel->list_artikel();
		$this->template->load('template/template', 'admin/blog_artikel/view_artikel', $data);
	}

	function tambah_artikel()
	{

		if (isset($_POST['submit'])) {
			$this->model_artikel->list_artikel_tambah();
			redirect('admin/artikel');
		} else {
			$data['title'] = 'Tambah Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['tag'] = $this->model_artikel->tag_artikel();
			$data['record'] = $this->model_artikel->kategori_artikel();
			$this->template->load('template/template', 'admin/blog_artikel/view_artikel_tambah', $data);
		}
	}

	function edit_artikel()
	{
		$id = decrypt_url($this->uri->segment(3));
		if (isset($_POST['submit'])) {
			$this->model_artikel->list_artikel_update();
			redirect('admin/artikel');
		} else {
			$data['title'] = 'Edit Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['tag'] = $this->model_artikel->tag_artikel();
			$data['record'] = $this->model_artikel->kategori_artikel();
			$data['rows'] = $this->model_artikel->list_artikel_edit($id)->row_array();
			$this->template->load('template/template', 'admin/blog_artikel/view_artikel_edit', $data);
		}
	}

	function delete_artikel($id)
	{

		$query = $this->db->get_where('tb_blog_artikel', array('id_artikel' => $id));
		$row = $query->row();
		$gambar = $row->gambar;
		$path = "assets/images/artikel/";
		unlink($path . $gambar);

		$this->model_artikel->list_artikel_delete($id);

		echo json_encode(array("status" => TRUE));
	}

	function kategori_artikel()
	{
		$data['title'] = 'Kategori Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_artikel->kategori_artikel();
		$this->template->load('template/template', 'admin/blog_kategori/view_kategori', $data);
	}

	function tambah_kategori_artikel()
	{
		$data['title'] = 'Tambah Kategori Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
		if (isset($_POST['submit'])) {
			$this->model_artikel->kategori_artikel_tambah();
			redirect('admin/kategori_artikel');
		} else {
			$this->template->load('template/template', 'admin/blog_kategori/view_kategori_tambah');
		}
	}

	function edit_kategori_artikel()
	{
		$data['title'] = 'Edit Kategori Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$id = decrypt_url($this->uri->segment(3));
		if (isset($_POST['submit'])) {
			$this->model_artikel->kategori_artikel_update();
			redirect('admin/kategori_artikel');
		} else {
			$data['rows'] = $this->model_artikel->kategori_artikel_edit($id)->row_array();
			$this->template->load('template/template', 'admin/blog_kategori/view_kategori_edit', $data);
		}
	}

	function delete_kategori_artikel($id)
	{
		$this->model_artikel->kategori_artikel_delete($id);
		echo json_encode(array("status" => TRUE));
	}

	function tag_artikel()
	{
		$data['title'] = 'Tag Artikel - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_artikel->tag_artikel();
		$this->template->load('template/template', 'admin/blog_tag/view_tag', $data);
	}

	function tambah_tag_artikel()
	{

		if (isset($_POST['submit'])) {
			$this->model_artikel->tag_artikel_tambah();
			redirect('admin/tag_artikel');
		} else {
			$data['title'] = 'Tambah Tag - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$this->template->load('template/template', 'admin/blog_tag/view_tag_tambah', $data);
		}
	}

	function edit_tag_artikel()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_artikel->tag_artikel_update();
			redirect('admin/tag_artikel');
		} else {
			$data['title'] = 'Edit Tag - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['rows'] = $this->model_artikel->tag_artikel_edit($id)->row_array();
			$this->template->load('template/template', 'admin/blog_tag/view_tag_edit', $data);
		}
	}

	function delete_tag_artikel($id)
	{
		$this->model_artikel->tag_artikel_delete($id);
		echo json_encode(array("status" => TRUE));
	}

	// Mod Managment User
	function edit_user()
	{
		$id = decrypt_url($this->uri->segment(3));
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '' and $this->input->post('b') == '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'level' => $this->db->escape_str($this->input->post('level'))
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'level' => $this->db->escape_str($this->input->post('level')),
					'foto' => $hasil['file_name'],
				);
			} elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'level' => $this->db->escape_str($this->input->post('level'))
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'level' => $this->db->escape_str($this->input->post('level')),
					'foto' => $hasil['file_name'],
				);
			}
			$where = array('username' => $this->input->post('id'));
			$this->model_app->update('tb_pengguna', $data, $where);

			$this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Pembaruan berhasil disimpan</center>
          		</div>');

			redirect('admin/users/' . $this->input->post('id'));
		} else {
			$data['title'] = 'Edit Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$proses = $this->model_app->edit('tb_pengguna', array('username' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('template/template', 'admin/users/view_users_edit', $data);
		}
	}

	function delete_user($id)
	{
		$where = array('username' => $id);
		$this->model_app->delete('tb_pengguna', $where);
		echo json_encode(array("status" => TRUE));
	}

	function users()
	{
		if (!empty($this->session->userdata())) {
			$data['title'] = 'Manajemen Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$data['record'] = $this->db->query("SELECT * FROM tb_pengguna ORDER BY level ASC,username ASC")->result_array();
			$this->template->load('template/template', 'admin/users/view_users', $data);
		} else {
			redirect('admin');
		}
	}

	function tambah_user()
	{

		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_pengguna.email]', [
				'valid_email' => 'Email tidak valid',
				'is_unique' => 'Email sudah terdaftar',
				'required' => 'Email wajib diisi'
			]);
			$this->form_validation->set_rules('telp', 'Telp', 'required|trim|is_numeric|min_length[10]|max_length[13]', [
				'required' => 'No. Telp wajib diisi',
				'is_numeric' => 'No. Telp tidak valid',
				'min_length' => 'No. Telp tidak valid',
				'max_length' => 'No. Telp tidak valid',
			]);
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[5]|max_length[50]', [
				'required' => 'Nama wajib diisi',
				'min_length' => 'Nama terlalu pendek',
				'max_length' => 'Nama terlalu panjang',
			]);
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pengguna.username]', [
				'is_unique' => 'Username sudah terdaftar',
				'required' => 'Username wajib diisi'
			]);
			$this->form_validation->set_rules('level', 'level', 'required|trim', [
				'required' => 'Pilih level pengguna'
			]);
			$this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
				'required' => 'Kota wajib diisi'
			]);
			if ($this->form_validation->run() == FALSE) {
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($set), 0, 6);
				$data['password'] = $kode;
				$data['title'] = 'Tambah Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
				$this->template->load('template/template', 'admin/users/view_users_tambah', $data);
			} else {
				$alamat = array(
					'id_kota' 	=> $this->input->post('kota')
				);
				$this->model_app->insert('tb_alamat', $alamat);
				$data = [
					'id_alamat'             => $this->db->insert_id(),
					'email'         		=> htmlspecialchars($this->input->post('email', true)),
					'username'         		=> htmlspecialchars($this->input->post('username', true)),
					'nama_lengkap'        	=> htmlspecialchars($this->input->post('nama', true)),
					'no_telp'         		=> htmlspecialchars($this->input->post('telp', true)),
					'password'      		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'aktif'					=> 0,
					'level'					=> htmlspecialchars($this->input->post('level', true)),
					'tgl_daftar' 			=> date('Y-m-d H:i:s'),
				];

				// siapkan token
				$token = base64_encode(random_bytes(32));
				$pengguna_token = [
					'email' => htmlspecialchars($this->input->post('email', true)),
					'token' => $token,
					'dibuat' => time()
				];

				$this->model_app->insert('tb_pengguna', $data);
				$this->model_app->insert('tb_pengguna_token', $pengguna_token);

				$pass = $this->input->post('password1');
				$uname = $this->input->post('username');
				$email = $this->input->post('email');
				$subject      = "Aktivasi Akun";
				$message = "
						<h2>Selamat akun anda sudah terdaftar.</h2>
						<p>Akun Anda:</p>
						<p>Email: " . $email . "</p>
						<p>Username: " . $uname . "</p>
						<p>Password: " . $pass . "</p>
						<p>Silakan klik tautan di bawah ini untuk mengaktifkan akun Anda.</p>
						<a href=" . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . ">Aktivasi Akun</a>
					";

				kirim_email($email, $subject, $message);
				$this->session->set_flashdata('message', '<div class="alert alert-success col-sm-12" role="alert">
            <center>Berhasil mendaftar!<br>
            Silahkan cek email untuk aktivasi pendaftaran.
            </center>
          </div>');
				redirect(base_url('admin/users'));
			}
		} else {
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 6);
			$data['password'] = $code;
			$data['title'] = 'Tambah Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$this->template->load('template/template', 'admin/users/view_users_tambah', $data);
		}
	}

	function saranMasukan()
	{
		$data['title'] = 'Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->db->query("SELECT * FROM tb_saran_masukan ORDER BY id_saran_masukan DESC")->result_array();
		$this->template->load('template/template', 'admin/saran_masukan/view_saran_masukan', $data);
	}
	function detail_saran_masukan()
	{
		$id = decrypt_url($this->uri->segment(3));
		$data['title'] = 'Detail Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_app->edit('tb_saran_masukan', array('id_saran_masukan' => $id))->row_array();
		$this->template->load('template/template', 'admin/saran_masukan/view_saran_masukan_detail', $data);
	}

	function delete_saran_masukan($id)
	{
		$where = array('id_saran_masukan' => $id);
		$this->model_app->delete('tb_saran_masukan', $where);
		echo json_encode(array("status" => TRUE));
	}

	// Modul Berita
	function newsletter()
	{

		$data['record'] = $this->model_berita->list_berita();
		$data['title'] = 'Newsletter - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$this->template->load('template/template', 'admin/subs/view_newsletter', $data);
	}

	function tambah_newsletter()
	{

		if (isset($_POST['submit'])) {

			$judul = $this->db->escape_str($this->input->post('judul'));
			$isi = $this->db->escape_str($this->input->post('berita'));

			// $ci = get_instance();
			$config = [
				'protocol'  => 'smtp',
				'smtp_host' => 'smtp.hostinger.co.id',
				'smtp_user' => 'email@ronisky.com',
				'smtp_pass' => 'Monpera2020',
				'smtp_port' => 587,
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1',
				'newline'   => "\r\n"
			];
			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from('email@ronisky.com', "Museum Monumen Perjuangan Rakyat Jawa Barat");
			$this->email->to($this->model_app->emailsend());
			$this->email->subject($judul);
			$this->email->message($isi);
			$this->email->send();

			$this->model_berita->list_berita_tambah();
			$this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Berita berhasil dikirim</center>
          		</div>');
			redirect('admin/newsletter');
		} else {
			$data['title'] = 'Kirim News Letter - Museum Monumen Perjuangan Rakyat Jawa Barat';
			$this->template->load('template/template', 'admin/subs/view_newsletter_tambah', $data);
		}
	}

	function lihat_newsletter()
	{

		$data['title'] = 'Detail Newsletter - Museum Monumen Perjuangan Rakyat Jawa Barat';

		$id = $this->uri->segment(3);
		$data['rows'] = $this->model_berita->list_berita_edit($id)->row_array();
		$this->template->load('template/template', 'admin/subs/view_newsletter_edit', $data);
	}

	function delete_newsletter($id)
	{
		$this->model_berita->list_berita_delete($id);
		echo json_encode(array("status" => TRUE));
	}

	function subscriber()
	{
		$data['title'] = 'Subscriber - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->db->get_where('tb_subs', "aktif='1'")->result_array();
		$this->template->load('template/template', 'admin/subs/view_subs', $data);
	}

	function delete_subs($id)
	{
		$this->db->query("DELETE FROM tb_subs where id='$id'");
		echo json_encode(array("status" => TRUE));
	}

	// notifikasi 
	public function notifikasi_saran()
	{
		$query = $this->db->query("SELECT * FROM tb_saran_masukan WHERE status='1' ORDER BY id_saran_masukan DESC")->result();

		$output = '';
		foreach ($query as $q) {
			$output .= '
            <div class="dropdown-divider"></div>
                <a href="' . base_url('admin/hapus_notif_saran/') . $q->id_saran_masukan . '" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> ' . $q->nama . '
                    <span class="float-right text-muted text-sm">' . $q->subjek . '</span>
                </a>
            ';
		}
		echo $output;
	}

	public function jumlah_notifikasi_saran()
	{
		$query = $this->db->query("SELECT * FROM tb_saran_masukan WHERE status='1' ORDER BY id_saran_masukan ASC")->num_rows();

		$output =  $query;

		echo $output;
	}

	public function hapus_notif_saran($id)
	{
		$this->model_app->hapus_saran_notif($id);
		redirect('admin/saranMasukan');
	}


	// Laporan
	// Laporan Postingan 
	function laporan()
	{
		$data['title'] = 'Laporan Prostingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporan();
		$this->template->load('template/template', 'admin/laporan/view_lap_artikel', $data);
	}

	function laporan_hari()
	{
		$data['title'] = 'Laporan Prostingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporan1();
		$this->template->load('template/template', 'admin/laporan/view_lap_artikel', $data);
	}

	function laporan_minggu()
	{
		$data['title'] = 'Laporan Prostingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporan7();
		$this->template->load('template/template', 'admin/laporan/view_lap_artikel', $data);
	}

	function laporan_bulan()
	{
		$data['title'] = 'Laporan Prostingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporan30();
		$this->template->load('template/template', 'admin/laporan/view_lap_artikel', $data);
	}

	function laporan_tahun()
	{
		$data['title'] = 'Laporan Prostingan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporan360();
		$this->template->load('template/template', 'admin/laporan/view_lap_artikel', $data);
	}

	// Laporan Berita 
	function laporanBerita()
	{
		$data['title'] = 'Laporan Berita - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanBerita();
		$this->template->load('template/template', 'admin/laporan/view_lap_berita', $data);
	}

	function laporanBerita_hari()
	{
		$data['title'] = 'Laporan Berita - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanBerita1();
		$this->template->load('template/template', 'admin/laporan/view_lap_berita', $data);
	}

	function laporanBerita_minggu()
	{
		$data['title'] = 'Laporan Berita - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanBerita7();
		$this->template->load('template/template', 'admin/laporan/view_lap_berita', $data);
	}

	function laporanBerita_bulan()
	{
		$data['title'] = 'Laporan Berita - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanBerita30();
		$this->template->load('template/template', 'admin/laporan/view_lap_berita', $data);
	}

	function laporanBerita_tahun()
	{
		$data['title'] = 'Laporan Berita - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanBerita360();
		$this->template->load('template/template', 'admin/laporan/view_lap_berita', $data);
	}

	// Laporan Pengguna
	function laporanPengguna()
	{
		$data['title'] = 'Laporan Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanPengguna();
		$this->template->load('template/template', 'admin/laporan/view_lap_pengguna', $data);
	}

	function laporanPengguna_hari()
	{
		$data['title'] = 'Laporan Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanPengguna1();
		$this->template->load('template/template', 'admin/laporan/view_lap_pengguna', $data);
	}

	function laporanPengguna_minggu()
	{
		$data['title'] = 'Laporan Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanPengguna7();
		$this->template->load('template/template', 'admin/laporan/view_lap_pengguna', $data);
	}

	function laporanPengguna_bulan()
	{
		$data['title'] = 'Laporan Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanPengguna30();
		$this->template->load('template/template', 'admin/laporan/view_lap_pengguna', $data);
	}

	function laporanPengguna_tahun()
	{
		$data['title'] = 'Laporan Pengguna - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanPengguna360();
		$this->template->load('template/template', 'admin/laporan/view_lap_pengguna', $data);
	}

	// Saran Masukan 
	function laporanSaranMasukan()
	{
		$data['title'] = 'Laporan Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanSaranMasukan();
		$this->template->load('template/template', 'admin/laporan/view_lap_saran_masukan', $data);
	}

	function laporanSaranMasukan_hari()
	{
		$data['title'] = 'Laporan Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanSaranMasukan1();
		$this->template->load('template/template', 'admin/laporan/view_lap_saran_masukan', $data);
	}

	function laporanSaranMasukan_minggu()
	{
		$data['title'] = 'Laporan Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanSaranMasukan7();
		$this->template->load('template/template', 'admin/laporan/view_lap_saran_masukan', $data);
	}

	function laporanSaranMasukan_bulan()
	{
		$data['title'] = 'Laporan Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanSaranMasukan30();
		$this->template->load('template/template', 'admin/laporan/view_lap_saran_masukan', $data);
	}

	function laporanSaranMasukan_tahun()
	{
		$data['title'] = 'Laporan Saran dan Masukan - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['record'] = $this->model_laporan->laporanSaranMasukan360();
		$this->template->load('template/template', 'admin/laporan/view_lap_saran_masukan', $data);
	}
}
