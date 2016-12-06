<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Department extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('department_model');
       
    }

   
 
    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function manage() {  
        $data['results'] = $this->department_model->get_all();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('departments/manage',$data);
        $this->load->view('layout/footer');
    }

   
      /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function manage_cat() {  
        $data['results'] = $this->department_model->get_all_cat();
       // echo '<pre>';print_r($data['results']);exit;
        $this->load->view('layout/header');
        $this->load->view('departments/cat_list',$data);
        $this->load->view('layout/footer');
    }


    /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function add() {      
        
        if(isset($_POST['btncatadd']))
        {            
            $data['name'] = $this->input->post('name');
            $data['folder_name'] = sluggify($this->input->post('name'));

            $path = 'department_files/'.$data['folder_name'];
         
            if (!file_exists($path)) {
                mkdir($path, 0777);
               
            }
             
          
            $result = $this->department_model->add($data);
            $this->session->set_flashdata('message', 'Catagory has been saved successfully!');
            redirect('department/manage_cat/', $result); 
        }

        $data['id'] = '';
        $data['name'] = '';       
        $data['text'] = 'Add Department Category';
            
       
        $this->load->view('layout/header');
        $this->load->view('departments/add',$data);
        $this->load->view('layout/footer');
    }

     /**
     * Update News info
     * @return void
     * @access public
     */
    public function edit($id=false) { 

        if(isset($_POST['btncatadd']))
        {
            
            $data['name'] = $this->input->post('name');
          
            $result = $this->department_model->edit($id,$data);
            $this->session->set_flashdata('message', 'Catagory has been saved successfully!');
            redirect('department/manage_cat/', $result); 
            
        }

        $results = $this->department_model->get_cat_byid($id);
        $data['id'] = $id;
        $data['name'] = $results->name;       
        $data['text'] = 'Edit Department Category';
     
        $this->load->view('layout/header');
        $this->load->view('departments/add',$data);
        $this->load->view('layout/footer');
    }

        /**
     * Delete Location
     * @return void
     * @access public
     */
    public function delete($id=false) {
        $this->db->delete('dept_cat', array('id' => $id)); 
        $this->session->set_flashdata('message', 'Catagory has been deleted successfully!');
        redirect('department/manage_cat/'); 
            
    }

   
  

}
