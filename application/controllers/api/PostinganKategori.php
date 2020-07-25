<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class PostinganKategori extends RestController
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
            $postinganKategori = $this->model->get_postinganKategori($id);
        } else {
            $postinganKategori = $this->model->get_postinganKategori($id);
        }

        if ($postinganKategori) {
            $this->response([
                'status'    => true,
                'data'      => $postinganKategori
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
