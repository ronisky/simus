<?php
class Model_event extends CI_model
{
    function list_event()
    {
        return $this->db->query("SELECT * FROM tb_event ORDER BY id_event DESC");
    }
}
