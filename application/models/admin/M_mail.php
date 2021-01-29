<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_mail extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = "t_mail";
        $this->column_order = array(null, 'tanggal_kirim','subjek','jumlah','nama');
        $this->column_search = array('tanggal_kirim', 'subjek', 'jumlah','nama');
        $this->order = array('t_mail.id' => 'DESC');
        $this->order1 = array('t_detailmail.id' => 'DESC');
    }

    private function _get_datatables_query()
    {
        $this->db->select('t_user.nama_user, t_mail.*');
        $this->db->from($this->table);
        $this->db->join('t_user', 't_user.id = t_mail.asal', 'left');
        if ($_SESSION['level'] != '1') {
            $this->db->where('asal', $_SESSION['id_user']);
        }
        

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
    
    private function _get_datatables_querydetail($id)
    {

        $this->db->from('t_detailmail');
        $this->db->join('t_anggota', 't_anggota.id = t_detailmail.id_anggota', 'left');
        
        $this->db->where($this->req->encKey('id_mail'), $id );
        

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
        } else if (isset($this->order1)) {
            $order = $this->order1;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatablesdetail($id)
    {
        $this->_get_datatables_querydetail($id);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtereddetail()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_aldetaill()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function infoUser()
    {
        $this->db->select('u.*, k.host, k.smtp_secure, k.port');
        $this->db->from('t_user u');
        $this->db->join('t_konfigurasi k', 'k.id = u.id_konfigurasi', 'left');
        return $this->db->get()->row();
                
    }


    public function perorangan()
    {
        $this->db->select('a.id as value, a.nama as name');
        $this->db->from('t_anggota a');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result();
        
    }

    public function semuapasis()
    {
        $this->db->select('a.id as value, a.nama as name');
        $this->db->from('t_anggota a');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result();
        
    }

    public function pangkat()
    {
        $this->db->select('a.id as value, a.nama_pangkat as name');
        $this->db->from('t_pangkat a');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result();
        
    }

    public function kategori()
    {
        $this->db->select('a.id as value, a.nama_kategori as name');
        $this->db->from('t_kategori a');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result();
        
    }

}

/* End of file M_mail.php */
