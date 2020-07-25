<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Faq extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('model_app', 'model');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $faq = $this->model->get_faq($id);
        } else {
            $faq = $this->model->get_faq($id);
        }

        if ($faq) {
            $this->response([
                'status'    => true,
                'data'      => $faq
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'pertanyaan' => $this->post('pertanyaan')
        ];

        if ($this->model->insert('tb_faq', $data) > 0) {
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
