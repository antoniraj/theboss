<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Location extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('location_model');
       
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
        $this->load->view('location/location_add',$data);
        $this->load->view('layout/footer');
    }

 
    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function manage() {  
        $data['results'] = $this->location_model->get_all_location();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('location/manage',$data);
        $this->load->view('layout/footer');
    }

    /**
     * Update News info
     * @return void
     * @access public
     */
    public function edit($id=false) { 

        if(isset($_POST['locationsave']))
        {
            
            $data['title'] = $this->input->post('title');           
            $data['location'] = $this->input->post('location');
            $data['office'] = $this->input->post('office');
            $data['fax'] = $this->input->post('fax');           

            
            $result = $this->location_model->edit_location($id,$data);
            $this->session->set_flashdata('message', 'Location has beed saved successfully!');
            redirect('location/manage/', $result);
            die();
        }

        $results = $this->location_model->get_location_byid($id);

        $data['id'] = $results->id;
        $data['title'] = $results->title;       
        $data['location'] = $results->location;
        $data['office'] = $results->office;
        $data['fax'] = $results->fax;
        $data['text'] = 'Edit';

     
        $this->load->view('layout/header');
        $this->load->view('location/location_add',$data);
        $this->load->view('layout/footer');
    }

    /**
     * Delete Location
     * @return void
     * @access public
     */
    public function delete($id=false) {
        $this->db->delete('location', array('id' => $id)); 
         redirect('location/manage/'); 
    }

  

}
