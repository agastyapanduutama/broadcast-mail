<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_konfigurasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //cek login
        if (!$this->session->userdata($this->session->nama_user) == '') {
            redirect(base_url());
        }
        $this->load->model('admin/M_konfigurasi', 'konfigurasi');
    }

    public function list()
    {
        $data = array(
            'title'  => 'List konfigurasi',
            'menu'   => 'konfigurasi',
            'script' => 'konfigurasi',
            'konten' => 'admin/konfigurasi/list'
        );
        $this->load->view('admin/templates/templates', $data, FALSE);
    }

    function data()
    {
        error_reporting(0);
        $list = $this->konfigurasi->get_datatables();
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
            $row[] = $field->nama_konfigurasi;
            $row[] = $field->host;
            $row[] = $field->smtp_secure;
            $row[] = $field->port;
            $row[] = $field->keterangan;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->konfigurasi->count_all(),
            "recordsFiltered" => $this->konfigurasi->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function get($id)
    {
        $data = $this->konfigurasi->get($id);
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
        if ($this->konfigurasi->insert($data) == true) {
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
        if ($this->konfigurasi->update($data, [$this->req->encKey('id') => $id]) == true) {
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
        if ($this->konfigurasi->delete([$this->req->encKey('id') => $id]) == true) {
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
    
}
