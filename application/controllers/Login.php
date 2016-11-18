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
    }



    public function index(){
        $data['title'] = 'RV Sites | Login';
        $this->load->view('login');
    }

    public function validateuser()
    {
         // Validate form fields
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required', ['required' => sprintf($this->lang->line('required'), 'Email')]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => sprintf($this->lang->line('required'), 'Password')]);
        if ($this->form_validation->run() == TRUE)
        {
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $result = $this->login_model->check_login($data);           
            $result = ($result['data']) ? $result['data'][0] : '';

           if (!empty($result)) {
                $session_data['id'] = $result->id;               
                $session_data['email'] = $result->email;
                $session_data['mobile'] = $result->mobile;
                $session_data['user_type'] = $result->user_type;              
                $this->session->set_userdata($session_data);
                
                // Check whether user Agent or Clerk
                if ($result->user_type == USER_TYPE_ADMIN) {
                    redirect('admin/dashboard', $result);
                } else if ($result->user_type == USER_TYPE_SITEOWNER) {
                    redirect('siteowner/dashboard', $result);
                } else if ($result->user_type == USER_TYPE_TRAVELLER) {
                    redirect('home', $result);
                }
                
            } else {
                $this->session->set_flashdata('error', $this->lang->line('login_invalid'));
            }
        }

        $data['title'] = 'RV Sites | Login';
        $this->load->view('login');

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
    
    
}