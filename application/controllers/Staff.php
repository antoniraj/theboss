<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Staff extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('staff_model');
       
    }



    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function manage() {  
        $data['results'] = $this->staff_model->get_all_staff();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('staff/manage',$data);
        $this->load->view('layout/footer');
    }

    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function viewstaff() {  
        $data['results'] = $this->staff_model->get_all_staff();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('staff/viewstaff',$data);
        $this->load->view('layout/footer');
    }




    /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function add() {      
        
           
        $data['gender'] = '';
        $data['id'] = '';
        $data['photo'] = '';

        $data['text'] = 'Add';
       
        $this->load->view('layout/header');
        $this->load->view('staff/staff_add',$data);
        $this->load->view('layout/footer');
    }

    
     /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function add_process() {      
        
       // echo '<pre>'; print_r($_FILES);exit;

            $data['first_name'] = $this->input->post('first_name');           
            $data['last_name'] = $this->input->post('last_name');
            $data['title'] = $this->input->post('title');
            $data['email'] = $this->input->post('email');
            $data['mobile_no'] = $this->input->post('mobile_no');

            $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
            $data['gender'] = $this->input->post('gender');

            $id = $this->input->post('id');


            $user['d_name'] = $this->input->post('first_name');
            $user['email'] = $this->input->post('email');
            $user['user_type'] = 2;
            $user['status'] = 1;
            $ex_photo = $this->input->post('ex_photo');
            $data['photo'] = $ex_photo;
            if($_FILES['photo']['name']!='')
            {
                if($ex_photo!='')
                {
                    $path_delete = base_url().'/staff_photo/'.$ex_photo;
                    unlink($path_delete);
                }
                $path = 'staff_photo/';
                $fileName = change_filename($_FILES['photo']['name']);
                uploadImgFile($_FILES['photo']['tmp_name'],$path,$fileName);
                $data['photo'] = $fileName;
            }

           
            if($id=='')
            {
                $user['password'] = md5($this->input->post('mobile_no'));
                $user_table_id = $this->staff_model->add_user($user);

                $data['user_id'] = $user_table_id;
                $result = $this->staff_model->add_staff($data);

            }
            else
            {
                $result = $this->staff_model->edit_staff($id,$data);
            }
            

            $this->session->set_flashdata('message', 'Staff has beed saved successfully!');
           redirect('staff/manage/');

       
      
    }

 
    /**
     * Update News info
     * @return void
     * @access public
     */
    public function edit($id=false) { 

        $results = $this->staff_model->get_staff_byid($id);

        $data['id'] = $id;
        $data['first_name'] = $results->first_name;           
        $data['last_name'] = $results->last_name;
        $data['title'] = $results->title;
        $data['email'] = $results->email;
        $data['mobile_no'] = $results->mobile_no;
        $data['dob'] = date('m/d/Y',strtotime($results->dob));
        $data['gender'] = $results->gender;
        $data['photo'] = $results->photo;

       
        $data['text'] = 'Edit';

     
        $this->load->view('layout/header');
       $this->load->view('staff/staff_add',$data);
        $this->load->view('layout/footer');
    }

    /**
     * Update News info
     * @return void
     * @access public
     */
    public function profile($id=false) { 

        $results = $this->staff_model->get_staff_byid($id);

        $data['id'] = $id;
        $data['first_name'] = $results->first_name;           
        $data['last_name'] = $results->last_name;
        $data['email'] = $results->email;
        $data['mobile_no'] = $results->mobile_no;
        $data['dob'] = date('m/d/Y',strtotime($results->dob));
        $data['gender'] = $results->gender;

        $data['language'] = $results->language;
        $data['about_me'] = $results->about_me;
        $data['my_blog'] = $results->my_blog;
        $data['my_website'] = $results->my_website;
        $data['skype'] = $results->skype;
        $data['hangout'] = $results->hangout;

        $data['msn'] = $results->msn;
        $data['yahoo_chat'] = $results->yahoo_chat;
        $data['skype_business'] = $results->skype_business;
        $data['linkedin'] = $results->linkedin;
        $data['facebook'] = $results->facebook;
        $data['twitter'] = $results->twitter;
        $data['google'] = $results->google;
        $data['text'] = 'Profile';

     
        $this->load->view('layout/header');
       $this->load->view('staff/profile',$data);
        $this->load->view('layout/footer');
    }

     /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function profile_process() {      
        
        //echo '<pre>'; print_r($_POST);

         $data['first_name'] = $this->input->post('first_name');           
            $data['last_name'] = $this->input->post('last_name');

             $data['email'] = $this->input->post('email');
              $data['mobile_no'] = $this->input->post('mobile_no');

            $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
            $data['gender'] = $this->input->post('gender');

            $data['language'] = $this->input->post('language');
            $data['about_me'] = $this->input->post('about_me');
            $data['my_blog'] = $this->input->post('my_blog');
            $data['my_website'] = $this->input->post('my_website');
            $data['skype'] = $this->input->post('skype');
            $data['hangout'] = $this->input->post('hangout');

            $data['msn'] = $this->input->post('msn');
            $data['yahoo_chat'] = $this->input->post('yahoo_chat');
            $data['skype_business'] = $this->input->post('skype_business');
            $data['linkedin'] = $this->input->post('linkedin');
            $data['facebook'] = $this->input->post('facebook');
            $data['twitter'] = $this->input->post('twitter');
            $data['google'] = $this->input->post('google');
            $id = $this->input->post('id');


            $user['d_name'] = $this->input->post('first_name');
            $user['email'] = $this->input->post('email');
            $user['user_type'] = 2;
            $user['status'] = 1;

           $result = $this->staff_model->edit_staff($id,$data);
            

            $this->session->set_flashdata('message', 'Profile has beed saved successfully!');
           redirect('staff/profile/'.$id);

       
      
    }

  

}
