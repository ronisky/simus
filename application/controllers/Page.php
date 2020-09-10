<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_halaman');
		$this->load->model('model_artikel');
	}

	public function detail()
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM tb_web_halaman where judul_seo='$ids' OR id_halaman='$ids'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('main');
		}
		$data['title'] = $row->judul;
		$data['breadcrumb'] = $row->judul;
		$data['record'] = $this->model_halaman->page_detail($ids)->row_array();
		$data['infoterbaru'] = $this->model_artikel->info_terbaru(6);
		$this->model_halaman->page_dibaca_update($ids);
		$this->template->load('home/template', 'home/halaman/view_page', $data);
	}



	function sejarah_museum()
	{
		$data['title'] = 'Sejarah Musuem - Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['breadcrumb'] = 'Sejarah Musuem';
		$this->template->load('home/template', 'home/tentang/view_sejarah', $data);
	}

	function profile_museum()
	{
		$data['title'] = 'Profile Museum- Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['breadcrumb'] = 'Profile Museum';
		$this->template->load('home/template', 'home/tentang/view_profile', $data);
	}

	function faq()
	{
		$data['faq'] = $this->db->get_where("tb_faq", "jawaban != 'null'")->result_array();
		$data['title'] = 'F.A.Q- Museum Monumen Perjuangan Rakyat Jawa Barat';
		$data['breadcrumb'] = 'F.A.Q';
		$this->template->load('home/template', 'home/faq/view_faq', $data);
	}
	function kirimfaq()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'nama'	=> htmlspecialchars($this->input->post('nama')),
				'email'	=> htmlspecialchars($this->input->post('email')),
				'pertanyaan'	=> htmlspecialchars($this->input->post('pertanyaan')),
				'jawaban'	=> 'null'
			);
			$this->model_app->insert('tb_faq', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Terima kasih, pertanyaan Anda berhasil dikirim</center>
          		</div>');
			redirect('page/faq', 'refresh');
		}
	}
}
