<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Kategori extends RestController
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
            $kategori = $this->model->get_kategori($id);
        } else {
            $kategori = $this->model->get_kategori($id);
        }

        if ($kategori) {
            $this->response([
                'status'    => true,
                'data'      => $kategori
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
