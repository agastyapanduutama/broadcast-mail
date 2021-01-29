<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_anggota extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //cek login
        if (!$this->session->userdata($this->session->nama_user) == '') {
            redirect(base_url());
        }
        $this->load->model('admin/M_anggota', 'anggota');
    }

    public function list()
    {
        $data = array(
            'title'  => 'List anggota',
            'menu'   => 'anggota',
            'script' => 'anggota',
            'konten' => 'admin/anggota/list'
        );
        $this->load->view('admin/templates/templates', $data, FALSE);
    }

    function data()
    {
        error_reporting(0);
        $list = $this->anggota->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $idNa = $this->req->acak($field->id);
            // $idNa = $field->id;
            

            $button = "
                <button class='btn btn-danger btn-sm' id='delete' data-id='$idNa' title='Hapus Data'><i class='fas fa-trash-alt'></i></button>
                <button class='btn btn-warning btn-sm' id='edit' data-id='$idNa' title='Edit data'><i class='fas fa-pencil-alt'></i></button>
            ";
            $no++;
            $row = array();
            // $row[] = "<input type='checkbox' id='pilihGan-$idNa' value='$idNa'></input>";
            $row[] = $no;
            $row[] = $field->nrp;
            $row[] = $field->nama;
            $row[] = $field->nama_pangkat;
            $row[] = $field->nama_jabatan;
            $row[] = $field->nama_kategori;
            $row[] = $field->email;
            $row[] = $field->keterangan;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->anggota->count_all(),
            "recordsFiltered" => $this->anggota->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function get($id)
    {
        $data = $this->anggota->get($id);
        foreach ($data as $key => $value) {
            if (strtolower($key) == 'id') {
                $data->$key = $this->req->acak($value);
            }
        }
        echo json_encode($data);
    }

    function insert()
    {
        $data = $this->req->all();
        if ($this->anggota->insert($data) == true) {
            $msg = array(
                'status' => 'ok',
                'msg' => 'Berhasil menambahkan data !'
            );
        } else {
            $msg = array(
                'status' => 'fail',
                'msg' => 'Gagal menambahkan data !'
            );
        }
        echo json_encode($msg);
    }

    function update()
    {
        $id = $this->input->post('id');
        $data = $this->req->all(['id' => false]);
        if ($this->anggota->update($data, [$this->req->encKey('id') => $id]) == true) {
            $msg = array(
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data !'
            );
        } else {
            $msg = array(
                'status' => 'fail',
                'msg' => 'Gagal mengubah data !'
            );
        }
        echo json_encode($msg);
    }

    function delete($id)
    {
        if ($this->anggota->delete([$this->req->encKey('id') => $id]) == true) {
            $msg = array(
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data !'
            );
        } else {
            $msg = array(
                'status' => 'fail',
                'msg' => 'Gagal menghapus data !'
            );
        }
        echo json_encode($msg);
    }

   

    public function getPangkat()
    {
        $data = $this->db->get('t_pangkat')->result();
        echo json_encode($data);
    }

    public function getJabatan()
    {
        $data = $this->db->get('t_jabatan')->result();
        echo json_encode($data);
    }

    public function getKategori()
    {
        $data = $this->db->get('t_kategori')->result();
        echo json_encode($data);
    }
}


