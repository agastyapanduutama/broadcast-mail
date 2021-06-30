<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    public function index()
    {
        
    }

    public function dashboard()
    {

        $today = date('Y-m-d');
        $totalMail = $this->db->get('t_mail')->num_rows();
        $totalMailToday = $this->db->get_where('t_mail', ['tanggal_kirim' => $today])->num_rows();

        
        $data = array(
            'total' => $totalMail,
            'hariini' => $totalMailToday,
            'title' => 'Dashboard' , 
            'konten' => 'admin/v_dashboard' 
        );

        $this->load->view('admin/templates/templates', $data, FALSE);
        
    }

}

/* End of file C_home.php */
