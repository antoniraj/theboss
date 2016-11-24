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
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function add() {      
        
        if(isset($_POST['locationsave']))
        {
            
            $data['title'] = $this->input->post('title');           
            $data['location'] = $this->input->post('location');
            $data['office'] = $this->input->post('office');
            $data['fax'] = $this->input->post('fax');
            $data['created_by'] = $this->session->userdata('id'); 

            $address = $data['location']; // Google HQ
            $prepAddr = str_replace(' ','+',$address);
            $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
            $output= json_decode($geocode);
           // echo '<pre>'; print_r($_POST);print_r($output);exit;
            $latitude = $output->results[0]->geometry->location->lat;
            $longitude = $output->results[0]->geometry->location->lng;

            $data['latitude'] = $latitude;
            $data['longitude'] = $longitude;

            $result = $this->location_model->add_location($data);
            $this->session->set_flashdata('message', 'Location has beed saved successfully!');
            redirect('location/manage/', $result);
        }


        $data['id'] = '';
        $data['title'] = '';        
        $data['location'] = '';
        $data['office'] = '';
        $data['fax'] = '';
        $data['text'] = 'Add';
       
        $this->load->view('layout/header');
        $this->load->view('staff/staff_add',$data);
        $this->load->view('layout/footer');
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
     * Update News info
     * @return void
     * @access public
     */
    public function edit($id=false,$channel=false) { 

        if(isset($_POST['newssave']))
        {
            
            $data['title'] = $this->input->post('title');
            $data['news_type'] = $this->input->post('news_type');
            $data['summary'] = $this->input->post('summary');
              
            $result = $this->news_model->edit_news($id,$data);
            $this->session->set_flashdata('message', 'News has beed saved successfully!');
            if($channel==1)
                redirect('news/manage_ceo/', $result);
            else
            {
                redirect('news/manage/', $result); 
            } 
        }

        $results = $this->news_model->get_news_byid($id);
        $data['id'] = $id;
        $data['title'] = $results->title;
        $data['news_type'] = $results->news_type;
        $data['summary'] = $results->summary;
        $data['text'] = 'Edit';

     
        $this->load->view('layout/header');
        $this->load->view('news/news_add',$data);
        $this->load->view('layout/footer');
    }

  

}
