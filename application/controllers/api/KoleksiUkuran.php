<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class KoleksiUkuran extends RestController
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
            $koleksiUkuran = $this->model->get_koleksiUkuran()($id);
        } else {
            $koleksiUkuran = $this->model->get_koleksiUkuran()($id);
        }

        if ($koleksiUkuran) {
            $this->response([
                'status'    => true,
                'data'      => $koleksiUkuran
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
