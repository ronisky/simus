<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sitemap extends CI_Model
{

    function koleksi()
    {
        return $this->db->order_by('id_koleksi', 'desc')->get('tb_koleksi')->result_array();
    }

    function artikel()
    {
        return $this->db->order_by('waktu_input', 'desc')->get('tb_blog_artikel')->result_array();
    }
}
