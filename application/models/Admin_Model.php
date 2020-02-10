<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function getUserJoin()
    {
        $this->db->from('user a');
        $this->db->where('a.role_id !=', 1);
        $this->db->order_by('date_created', 'DESC');
        $this->db->join('role b', 'b.role_id=a.role_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSiswaJoin()
    {
        $this->db->from('siswa a');
        $this->db->order_by('nama', 'ASC');
        $this->db->join('kelas b', 'b.kelas_id=a.kelas_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWhereById($table, $id)
    {
        $this->db->from($table);
        $this->db->where($id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getNum($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getDesc()
    {
        $this->db->from('user a');
        $this->db->order_by('date_created', 'DESC');
        $this->db->join('role b', 'b.role_id=a.role_id');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }



    public function update($table, $id, $data)
    {
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($table);
    }

    public function delete($table, $id)
    {
        $this->db->delete($table, $id);
    }

    public function deleteSiswaAndKelas($table, $id)
    {
        $kelas_id = $this->db->get_where($table, $id)->row()->kelas_id;
        $set = $this->db->set('jumlah_siswa', 'jumlah_siswa - 1', FALSE);
        $this->db->where('kelas_id', $kelas_id);
        $this->db->update('kelas');
        $this->db->delete($table, $id);
    }

    public function countKelas($table, $id)
    {
        $this->db->where($id);
        $this->db->set('jumlah_siswa', 'jumlah_siswa + 1', FALSE);
        $this->db->update($table);
    }
}
