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
       
         $this->load->view('admin/admin_header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/admin_footer');
    }

  

}
