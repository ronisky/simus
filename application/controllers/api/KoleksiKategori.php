<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class KoleksiKategori extends RestController
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
            $koleksiKategori = $this->model->get_koleksiKategori($id);
        } else {
            $koleksiKategori = $this->model->get_koleksiKategori($id);
        }

        if ($koleksiKategori) {
            $this->response([
                'status'    => true,
                'data'      => $koleksiKategori
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
