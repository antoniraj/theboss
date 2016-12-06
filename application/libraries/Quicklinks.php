<?php
/**
 * @author Perksme Development Team
 * Used to get Common task to done for All User maily for Super Admin
 * Created on 25th Nov 2015
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Quicklinks{
    
    function __construct() 
    {
        $this->CI =& get_instance();      
        //load libraries
        $this->CI->load->database('default', true);
        $this->CI->load->library("session");
    }
    
    
    /* Changing User Password */
    function show_admin() {
        // $AccountNumber = $this->CI->session->userdata('accountno');
        // $query1 = "SELECT Password FROM pm_users WHERE AccountNumber = ?";
        // $result = $this->CI->db->query($query1, array($AccountNumber));
        // if($result->num_rows() > 0)
        // {
        //     $OldPassword = $result->row()->Password;
        //     if($this->CI->input->post('old_password',TRUE) === decryptData($OldPassword))
        //     {
        //         $query2 = "UPDATE pm_users SET PASSWORD = ? WHERE AccountNumber = ?";
        //         $this->CI->db->query($query2, array(encryptData($this->CI->input->post('new_password',TRUE)),$AccountNumber));
        //         return show_error_message(1, 'Password Updated Successfully');
        //     }
        //     else
        //     {
        //         return show_error_message(2, 'Invalid Old Password');
        //     }
        // }
        // else
        // {
        //     return show_error_message(2, 'This User Does Not Exit.');
        // }
        $query1 = "SELECT * FROM quick_link ORDER BY id ASC";
        $qry_quick = $this->CI->db->query($query1);
        $results_array = $qry_quick->result_array();
        $user_type = $this->CI->session->userdata('user_type');
        ?>
         <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Quick Links</h3>
        </div>
        <div class="panel-body">
          <ul class="quick_links">
            <?php if($user_type==1){?>
              <?php foreach ($results_array as $key_quick => $quick) { ?>
                <li><a href="<?php echo $quick['link']; ?>" target="<?php echo $quick['window_open']; ?>"><?php echo $quick['name']; ?></a>
                  &nbsp; <a href="<?php echo base_url();?>Quicklink/edit/<?php echo $quick['id'];?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a>
                  <a href="<?php echo base_url();?>Quicklink/delete/<?php echo $quick['id'];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
                </li>
              <?php }?>
               <a href="<?php echo base_url();?>quicklink/add" class="btn btn-primary">Add New</a>
            <?php }else { ?>
                <?php foreach ($results_array as $key_quick => $quick) { ?>
                  <li><a href="<?php echo $quick['link']; ?>" target="<?php echo $quick['window_open']; ?>"><?php echo $quick['name']; ?></a></li>
                <?php }?>
            <?php } ?>

          <!--   <li><a href="https://staffingspecifix.tsheets.com/page/login" target="_blank">Enter Your Hours</a></li>
           <li><a href="https://www.epaystubaccess.com/acctmgr.asp?pgid=browser&mdid=scr1&verid=eng" target="_blank">View Your Paystub(s)</a></li>
          <li><a href="https://staffingspecifixinc.igloocommunities.com/events/employee_vacations" target="_blank">Request vacation</a></li>
          <li><a href="#" target="_blank">Submit expenses</a></li>
          <li><a href="<?php echo base_url()?>staff/profile/<?php echo $this->CI->session->userdata('staff_id')?>">Update your profile</a></li>
          <li><a href="https://gordg.aviontego.com/RDWeb/Pages/en-US/login.aspx?ReturnUrl=default.aspx" target="_blank">Avionte</a></li>
           -->
          </ul>
         
          
        </div>
      </div><!--panel-->

    </div>

        <?php 
    }
   
}