<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Search extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('location_model');
       
    }

    /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function index() {      
        $search_word = $this->input->post('search');
       // echo '<pre>'; print_r($_POST);exit;
        $data['event_community'] = $this->news_model->search_event($search_word);
        $data['event_ceo'] = $this->news_model->search_event_ceo($search_word);
        $data['location'] = $this->location_model->search($search_word);

        $data['search_word'] = $search_word;

        $this->load->view('layout/header');
        $this->load->view('search/search',$data);
        $this->load->view('layout/footer');
    }
}
