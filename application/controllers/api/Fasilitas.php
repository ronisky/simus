<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Fasilitas extends RestController
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
            $fasilitas = $this->model->get_fasilitas($id);
        } else {
            $fasilitas = $this->model->get_fasilitas($id);
        }

        if ($fasilitas) {
            $this->response([
                'status'    => true,
                'data'      => $fasilitas
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
