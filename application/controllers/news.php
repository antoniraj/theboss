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
             $data['created_on'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $data['status'] = 1;
            $result = $this->news_model->add_news($data);
            
            if($channel==1)
            {
                $this->session->set_flashdata('message', 'CEO Message has been saved successfully!');
                redirect('news/manage_ceo/', $result);
            }
            else
            {
                $this->session->set_flashdata('message', 'News has been saved successfully!');
                redirect('news/manage/', $result); 
            } 
        }

        $data['id'] = '';
        $data['title'] = '';
        $data['news_type'] = $channel;
        $data['summary'] = '';
        $data['text'] = 'Add News';
        if($channel==1)
        {
            $data['text'] = 'Add CEO Message';
        }       
       
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
              if($channel==1)
            {
                $this->session->set_flashdata('message', 'CEO Message has been saved successfully!');
                redirect('news/manage_ceo/', $result);
            }
            else
            {
                $this->session->set_flashdata('message', 'News has been saved successfully!');
                redirect('news/manage/', $result); 
            }
            
        }

        $results = $this->news_model->get_news_byid($id);
        $data['id'] = $id;
        $data['title'] = $results->title;
        $data['news_type'] = $results->news_type;
        $data['summary'] = $results->summary;
        $data['view_count'] = $results->view_count;
         $data['text'] = 'Edit News';
        if($channel==1)
        {
            $data['text'] = 'Edit CEO Message';
        }

     
        $this->load->view('layout/header');
        $this->load->view('news/news_add',$data);
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

        $data['text'] = 'View Event - '.$results->title;
        $activity['title'] = 'View Event - '.$results->title;
        $activity['description'] = 'View Event - '.$results->title;
        if($channel==1)
        {
            $data['text'] = 'View CEO Message - '.$results->title;
            $activity['title'] = 'View CEO Message - '.$results->title;
            $activity['description'] = 'View CEO Message - '.$results->title;
        }
        $activity['viewed_on'] = date('Y-m-d H:i:s');
        $activity['viewed_link'] = current_url();
        $activity['user_id'] =$this->session->userdata('staff_id');

       
        $this->Activity_model->add($activity);
        $this->news_model->add_view_count($id);
     
        $this->load->view('layout/header');
        $this->load->view('news/news_view',$data);
        $this->load->view('layout/footer');
    }

  

}
