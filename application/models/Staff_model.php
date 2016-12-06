<?php

/**
 * User Model Class
 * Provides database access for user management [Agent, Clerk, Administrator]
 * @access public
 * @package models
 * @Author Infant Kishore, Joan Britto S, Jerin Monish AC
 * @Reviewed Loganathan N
 */
class Staff_model extends CI_Model {

    public $CI;
    public $table_name = 'staff';
  

    /**
     * Constructor
     * 
     * */
    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

    /**
     * Add News
     * @return array data
     * @param str $param array of login details
     * @access public
     */

    public function add_staff($data=false)
    {
        $table_name = $this->table_name;
        $result = $this->db->insert($table_name, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Edit News
     * @return array data
     * @param str $param array of login details
     * @access public
     */

    public function edit_staff($id=false,$data=false)
    {
        $table_name = $this->table_name;
        $this->db->where('id', $id);
        $result = $this->db->update($table_name, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * exclude CEO Message and display other news
     * @access public
     * @param $id as int
     * @return array data
     * */
    public function get_all_staff() {
        $table_name = $this->table_name;
        $data = [];

        $this->db->select('*')
                ->from($table_name);
               
        $result = $this->db->get();
        if (!empty($result)) {
            $data = $result->result();
        }

        return $data;
    }

    /**
     * Get All CEO Message
     * @access public
     * @param $id as int
     * @return array data
     * */
    public function get_staff_byid($id=false) {
        $table_name = $this->table_name;
        $data = [];

        $this->db->select('*')
                ->from($table_name)
                ->where(array('id' => $id));
       $result = $this->db->get();
        if (!empty($result)) {
            $data = $result->row();
        }

        return $data;
       
    }


        /**
    * Inserts Absence  details
    * @access public
    * @param $data array data
    * @return boolean true details added successfully
    */
    public function add_user($data) {
        $table_name = 'users';
        $result = $this->db->insert($table_name, $data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

        /**
     * Get All CEO Message
     * @access public
     * @param $id as int
     * @return array data
     * */
    public function get_staff_id($id=false) {
        $table_name = $this->table_name;
        $data = [];

        $this->db->select('*')
                ->from($table_name)
                ->where(array('user_id' => $id));
       $result = $this->db->get();
        if (!empty($result)) {
            $data = $result->row();
        }

        return (isset($data->id))?$data->id:0;
       
    }

       /**
     * Get All CEO Message
     * @access public
     * @param $id as int
     * @return array data
     * */
    public function get_staff_files($id=false) {
       
        $this->db->select("*");
        $this->db->from('department_files');        
        $this->db->where_in('assign_to',$id);    
        $this->db->limit(0,1);
        $query = $this->db->get();
        
        $data = $query->result();

      if(count($data)==0)
      {
        return 0;
      } 
      else
      {
        return $data[0]->file_path;
      }    
    }
    
   

}
