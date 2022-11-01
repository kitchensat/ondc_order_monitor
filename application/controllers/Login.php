<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        if($this->session->userdata('user_id'))
        {
            redirect('Dashboard');
        }
        else
        {
            $this->load->view('login');
        }
    }
    public function verify_password()
    {
        $data=array();
		if ($_POST)
        {
            $password=strtolower(trim($this->input->post('password')));
            $username=strtolower(trim($this->input->post('value')));
            $login_datetime = date('Y-m-d h:i:s');
            
            if($username=='ondc' || $username=='admin')
            {
                    if($username==$password)
                    {
                        $this->session->set_userdata('user_id',$username);
                        $this->session->set_userdata('username',ucwords($username));
                        $this->session->set_userdata('image',$username =='admin' ? base_url().'assets/logo/logo_mobile.png':'');
                        $this->session->set_userdata('login_datetime',$login_datetime);

                        $data['message']='User Logged In Successfully!';
                        $data['status']='success';
                    }
                    else
                    {
                        $data['message']='Invalid Password!';
                        $data['status']='error';
                    }
            }
            else
            {
                $data['message']='User Is Not Exist In Project!';
                $data['status']='error';
            }
			echo json_encode($data);
		}
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
