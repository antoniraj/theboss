<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class News extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('news_model');
       
    }

    /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function add($channel) {      
        
        if(isset($_POST['newssave']))
        {
            
            $data['title'] = $this->input->post('title');
            $data['news_type'] = $this->input->post('news_type');
            $data['summary'] = $this->input->post('summary');
            $data['created_by'] = $this->session->userdata('id');
            $data['status'] = 1;
            $result = $this->news_model->add_news($data);
            $this->session->set_flashdata('message', 'News has beed saved successfully!');
            if($channel==1)
                redirect('news/manage_ceo/', $result);
            else
            {
                redirect('news/manage/', $result); 
            } 
        }

        $data['id'] = '';
        $data['title'] = '';
        $data['news_type'] = $channel;
        $data['summary'] = '';
        $data['text'] = 'Add';
       
        $this->load->view('layout/header');
        $this->load->view('news/news_add',$data);
        $this->load->view('layout/footer');
    }

    /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function manage_ceo() {  
        $data['results'] = $this->news_model->get_all_ceo_message();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('news/manage_ceo',$data);
        $this->load->view('layout/footer');
    }

    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function manage() {  
        $data['results'] = $this->news_model->get_all_news();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('news/manage',$data);
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
