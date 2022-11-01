<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
        if(!$this->session->userdata('user_id'))
            redirect('Login');
    }

    public function ajax_navbar_details()
    {
        // $login_user_id=$this->session->userdata('user_id');
		// $data['alert_messages'] = $this->model->get_result("select * from payroll_login_details where is_viewed = 0 and login_user_id=$login_user_id and logout_datetime IS NOT NULL");
        $data['alert_messages'] = array();
        echo json_encode($data);
    }
    public function ajax_update_alert_message()
    {
        // $alert_ids=@$_POST['alert_ids'];
        // if($alert_ids)
        //     $this->multidb_model->run_manual_query ("update payroll_login_details set is_viewed='1' where id in ($alert_ids)");
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/dashboard');
    }
}
?>