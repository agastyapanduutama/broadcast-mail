<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //cek login
        if (!$this->session->userdata($this->session->nama_user) == '') {
            redirect(base_url());
        }
        $this->load->model('admin/M_user', 'user');
    }

    public function list()
    {
        $konfigurasi = $this->db->get('t_konfigurasi')->result();
        
        $data = array(
            'config'  => $konfigurasi,
            'title'  => 'List user',
            'menu'   => 'user',
            'script' => 'user',
            'konten' => 'admin/user/list'
        );
        $this->load->view('admin/templates/templates', $data, FALSE);
    }

    function data()
    {
        error_reporting(0);
        $list = $this->user->get_datatables();
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
            $row[] = $field->nama_user;
            $row[] = $field->nama_konfigurasi;
            $row[] = $field->email;
            $row[] = $field->keterangan;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function get($id)
    {
        $data = $this->user->get($id);

        // $this->req->print($data);
        foreach ($data as $key => $value) {
            if (strtolower($key) == 'id') {
                $data->$key = $this->req->acak($value);
            }
        }
        echo json_encode($data);
    }

    function insert()
    {
        $custom = array(
            'password' => $this->req->acak($this->input->post('password')) , 
            'password_email' => $this->library->Encode($this->input->post('password_email'), 2), 
        );
        // $this->req->print($custom);

        $data = $this->req->all($custom);
        if ($this->user->insert($data) == true) {
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
        if ($this->user->update($data, $this->req->id($id)) == true) {
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
        if ($this->user->delete($this->req->id($id)) == true) {
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

    function set($id, $action)
    {
        if ($action == 'on') {
            if ($this->user->update(['status' => '1'], $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil Mengaktifkan Data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal Mengaktifkan data !'
                );
            }
            echo json_encode($msg);
        } elseif ($action == 'off') {
            if ($this->user->update(['status' => '0'], $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil Me-nonaktifkan Data !'
                );
            } else {
            }
            // echo $this->db->last_query();;
            echo json_encode($msg);
        }
    }



    // multiple select off data
    function allOff()
    {
        $idNa = explode(",", $this->req->input("id"));
        $total = count($idNa) - 1;
        $jmlNa = 0;
        foreach ($idNa as $id) {
            if ($id != "") {
                if ($this->user->update(['status' => 0], $this->req->id($id)) == true) $jmlNa++;
            }
        }
        if ($jmlNa > 0) {
            echo json_encode([
                "status" => "ok",
                "msg" => "Berhasil Me-nontaktifkan $jmlNa dari $total Akun"
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "msg" => "Tidak ada data yg berubah !"
            ]);
        }
    }

    // multiple select on data
    function allOn()
    {
        $idNa = explode(",", $this->req->input("id"));
        $total = count($idNa) - 1;
        $jmlNa = 0;
        foreach ($idNa as $id) {
            if ($id != "") {
                if ($this->user->update(['status' => 1], $this->req->id($id)) == true) $jmlNa++;
            }
        }
        if ($jmlNa > 0) {
            echo json_encode([
                "status" => "ok",
                "msg" => "Berhasil Mengaktifkan $jmlNa dari $total Akun"
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "msg" => "Tidak ada data yg berubah !"
            ]);
        }
    }

    // multiple select delete data
    function allDelete()
    {
        $idNa = explode(",", $this->req->input("id"));
        $total = count($idNa) - 1;
        $jmlNa = 0;
        foreach ($idNa as $id) {
            if ($id != "") {
                if ($this->user->delete($this->req->id($id)) == true) $jmlNa++;
            }
        }
        if ($jmlNa > 0) {
            echo json_encode([
                "status" => "ok",
                "msg" => "Berhasil Mengaktifkan $jmlNa dari $total Akun"
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "msg" => "Tidak ada data yg berubah !"
            ]);
        }
    }
}
