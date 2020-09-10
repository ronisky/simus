<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}

	public function lupa_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email wajib diisi'

		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login' . " - " . title();
			$data['breadcrumb'] = 'Login';
			$data['judul'] = 'Login' . " - " . title();
			$this->template->load('home/template', 'home/auth/view_lupass', $data);
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('tb_pengguna', ['email' => $email, 'aktif' => 1])->row_array();

			if ($user) {

				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'dibuat' => time()
				];

				$this->db->insert('tb_pengguna_token', $user_token);
				$this->_sendEmail($token, 'lupa');
				$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
			    	<center>Berhasil, Silahkan cek email Anda</center>
					  </div>');
				redirect(base_url('auth/lupa_password'));
			} else {
				$this->session->set_flashdata('message', '
						<div class="alert alert-danger" role="alert">
				    	<center>Email tidak terdaftar</center>
				  		</div>');
				redirect(base_url('auth/lupa_password'));
			}
		}
	}

	private function _sendEmail($token, $type)
	{
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

		$this->email->from('email@ronisky.com', 'Museum Monumen Perjuangan Rakyat Jawa Barat');
		$this->email->to($this->input->post('email'));
		$message = "
						<p>Akun Anda:</p>
						<p>Email: " . $this->input->post('email') . "</p><br>
						<p>Silakan klik tautan di bawah ini untuk mereset password Anda.</p>
						<a href=" . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . ">Reset Password</a>
					";
		if ($type == 'lupa') {
			$this->email->subject('Reset Password');
			$this->email->message($message);
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function login()
	{
		// cek session
		$ses_id = $this->session->id_pengguna;
		$ses_lv = $this->session->level;

		if (empty($ses_id)) {
			$this->form_validation->set_rules('user_email', 'Email / Username', 'required|trim', [
				'required' => 'Email / Username wajib diisi'
			]);

			$this->form_validation->set_rules('password', 'Password', 'required|trim', [
				'required' => 'Password wajib diisi'
			]);
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login' . " - " . title();
				$data['breadcrumb'] = 'Login';
				$this->template->load('home/template', 'home/auth/view_login', $data);
			} else {
				$this->_login();
			}
		} else {
			if ($ses_lv == 1) {
				redirect('admin');
			} elseif ($ses_lv == 2) {
				redirect('koordinator');
			} elseif ($ses_lv == 3) {
				redirect('resepsionis');
			} else {
				redirect('penata');
			}
		}
	}

	private function _login()
	{
		$user_email 	= $this->input->post('user_email');
		$password   	= $this->input->post('password');

		$this->db->from('tb_pengguna');
		$this->db->where("(tb_pengguna.email = '$user_email' OR tb_pengguna.username = '$user_email')");
		$user = $this->db->get()->row_array();

		// jika usernya ada
		if ($user) {
			// juka usernya aktif
			if ($user['aktif'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = array(
						'id_pengguna'   => $user['id_pengguna'],
						'username'   	=> $user['username'],
						'email'     	=> $user['email'],
						'level' 		=> $user['level'],
					);
					$this->session->set_userdata($data);
					if ($user['level'] == 1) {
						redirect('admin');
					} elseif ($user['level'] == 2) {
						redirect('koordinator');
					} elseif ($user['level'] == 3) {
						redirect('resepsionis');
					} else {
						redirect('penata');
					}
				}
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <center>
                    Email / Password salah.
                    </center>
                    </div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <center>
                Email Anda belum diverifikasi, silahkan cek email Anda.
                </center>
                </div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <center>
            Email / Password salah.
            </center>
            </div>');
			redirect('login');
		}
	}

	public function register()
	{
		cek_session_admin();
		$ses = $this->session->username;

		if (!empty($ses)) {
			redirect(base_url());
		} else {
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
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
				'min_length' => 'Password terlalu pendek',
				'required' => 'Password wajib diisi'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
				'matches' => 'Password tidak sama',
				'required' => 'Konfirmasi password wajib diisi'
			]);
			$this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
				'required' => 'Kota wajib diisi'
			]);

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = 'Daftar' . " - " . title();
				$data['breadcrumb'] = 'Daftar';
				$this->template->load('home/template', 'home/auth/view_register', $data);
			} else {
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code = substr(str_shuffle($set), 0, 6);
				$code2 = substr(str_shuffle($set), 0, 6);

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
					'level'					=> 2,
					'kode_aktivasi' 		=> $code,
					'kode_resetpassword' 	=> $code2,
					'tgl_daftar' 			=> date('Y-m-d H:i:s'),
				];
				$email = $this->input->post('email');
				$subject      = "Aktivasi Akun";
				$message = "
						<h2>Terimakasih sudah mendaftar.</h2>
						<p>Akun Anda:</p>
						<p>Email: " . $email . "</p><br>
						<p>Silakan klik tautan di bawah ini untuk mengaktifkan akun Anda.</p>
						<a href='" . base_url() . "c?q=" . $code . "'>Aktivasi Akun</a>
					";

				kirim_email($email, $subject, $message);
				$this->model_app->insert('tb_pengguna', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <center>Berhasil mendaftar!<br>
            Silahkan cek email anda untuk aktivasi pendaftaran.
            </center>
          </div>');
				redirect(base_url('login'));
			}
		}
	}
	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pengguna = $this->db->get_where('tb_pengguna', ['email' => $email])->row_array();

		if ($pengguna) {
			$pengguna_token = $this->db->get_where('tb_pengguna_token', ['token' => $token])->row_array();

			if ($pengguna_token) {
				if (time() - $pengguna_token['dibuat'] < (60 * 60 * 24)) {
					$this->db->set('aktif', 1);
					$this->db->where('email', $email);
					$this->db->update('tb_pengguna');

					$this->db->delete('tb_pengguna_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah aktif! Silahkan login.</div>');
					redirect('login');
				} else {
					$this->db->delete('tb_pengguna', ['email' => $email]);
					$this->db->delete('tb_pengguna_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran Gagal! Token sudah kadaluarsa.</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi gagal! Token salah.</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi gagal! Email salah.</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pengguna = $this->db->get_where('tb_pengguna', ['email' => $email])->row_array();

		if ($pengguna) {
			$pengguna_token = $this->db->get_where('tb_pengguna_token', ['token' => $token])->row_array();

			if ($pengguna_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubahPassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Token salah.</div>');
				redirect("base_url('login')");
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email salah.</div>');
			redirect("base_url('login')");
		}
	}

	public function ubahPassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password terlalu pendek',
			'required' => 'Password wajib diisi'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'matches' => 'Password tidak sama',
			'required' => 'Konfirmasi password wajib diisi'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ganti Password';
			$data['breadcrumb'] = 'Ganti Password';
			$this->template->load('home/template', 'home/auth/view_gantipass', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('tb_pengguna');

			$this->session->unset_userdata('reset_email');

			$this->db->delete('tb_pengguna_token', ['email' => $email]);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil dirubah! Silahkan login.</div>');
			redirect('login');
		}
	}
}
