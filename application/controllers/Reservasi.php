<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
    }

    public function index()
    {
        $dariDB = $this->model_app->cekIdReservasi();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $Id = 'RM' . $kodenya;

        $data['title'] = 'Reservasi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['breadcrumb'] = 'Reservasi Kunjungan';
        $data['id'] = $Id;
        $this->template->load('home/template', 'home/reservasi/view_reservasi', $data);
    }
    public function pengajuanReservasi()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/reservasi/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size'] = '5112'; // kb
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            $hasil = $this->upload->data();

            $id     = htmlspecialchars($this->input->post('id'));
            $tanggal = htmlspecialchars($this->input->post('tanggal'));
            $waktu  = htmlspecialchars($this->input->post('waktu'));
            $nama   = htmlspecialchars($this->input->post('nama'));
            $email  = htmlspecialchars($this->input->post('email'));
            $no_telp = htmlspecialchars($this->input->post('no_telp'));

            if ($hasil['file_name'] != '') {
                $data = array(
                    'id_reservasi'      => $id,
                    'tanggal'           => $tanggal,
                    'waktu'             => $waktu,
                    'kategori'          => htmlspecialchars($this->input->post('kategori')),
                    'jumlah'            => htmlspecialchars($this->input->post('jumlah')),
                    'nama'              => $nama,
                    'id_card'           => htmlspecialchars($this->input->post('id_card')),
                    'no_id'             => htmlspecialchars($this->input->post('no_id')),
                    'negara'            => htmlspecialchars($this->input->post('negara')),
                    'provinsi'          => htmlspecialchars($this->input->post('provinsi')),
                    'kota'              => htmlspecialchars($this->input->post('kota')),
                    'alamat'            => htmlspecialchars($this->input->post('alamat')),
                    'kode_pos'          => htmlspecialchars($this->input->post('kode_pos')),
                    'email'             => $email,
                    'no_telp'           => $no_telp,
                    'foto'              => $hasil['file_name'],
                    'status'            => 1
                );
            }
            $this->model_app->insert('tb_reservasi', $data);

            // email 
            $code = "https://ronisky.com/";
            $subject = "Pengajuan Reservasi";
            $message = "
						<h2>Terima kasih telah melakukan reservasi kunjungan.</h2>
                        <p>Detail Data Reservasi:</p>
                        
						<p>Nama: " . $nama . "</p>
						<p>email: " . $email . "</p>
                        <p>No Telepon: " . $no_telp . "</p>
                        <p>Tanggal kunjungan: " . $tanggal . ", Jam " . $waktu . "</p>
                        <p>Status reservasi : <b> dalam proses peninjauan</b></p>
                        <p>Kode Reservasi :<b> " . $id . "</b></p>
                        <br>
                        <p>Petugas akan segera memeriksa pengajuan Anda,</p>
                        <p>Anda akan mendapatkan update status pengajuan Anda.</p>
                        <br>
                        <p>Salam Hangat. <a href=' $code '>Museum Dihati Ku</a></p>
					";

            kirim_email($email, $subject, $message);

            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Terima kasih, pengajuan reservasi berhasil dikirim</center>
          		</div>');
            redirect('reservasi');
        } else {
            $this->session->set_flashdata('message', '
				<div class="alert alert-danger col-sm-12" role="alert">
            	<center>Pengajuan reservasi gagal dikirim</center>
          		</div>');
            redirect('reservasi');
        }
    }
}
