<?php

/**
 * User Model Class
 * Provides database access for user management [Agent, Clerk, Administrator]
 * @access public
 * @package models
 * @Author Infant Kishore, Joan Britto S, Jerin Monish AC
 * @Reviewed Loganathan N
 */
class Location_model extends CI_Model {

    public $CI;
    public $table_name = 'location';
  

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

    public function add_location($data=false)
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
     * Edit Location
     * @return array data
     * @param str $param array of login details
     * @access public
     */

    public function edit_location($id=false,$data=false)
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
    public function get_all_location() {
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
    public function get_location_byid($id=false) {
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
     * Edit News
     * @return array data
     * @param str $param array of login details
     * @access public
    */
    public function search($search_word=false)
    {             
        $search = '%'.$search_word.'%';

        $sql = 'SELECT * FROM location WHERE title LIKE ? OR location LIKE ? OR office LIKE ? OR fax LIKE ?';
        $query = $this->db->query($sql, array($search, $search,$search, $search));
        return $data = $query->result();
    }
    
    
   

}
