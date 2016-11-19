<?php

/**
 * User Model Class
 * Provides database access for user management [Agent, Clerk, Administrator]
 * @access public
 * @package models
 * @Author Infant Kishore, Joan Britto S, Jerin Monish AC
 * @Reviewed Loganathan N
 */
class News_model extends CI_Model {

    public $CI;
    public $table_name = 'news';
  

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

    public function add_news($data=false)
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

    public function edit_news($id=false,$data=false)
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
     * Get All CEO Message
     * @access public
     * @param $id as int
     * @return array data
     * */
    public function get_all_ceo_message() {
        $table_name = $this->table_name;
        $data = [];

        $this->db->select('*')
                ->from($table_name)
                ->where(array('news_type' => 1));
        $result = $this->db->get();
        if (!empty($result)) {
            $data = $result->result();
        }

        return $data;
    }

    /**
     * exclude CEO Message and display other news
     * @access public
     * @param $id as int
     * @return array data
     * */
    public function get_all_news() {
        $table_name = $this->table_name;
        $data = [];

        $this->db->select('*')
                ->from($table_name)
                ->where(array('news_type' => 2));
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
    public function get_news_byid($id=false) {
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
    
   

}
