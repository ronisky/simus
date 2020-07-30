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
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 6);
        $data = [
            'tanggal' => $this->post('tanggal'),
            'waktu' => $this->post('waktu'),
            'kategori' => $this->post('kategori'),
            'jumlah' => $this->post('jumlah'),
            'nama' => $this->post('nama'),
            'id_card' => $this->post('id_card'),
            'no_id' => $this->post('no_id'),
            'negara' => $this->post('negara'),
            'kebangsaan' => $this->post('kebangsaan'),
            'wilayah_bagian' => $this->post('wilayah_bagian'),
            'kota' => $this->post('kota'),
            'alamat' => $this->post('alamat'),
            'kode_pos' => $this->post('kode_pos'),
            'email' => $this->post('email'),
            'no_telp' => $this->post('no_telp'),
            'foto_id' => $this->post('foto_id'),
            'kd_reservasi' => $code,
            'status' => 'Pengajuan'
        ];

        if ($this->model->insert('tb_reservasi', $data) > 0) {
            $this->response([
                'status'    => true,
                'message'   => "Data berhasil dikirim"
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status'    => false,
                'message'   => "Gagal mengirim data."
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
