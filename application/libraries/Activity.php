<?php
/**
 * @author Perksme Development Team
 * Used to get Common task to done for All User maily for Super Admin
 * Created on 25th Nov 2015
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Activity{
    
    function __construct() 
    {
        $this->CI =& get_instance();      
        //load libraries
        $this->CI->load->database('default', true);
        $this->CI->load->library("session");
    }
    
    
    function show_admin() {
         $CI =& get_instance();
        $sql_activity = "SELECT * FROM user_activity GROUP BY user_id ORDER BY viewed_on DESC LIMIT 0,5";
        $ex_sql = $this->CI->db->query($sql_activity);
        $results_activity = $ex_sql->result_array();
        $user_type = $this->CI->session->userdata('user_type');
        if($user_type==1)
        {
          $CI->load->model('staff_model');
        ?>
          <section calss="employee">
            <div class="container">
              <div class="employee-inner">
                <h3>Recent employee activity</h3>
                  <ul class="list-inline list-unstyled">
                    <?php foreach ($results_activity as $key => $value) { 
                      $staff_info = $CI->staff_model->get_staff_byid($value['user_id']);
                       $photo = '<img  class="img-circle img-responsve" src="'.base_url().'/assets/images/photo.jpg">&nbsp;';
                       if($staff_info->photo!='')
                       {
                        $photo = '<img width="50" class="img-circle img-responsve" src="'.base_url().'/staff_photo/'.$staff_info->photo.'">&nbsp;';
                       }
                      ?>                  
                    
                        <li>
                          <?php echo $photo; ?>
                          <h5><?php echo $staff_info->first_name.' '.$staff_info->last_name?></h5>
                        </li>
                    <?php } ?>
                  </ul>
              </div>
            </div>
          </section>

        <?php
        } 
    }
   
}