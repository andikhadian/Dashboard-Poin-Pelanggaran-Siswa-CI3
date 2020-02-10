<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_Model extends CI_Model
{
    public function fetch_dataPelanggaran($query)
    {
        $this->db->select('*');
        $this->db->from('jenis_pelanggaran');
        if ($query != '') {
            $this->db->like('jenis_pelanggaran', $query);
            $this->db->or_like('point', $query);
        }
        $this->db->order_by('point', 'ASC');
        return $this->db->get();
    }

    public function fetch_dataKelas($query)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        if ($query != '') {
            $this->db->like('kelas', $query);
        }
        $this->db->order_by('kelas', 'ASC');
        return $this->db->get();
    }

    public function fetch_dataSiswa($query, $id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('kelas_id', $id);
        if ($query != '') {
            $this->db->like('nis', $query);
            $this->db->or_like('nama', $query);
        }
        $this->db->order_by('nama', 'ASC');
        return $this->db->get();
    }

    public function get($table)
    {
        return $this->db->get($table);
    }
    public function getNum($table)
    {

        return $this->db->get($table)->num_rows();
    }

    public function getRowByUserId($table, $user_id)
    {
        $query = $this->db->get_where($table, $user_id);
        return $query->num_rows();
    }

    public function getAll($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSiswaJoin()
    {
        $this->db->from('siswa a');
        $this->db->join('kelas b', 'b.kelas_id=a.kelas_id');
        $query = $this->db->get();
        return $query;
    }

    public function getSiswaByIdJoin($siswa_id)
    {
        $this->db->from('siswa a');
        $this->db->where('a.siswa_id', $siswa_id);
        $this->db->join('kelas b', 'b.kelas_id=a.kelas_id');
        $query = $this->db->get();
        return $query;
    }

    public function siswaBadung()
    {
        $this->db->from('siswa a');
        $this->db->where('sisa_point <=', 75);
        $this->db->order_by('sisa_point', 'ASC');
        $this->db->join('kelas b', 'b.kelas_id=a.kelas_id');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query;
    }

    public function getOrder($table, $name, $order)
    {
        $this->db->order_by($name, $order);
        $query = $this->db->get($table);
        return $query;
    }

    public function getWhere($table, $data)
    {
        $query = $this->db->get_where($table, $data);
        return $query;
    }

    public function getWhereOrder($table, $data, $name, $order)
    {
        $this->db->order_by($name, $order);
        $query = $this->db->get_where($table, $data);
        return $query;
    }

    public function getAllByDesc()
    {
        $this->db->from('pelanggar a');
        $this->db->order_by('tgl_melanggar', 'DESC');
        $this->db->join('user b', 'b.user_id=a.user_id');
        $this->db->join('siswa c', 'c.siswa_id=a.siswa_id');
        $this->db->join('kelas d', 'd.kelas_id=c.kelas_id');
        $this->db->join('jenis_pelanggaran e', 'e.jenis_pelanggaran_id=a.jenis_pelanggaran_id');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJoinPelanggarByUser($user_id)
    {
        $this->db->from('pelanggar a');
        $this->db->order_by('tgl_melanggar', 'DESC');
        $this->db->join('user b', 'b.user_id=a.user_id');
        $this->db->join('siswa c', 'c.siswa_id=a.siswa_id');
        $this->db->join('jenis_pelanggaran d', 'd.jenis_pelanggaran_id=a.jenis_pelanggaran_id');
        $this->db->join('kelas e', 'e.kelas_id=c.kelas_id');
        $this->db->where('a.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getJoinPelanggarBySiswa($siswa_id)
    {
        $this->db->from('pelanggar a');
        $this->db->join('user b', 'b.user_id=a.user_id');
        $this->db->join('siswa c', 'c.siswa_id=a.siswa_id');
        $this->db->where('c.siswa_id', $siswa_id);
        $this->db->join('jenis_pelanggaran d', 'd.jenis_pelanggaran_id=a.jenis_pelanggaran_id');
        $this->db->join('kelas e', 'e.kelas_id=c.kelas_id');
        $query = $this->db->get();
        return $query;
    }
    public function getJoinPelanggarByUserSiswa($user_id, $siswa_id, $idJenisPelanggaran, $time)
    {
        $this->db->from('pelanggar a');
        $this->db->where('a.tgl_melanggar', $time);
        $this->db->join('user b', 'b.user_id=a.user_id');
        $this->db->join('siswa c', 'c.siswa_id=a.siswa_id');
        $this->db->where('c.siswa_id', $siswa_id);
        $this->db->join('jenis_pelanggaran d', 'd.jenis_pelanggaran_id=a.jenis_pelanggaran_id');
        $this->db->where('d.jenis_pelanggaran_id', $idJenisPelanggaran);
        $this->db->join('kelas e', 'e.kelas_id=c.kelas_id');
        $this->db->where('a.user_id', $user_id);
        $query = $this->db->get();
        return $query;
    }

    public function getJoinPelanggarLimitByUser($user_id)
    {
        $this->db->from('pelanggar a');
        $this->db->order_by('tgl_melanggar', 'DESC');
        $this->db->join('user b', 'b.user_id=a.user_id');
        $this->db->join('siswa c', 'c.siswa_id=a.siswa_id');
        $this->db->join('jenis_pelanggaran d', 'd.jenis_pelanggaran_id=a.jenis_pelanggaran_id');
        $this->db->join('kelas e', 'e.kelas_id=c.kelas_id');
        $this->db->where('a.user_id', $user_id);
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function countPointZero($table1, $idSiswa, $zero)
    {
        $this->db->where($idSiswa);
        $this->db->set('sisa_point', $zero);
        $this->db->set('status', 'Tidak Aktif');
        $this->db->update($table1);
    }

    public function countPoint($table1, $table2, $idJenisPelanggaran, $idSiswa)
    {
        //jenis pelanggaran
        $point = $this->db->get_where($table2, $idJenisPelanggaran)->row()->point;

        $this->db->where($idSiswa);
        $this->db->set('sisa_point', 'sisa_point - ' . $point, FALSE);
        $this->db->update($table1);
    }

    public function countCase($table, $idJenisPelanggaran)
    {
        $this->db->where($idJenisPelanggaran);
        $this->db->set('counter', 'counter + 1', FALSE);
        $this->db->update($table);
    }

    public function noMostCase($table)
    {
        $this->db->where('counter =', 0);
        return $this->db->get($table);
    }

    public function mostCase($table)
    {
        $this->db->where('counter !=', 0);
        $this->db->order_by('counter', 'DESC');
        return $this->db->get($table);
    }
}
