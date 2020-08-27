<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Negara extends RestController
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
            $negara = $this->model->get_negara($id);
        } else {
            $negara = $this->model->get_negara($id);
        }

        if ($negara) {
            $this->response([
                'status'    => true,
                'data'      => $negara
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
