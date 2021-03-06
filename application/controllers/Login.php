<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Perksme Development Team
 */
class Login extends CI_Controller{
    
    /* Executes the tasks when class is loaded */
    public function __construct() {
        parent::__construct();    
        $this->load->model('login_model');
        $this->load->model('staff_model');
    }



    public function index(){
        $data['title'] = 'RV Sites | Login';
        $this->load->view('login');
    }

    public function validateuser()
    {
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));

            $result = $this->login_model->check_login($data); 
                 
            $result = ($result['data']) ? $result['data'][0] : '';

           if (!empty($result)) {
                $session_data['id'] = $result->id;
                $session_data['d_name'] = $result->d_name;                
                $session_data['email'] = $result->email;              
                $session_data['user_type'] = $result->user_type;
                $session_data['staff_id'] = $this->staff_model->get_staff_id($result->id);                    
                $this->session->set_userdata($session_data);
                
                // Check whether user Agent or Clerk
                if ($result->user_type == USER_TYPE_ADMIN) {
                    redirect('dashboard', $result);
                } else if ($result->user_type == USER_TYPE_STAFF) {
                    redirect('dashboard', $result);
                } 
                
            } else {
                $this->session->set_flashdata('error', $this->lang->line('login_invalid'));
            }
            redirect('login');
    }
    
    /* Show the login page */
    public function loginForm() {
        $data['title'] = $this->lang->line('LoginPage_title');
        /* If The User Logged in Already then redirect to respective Dashboard*/
        if($this->session->userdata('accountno'))
        {
           
            switch($this->session->userdata('usertype')){
                case '1': 
                    redirect('PerksMeDashboard');
                    break;
                case '2': 
                    redirect('Dashboard');
                    break;
                case '3':                     
                    redirect('UserHome');
                    break;
            }
        }
	    $this->load->view('enduser/headernew',$data);
        $this->load->view('login');
        $this->load->view('enduser/footernew');
    }

    /**
     * Logs the user out
     * @return void
     * @access public
     */
    public function logout() {
        $this->sess_expiration = 0;
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('d_name');
        $this->session->unset_userdata('user_type');
        //$this->session->sess_destroy();

        $this->session->set_flashdata('success', $this->lang->line('logout_success'));
        redirect('login', 'refresh');
    }
    
    
}