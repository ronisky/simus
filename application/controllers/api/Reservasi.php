<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Reservasi extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('model_app', 'model');
    }

    public function index_post()
    {
        $dariDB = $this->model_app->cekIdReservasi();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $Id = 'RM' . $kodenya;

        $id             = $Id;
        $tanggal        = $_POST['tanggal'];
        $waktu          = $_POST['waktu'];
        $kategori       = $_POST['kategori'];
        $jumlah         = $_POST['jumlah'];
        $nama           = $_POST['nama'];
        $id_card        = $_POST['id_card'];
        $no_id          = $_POST['no_id'];
        $negara         = $_POST['negara'];
        $provinsi       = $_POST['provinsi'];
        $kota           = $_POST['kota'];
        $alamat         = $_POST['alamat'];
        $kode_pos       = $_POST['kode_pos'];
        $email          = $_POST['email'];
        $no_telp        = $_POST['no_telp'];
        $fotos           = $_POST['foto'];
        $status         = 1;

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


        $foto = $fotos;
        $upload_path = base_url("assets/images/reservasi/$foto.jpeg");
        $finalpath = $upload_path;


        $data = [
            'id_reservasi'  => $id,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'kategori' => $kategori,
            'jumlah' => $jumlah,
            'nama' => $nama,
            'id_card' => $id_card,
            'no_id' => $no_id,
            'negara' => $negara,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'email' => $email,
            'no_telp' => $no_telp,
            'foto'      => " ",
            'status' => $status
        ];
        if ($this->model->insert('tb_reservasi', $data)) {
            // if (file_put_contents($upload_path, base64_decode($foto))) {
            $this->response([
                'status'    => true,
                'message'   => "Selamat, Pengajuan reservasi berhasil dikirim"
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status'    => false,
                'message'   => "Oops! Data gagal dikirim"
            ], RestController::HTTP_BAD_REQUEST);
            // }
        }
    }
}
