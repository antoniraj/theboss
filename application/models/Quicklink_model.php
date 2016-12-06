<?php

/**
 * User Model Class
 * Provides database access for user management [Agent, Clerk, Administrator]
 * @access public
 * @package models
 * @Author Infant Kishore, Joan Britto S, Jerin Monish AC
 * @Reviewed Loganathan N
 */
class Quicklink_model extends CI_Model {

    public $CI;
    public $table_name = 'quick_link';
  

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

    public function add($data=false)
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

    public function edit($id=false,$data=false)
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
    public function get_all_links() {
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
    public function get_link_byid($id=false) {
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

    public function add_view_count($id=false)
    {
        $sql = "UPDATE news SET view_count = view_count +1 WHERE id = ?";
        $this->db->query($sql, array($id));
    }
    
   

}
