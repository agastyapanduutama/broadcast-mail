<?php

class M_anggota extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = "t_anggota";
        $this->column_order = array(null, 'nama','nama_kategori','nama_pangkat','email','nrp', 't_anggota.keterangan');
        $this->column_search = array('nama','nama_kategori','nama_pangkat','email','nrp', 't_anggota.keterangan');
        $this->order = array('id' => 'desc');
    }

    private function _get_datatables_query()
    {

        $this->db->select('t_anggota.*, t_pangkat.nama_pangkat, t_jabatan.nama_jabatan, t_kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('t_pangkat', 't_pangkat.id = t_anggota.id_pangkat', 'left');
        $this->db->join('t_jabatan', 't_jabatan.id = t_anggota.id_jabatan', 'left');
        $this->db->join('t_kategori', 't_kategori.id = t_anggota.id_kategori', 'left');
        

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function cekPerubahan()
    {
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert($data)
    {

        $this->db->insert($this->table, $data);
        return $this->cekPerubahan();
    }

    function get($id)
    {
        return $this->db->get_where($this->table, [$this->req->encKey('id') => $id])->row();
    }

    function update($data, $where)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
        return $this->cekPerubahan();
    }

    function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->cekPerubahan();
    }
}
