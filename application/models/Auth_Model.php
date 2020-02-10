<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
    public function getWhere($table, $data)
    {
        return $this->db->get_where($table, $data)->row_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function logout($table, $data, $user_id)
    {
        $this->db->update($table, $data, $user_id);
    }
}
