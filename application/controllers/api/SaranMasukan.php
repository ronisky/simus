<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class SaranMasukan extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('model_app', 'model');
    }

    public function index_post()
    {
        $data = [
            'tanggal' => $this->post('tanggal'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'subjek' => $this->post('subjek'),
            'pesan' => $this->post('pesan'),
            'status' => $this->post('status'),
        ];

        if ($this->model->insert('tb_saran_masukan', $data) > 0) {
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
