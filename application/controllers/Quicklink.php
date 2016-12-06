<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Quicklink extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('Quicklink_model');
       
    }

    /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function add() {      
        
        if(isset($_POST['btnadd']))
        {
            
            $data['name'] = $this->input->post('name');
            $data['link'] = $this->input->post('link');
            $data['window_open'] = $this->input->post('window_open');          
            $result = $this->Quicklink_model->add($data);
            
            $this->session->set_flashdata('message', 'Quick Link has been saved successfully!');
            redirect('Quicklink/manage/', $result); 
        }

        $data['id'] = '';
        $data['name'] = '';        
        $data['link'] = '';
        $data['window_open'] = '';
        $data['text'] = 'Add Quick Link';
          
       
        $this->load->view('layout/header');
        $this->load->view('quicklink/add',$data);
        $this->load->view('layout/footer');
    }

      /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function manage() {  
        $data['results'] = $this->Quicklink_model->get_all_links();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('quicklink/manage',$data);
        $this->load->view('layout/footer');
    }

    /**
     * Update News info
     * @return void
     * @access public
     */
    public function edit($id=false) { 

        if(isset($_POST['btnadd']))
        {
            
           $data['name'] = $this->input->post('name');
            $data['link'] = $this->input->post('link');
            $data['window_open'] = $this->input->post('window_open');          
            $result = $this->Quicklink_model->edit($id,$data);
            $this->session->set_flashdata('message', 'Quick Link has been saved successfully!');
            redirect('Quicklink/manage/', $result);         
  
        }

        $results = $this->Quicklink_model->get_link_byid($id);
        $data['id'] = $id;
        $data['name'] = $results->name;
        $data['link'] = $results->link;
        $data['window_open'] = $results->window_open;
        
         $data['text'] = 'Edit Quick Link';   
     
       $this->load->view('layout/header');
        $this->load->view('quicklink/add',$data);
        $this->load->view('layout/footer');
    }

        /**
     * Delete Location
     * @return void
     * @access public
     */
    public function delete($id=false,$channel=false) {
        $this->db->delete('news', array('id' => $id)); 
        if($channel==1)
        {
            $this->session->set_flashdata('message', 'CEO Message has been deleted successfully!');
            redirect('news/manage_ceo/', $result);
        }
        else
        {
            $this->session->set_flashdata('message', 'News has been deleted successfully!');
            redirect('news/manage/', $result); 
        }
            
    }

    /**
     * view news News info
     * @return void
     * @access public
     */
    public function view($id=false,$channel=false) { 

       
        $results = $this->news_model->get_news_byid($id);
        $data['id'] = $id;
        $data['title'] = $results->title;
        $data['news_type'] = $results->news_type;
        $data['summary'] = $results->summary;
        $data['created_on'] = $results->created_on;
        $data['view_count'] = $results->view_count;

         $data['text'] = 'View News - '.$results->title;
        if($channel==1)
        {
            $data['text'] = 'View CEO Message - '.$results->title;
        }
        $this->news_model->add_view_count($id);
     
        $this->load->view('layout/header');
        $this->load->view('news/news_view',$data);
        $this->load->view('layout/footer');
    }

  

}
