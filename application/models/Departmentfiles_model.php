<?php

/**
 * User Model Class
 * Provides database access for user management [Agent, Clerk, Administrator]
 * @access public
 * @package models
 * @Author Infant Kishore, Joan Britto S, Jerin Monish AC
 * @Reviewed Loganathan N
 */
class Departmentfiles_model extends CI_Model {

    public $CI;
    public $table_name = 'department_files';
  

    /**
     * Constructor
     * 
     * */
    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

   
     /**
     * Add Catagory
     * @return array data
     * @param str $param array of login details
     * @access public
     */

    public function add_file($data=false)
    {
        $table_name = $this->table_name;
        $result = $this->db->insert($table_name, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


public function dir_to_array($dir, $separator = DIRECTORY_SEPARATOR, $paths = 'relative') 
{
    $result = array();
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value, array(".", "..")))
        {
            if (is_dir($dir . $separator . $value))
            {
                $result[$value] = $this->dir_to_array($dir . $separator . $value, $separator, $paths);
            }
            else
            {
                if ($paths == 'relative')
                {
                    $result[] = $dir . '/' . $value;                    
                }
                elseif ($paths == 'absolute')
                {
                    $result[] = base_url() . $dir . '/' . $value;
                }
            }
        }
    }
    return $result;
} 

    
}
