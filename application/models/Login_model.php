<?php

/**
 * User Model Class
 * Provides database access for user management [Agent, Clerk, Administrator]
 * @access public
 * @package models
 * @Author Infant Kishore, Joan Britto S, Jerin Monish AC
 * @Reviewed Loganathan N
 */
class Login_model extends CI_Model {

    public $CI;
    public $table_name = 'users';
  

    /**
     * Constructor
     * 
     * */
    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

    /**
     * Retrieves user details after checking user login details
     * @return array data
     * @param str $param array of login details
     * @access public
     */
    public function check_login($param) {
        $table_name = $this->table_name;
        $return = [];
        $this->db->select('*')
                ->from($table_name)
                ->where('email=', $param['email'])
                ->or_where('mobile',$param['email'])
                ->where('password=', $param['password'])
                ->where('status=', 'Active');              
              
        $data = $this->db->get();
        if (!empty($data)) {
            $return['data'] = $data->result();
            return $return;
        } else {
            return $return;
        }
    }

   

}
