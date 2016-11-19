<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Dashboard extends CI_Controller {

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
    public function index() {
        
        //$this->template->title($this->lang->line('signin'));
        //$this->template->build('agent_view/signin');
        //$this->template->title($this->lang->line('dashboard')); 
        $data['results'] = $this->news_model->get_all_ceo_message();       
       
         $this->load->view('layout/header');
        $this->load->view('dashboard',$data);
        $this->load->view('layout/footer');
    }

  

}
