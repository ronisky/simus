<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Slide extends RestController
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
            $slide = $this->model->get_slide($id);
        } else {
            $slide = $this->model->get_slide($id);
        }

        if ($slide) {
            $this->response([
                'status'    => true,
                'data'      => $slide
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'      => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
