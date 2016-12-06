<?php

/**
 * Agent Controller Class
 * Provides functionality for agent management
 * @access public
 * @package controllers
 * @Author Infant Kishore, Joan Britto S
 * @Reviewed Loganathan N
 */
class Departmentfiles extends CI_Controller {

    /**
     * Agent Constructor
     *
     * @access public
     * */
    function __construct() {
        parent::__construct();
        $this->load->model('departmentfiles_model');
        $this->load->model('department_model');
        $this->load->model('staff_model');
       
    }

    
    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function deplist() {  
        $data['results'] = $this->department_model->get_all();
       // echo '<pre>';print_r($data['results']);exit;
        if($this->session->userdata('user_type')==1)
        {
            $this->load->view('layout/header');
            $this->load->view('departments_files/list',$data);
            $this->load->view('layout/footer');
        }
        else
        {
            $this->load->view('layout/header');
            $this->load->view('departments_files/staffview',$data);
            $this->load->view('layout/footer');
        }
       
    }

    /**
     * List the Community Events
     * @return void
     * @access public
     */
    public function viewfiles($folder_name,$id) {  
        $data['results'] = $this->department_model->get_cat_byid($id);       
        $data['folder_name'] = decryptData($folder_name);
        $data['id'] = $id; 
        $dir = 'department_files/'.decryptData($folder_name);

        $data['bread_crum'] = gen_file_url($data['folder_name'],$id);
        
        $data['dir'] = $dir;
        $data['add_url'] = encryptData($dir); 

        $this->load->view('layout/header');
        $this->load->view('departments_files/viewfiles',$data);
        $this->load->view('layout/footer');
    }

     /**
     * add_folder
     * @return void
     * @access public
     */
    public function add_folder($folder_name,$id) { 
       
        if(isset($_POST['btnadd']))
        {

            
           $file_path = decryptData($this->input->post('file_path'));

           $data['user_id'] = $this->session->userdata('staff_id');
           $data['file_name'] = $this->input->post('file_name');
           $path_url = str_replace('department_files/','',$file_path).'/'.$data['file_name'];
           $path = 'department_files/'.$path_url;
    
            if (!file_exists($path)) {
                mkdir($path, 0777);
               
            }

           $url_folder = $file_path;
           $url_folder = encryptData($path_url);

           $data['file_type'] = 1;
           $data['parent_id'] = $this->input->post('id');
           $data['file_path'] = $file_path;

          
           $this->departmentfiles_model->add_file($data);
           $this->session->set_flashdata('message', 'File has been Added successfully!');
           redirect('departmentfiles/viewfiles/'.$url_folder.'/'.$data['parent_id']); 
        }
        $data['file_path'] = $folder_name;
        $data['id'] = $id;
        $data['text'] = 'Add Folder';     
        $this->load->view('layout/header');
        $this->load->view('departments_files/add_folder',$data);
        $this->load->view('layout/footer');
    }

     /**
     * add_folder
     * @return void
     * @access public
     */
    public function add_files($folder_name,$id) { 
       
        if(isset($_POST['btnadd']))
        {            
           $file_path = decryptData($this->input->post('file_path'));

           $data['user_id'] = $this->session->userdata('staff_id');
           $data['file_name'] = $this->input->post('file_name');
           $path_url = str_replace('department_files/','',$file_path).'/'.$data['file_name'];
           $path = 'department_files/'.$path_url;
    
            if (!file_exists($path)) {
                mkdir($path, 0777);
               
            }

           $url_folder = $file_path;
           $url_folder = encryptData($path_url);

           $data['file_type'] = 1;
           $data['parent_id'] = $this->input->post('id');
           $data['file_path'] = $file_path;

          
           $this->departmentfiles_model->add_file($data);
           $this->session->set_flashdata('message', 'File has been Added successfully!');
           redirect('departmentfiles/viewfiles/'.$url_folder.'/'.$data['parent_id']); 
        }
        $data['file_path'] = $folder_name;
        $data['id'] = $id;
        $data['text'] = 'Add Folder'; 
        $data['staff'] = $this->staff_model->get_all_staff();

        $this->load->view('layout/header');
        $this->load->view('departments_files/add_files',$data);
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

     /**
     * Creates the agent signin functionality
     * @return void
     * @access public
     */
    public function upload($path,$id,$staff_id) {  
       $targetDir = decryptData($path);
       //$targetDir = 'department_files/';
       
        $fileName = $_FILES['file']['name'];
        $targetFile = $targetDir.'/'.$fileName;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
            $file_path = $targetDir;

           $data['user_id'] = $this->session->userdata('staff_id');
           $data['file_name'] = $fileName;       
       
           $data['file_type'] = 1;
           $data['parent_id'] = $id;
           $data['file_path'] = $file_path;
            $data['assign_to'] = $staff_id;

          
           $this->departmentfiles_model->add_file($data);
        }
    }

/**
     * List the Community Events
     * @return void
     * @access public
     */
    public function staff_files($folder_name,$id) {  
        $data['results'] = $this->department_model->get_cat_byid($id);       
        $data['folder_name'] = $folder_name;
        $data['id'] = $id; 

        $dir = 'department_files/'.$folder_name;
        $path = $folder_name;         
        if (!file_exists($path)) {
            mkdir($path, 0777);           
        }
        else
        {
            rrmdir($path);
        }
        //echo $dir;exit;
        
        // if($id==3)
        // {
        //     $staff_id = $this->session->userdata('staff_id');
        //     $path = $this->staff_model->get_staff_files($staff_id);
        //     if($path==0)
        //     {
        //          $this->session->set_flashdata('message', 'You are not assiged any Directory!');
        //         redirect('Departmentfiles/deplist/');
        //     }
        // }
        // else
        // {
        //    xcopy($dir, $path); 
        //    $data['dir_path'] = $path;
        // }

         xcopy($dir, $path); 
           $data['dir_path'] = $path;
        
        $this->load->view('layout/header');
        $this->load->view('departments_files/staff_files',$data);
        $this->load->view('layout/footer');
    }

     /**
     * delete_files
     * @return void
     * @access public
     */
    public function delete_files($id) {  
      // echo '<pre>'; 

       $listed_files = $this->input->post('listed_files');
       $redir_path = '';
       foreach ($listed_files as $key => $value) {
            $file_path = decryptData($value);
            $ex_path = explode('/',$file_path);
            $remov_last = array_pop($ex_path);
            $redir_path = implode('/',$ex_path);
           
            $path = 'department_files/'.$file_path;
         
            if (file_exists($path)) {
                @chmod( $path, 0777 );
               
                 if(is_dir($path)) { 
                   rmdir($path);
                } else {
                    unlink($path);
                }              
            }              
        } 

        $this->session->set_flashdata('message', 'File has been deleted successfully!');
        redirect('departmentfiles/viewfiles/'.encryptData($redir_path).'/'.$id);
        // print_r($redir_path);exit;   
        
    }
   
  

}
