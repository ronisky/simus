<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class KoleksiLimit extends RestController
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
            $koleksi = $this->model->get_koleksiLimit($id);
        } else {
            $koleksi = $this->model->get_koleksiLimit($id);
        }

        if ($koleksi) {
            $this->response([
                'status'    => true,
                'data'      => $koleksi
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
