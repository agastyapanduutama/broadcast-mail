<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class C_mail extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
        $this->load->model('admin/M_mail', 'mail');   
    }

    public function pilihkategori()
    {
        $data = array(
            'title' => 'Broadcast Email',
            'konten' => 'admin/mail/pilih'
        );

        $this->load->view('admin/templates/templates', $data, FALSE);
    }
    

    public function index()
    {
        $input = $this->input->get('berdasarkan');

        if ($input == "perorangan") {
            $anggota = $this->mail->perorangan();            
        }
        
        elseif ($input == "semuapasis") {
            $anggota = $this->mail->semuapasis();
        }
        elseif ($input == "pangkat") {
            $anggota = $this->mail->pangkat();    
        }

        elseif ($input == "kategori") {
            $anggota = $this->mail->kategori();    
        }else{
            show_404();
        }

        // $this->req->print($anggota);

        $data = array(
            'title' => 'Broadcast Email' ,
            'anggota' => $anggota ,
            'konten' => 'admin/mail/mail'
         );

         $this->load->view('admin/templates/templates', $data, FALSE);
    }

    public function Testing()
    {
        $data = $this->mail->infoUser();
        $this->req->print($data);
    }

    public function sendMail()
    {


        $url = $_POST['url']; 
        $dataUser = $this->mail->infoUser();
        $i = $this->input;

        $dataTujuan = str_replace(' ,', '', $this->input->post('tujuan'));
        $personal = $dataTujuan;
        $pecahPersonal = explode(',', $personal);

        // $this->req->print($pecahPersonal);

        // Cek Apakah Berdasarkan Perorangan
        $emailAnggota = [];
        $idAnggota = [];
        $AmbilData = [];
        if ($url == "perorangan") {
           if ($pecahPersonal != '') {
            foreach ($pecahPersonal as $key) {
                @$TotalKirim += $this->db->get_where('t_anggota', ['id' => $key])->num_rows();
                $AmbilData = $this->db->get_where('t_anggota', ['id' => $key])->result();
                    foreach ($AmbilData as $user) {
                        $emailAnggota[] = $user->email;
                        $idAnggota[] = $user->id;
                        $kategori = '1';
                    }
                }
            }
        }

        // Cek Apakah Semua Pasis
        if ($url == "semuapasis") {
           if ($pecahPersonal != '') {
            foreach ($pecahPersonal as $key) {
                @$TotalKirim += $this->db->get_where('t_anggota', ['id' => $key])->num_rows();
                $AmbilData = $this->db->get_where('t_anggota', ['id' => $key])->result();
                    foreach ($AmbilData as $user) {
                        $emailAnggota[] = $user->email;
                        $idAnggota[] = $user->id;
                        $kategori = '2';
                    }
                }
            }
        }

        // Cek apakah berdasarkan Pangkat
        if ($url == "pangkat") {
           if ($pecahPersonal != '') {
            foreach ($pecahPersonal as $key) {
                @$TotalKirim += $this->db->get_where('t_anggota', ['id_pangkat' => $key])->num_rows();
                $AmbilData = $this->db->get_where('t_anggota', ['id_pangkat' => $key])->result();
                    foreach ($AmbilData as $user) {
                        $emailAnggota[] = $user->email;
                        $idAnggota[] = $user->id;
                        $kategori = '3';
                    }
                }
            }
        }

        // Cek Apakah berdasarkan Kategori
        if ($url == "kategori") {
           if ($pecahPersonal != '') {
            foreach ($pecahPersonal as $key) {
                @$TotalKirim += $this->db->get_where('t_anggota', ['id_kategori' => $key])->num_rows();
                $AmbilData = $this->db->get_where('t_anggota', ['id_kategori' => $key])->result();
                    foreach ($AmbilData as $user) {
                        $emailAnggota[] = $user->email;
                        $idAnggota[] = $user->id;
                        $kategori = '4';
                    }
                }
            }
        }

        // Cek apakah ada penerima atau tidak
        if ($TotalKirim == 0) {
            
            $this->session->set_flashdata('failed', 'Gagal mengirim Email, Tidak ada penerima');
            redirect("admin/mail?berdasarkan=$url", 'refresh');

        }else{

            $custom = ['lampiran' => false,];
            $config = [
                'path' => 'files',
                'file' => 'lampiran',
                'encrypt' => true,
                'type' => 'doc',
                'customInput' => $custom,
            ];
            
            if ($_FILES['lampiran'] != '') {
                $data = $this->req->upload_form_multi($config);
                $fileNa = $data['file']['oriFile'];
                $fileNaEncy = $data['file']['lampiran'];
                $attachment = explode(',' ,$fileNaEncy);
            }else{
                $fileNa = '';
                $fileNaEncy = '';
            }
        
            // Masukan Database mail
            $insertData = [
                'tanggal_kirim' => date('Y-m-d'),
                'judul'         => $i->post('subjek'),
                'subjek'        => $i->post('subjek'),
                'isi'           => $i->post('isi'),
                'lampiran'      => $fileNa,
                'file'          => $fileNaEncy,
                'asal'          => $_SESSION['id_user'],
                'jumlah'        => $TotalKirim,
                'kategori'      => $kategori,
            ];

            // $this->req->print($insertData);
            $this->db->insert('t_mail', $insertData);
            $idAkhir = $this->db->insert_id();

            // Masukan data ke detail mail
            foreach ($idAnggota as $id) {
                $dataDetailMail = array(
                    'id_mail'       => $idAkhir,
                    'id_anggota'    => $id,
                    'email'         => '',
                    'status'        => 0
                );
                $this->db->insert('t_detailmail', $dataDetailMail);
            }
            
            // PHPMailer object
            $response = false;
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host     = $dataUser->host;
            $mail->SMTPAuth = true;
            $mail->Username = $dataUser->email; 
            $mail->Password = $this->library->Decode($dataUser->password_email, 2); 
            $mail->SMTPSecure = $dataUser->smtp_secure;
            $mail->Port     = $dataUser->port;
            $mail->setFrom($dataUser->email, '');    

            foreach ($emailAnggota as $key) {
                $mail->addAddress($key);
                $mail->Subject = $i->post('subjek');
                $mail->isHTML(true);
                $mail->AddEmbeddedImage('assets/images/sesko.png', 'logo');
                $mail->AddEmbeddedImage('assets/images/bg.png', 'bg');
                $mailContent = $this->load->view('admin/mail/tampilan', $_POST['isi'], TRUE);
                $mail->Body = $mailContent;
                
            }
            $lokasi = "uploads/files/";
            foreach ($attachment as $attch) {
                $mail->AddAttachment($lokasi . $attch);
            }
            $mail->send();
            
            $this->session->set_flashdata('success', 'Berhasil mengirim Email');
            redirect("admin/mail?berdasarkan=$url", 'refresh');
        }
    }
    
    public function riwayatMail()
    {
        $data = array(
            'title' => 'Riwayat Pengiriman Email',
            'konten' => 'admin/mail/riwayat',
            'script' => 'riwayat'
        );

        $this->load->view('admin/templates/templates', $data, FALSE);
    }

    public function dataRiwayat()
    {
        error_reporting(0);
        $list = $this->mail->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $idNa = $this->req->acak($field->id);
            // $idNa = $field->id;
            $url = base_url("admin/mail/riwayat/detail/$idNa");
            $button = "
                <a href='$url' class='btn btn-primary'>Detail</a>
            ";

            if ($field->kategori == '1') {
                $kategori = 'PERORANGAN';
            }
            if ($field->kategori == '2') {
                $kategori = 'SEMUA PASIS';
            }
            if ($field->kategori == '3') {
                $kategori = 'PANGKAT';
            }
            if ($field->kategori == '4') {
                $kategori = 'ANGKATAN';
            }


            $no++;
            $row = array();
            // $row[] = "<input type='checkbox' id='pilihGan-$idNa' value='$idNa'></input>";
            $row[] = $no;
            $row[] = $field->tanggal_kirim;
            $row[] = $field->subjek;
            $row[] = $field->jumlah;
            $row[] = $kategori;
            $row[] = $field->nama_user;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mail->count_all(),
            "recordsFiltered" => $this->mail->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function detailRiwayat($id)
    {

        $surat = $this->db->get_where('t_mail', [$this->req->encKey('id') => $id])->row();
        
        $data = array(
            'surat'  => $surat,
            'title'  =>  'Detail Riwayat Pengiriman Email',
            'konten' => 'admin/mail/detailRiwayat',
            'script' => 'riwayat'
        );

        $this->load->view('admin/templates/templates', $data, FALSE);
    }

    public function dataDetailRiwayat($id)
    {

        // echo $id;
        error_reporting(0);
        $list = $this->mail->get_datatablesdetail($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $idNa = $this->req->acak($field->id);
            // $idNa = $field->id;
            $url = base_url("admin/mail/riwayat/detail/$idNa");
            $button = "
                <a href='$url' class='btn btn-primary'>Detail</a>
            ";
            $no++;
            $row = array();
            // $row[] = "<input type='checkbox' id='pilihGan-$idNa' value='$idNa'></input>";
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->email;
            $row[] = $field->tanggal_dibuat;
            // $row[] = $field->jumlah;
            // $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mail->count_all(),
            "recordsFiltered" => $this->mail->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);

    }
    
    function getAnggota()
    {
        echo json_encode($this->mail->data_user());
    }

    function getPangkat()
    {
        echo json_encode($this->mail->data_pangkat());
    }

    function getKategori()
    {
        echo json_encode($this->mail->data_pangkat());
    }




}

/* End of file C_mail.php */
