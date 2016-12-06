<script type="text/javascript">
jQuery(function($){
   $("#dob").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});  
});
</script>

<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $text;?> Staff</h3>
  </div>
  <div class="panel-body msg-panel">
   <!-- form -->
   <form enctype="multipart/form-data" method="post" id="frmAddNews" name="frmAddNews" action="<?php echo base_url();?>staff/add_process">

     <div class="panel-body"> 
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#basic_info" data-toggle="tab" class="active"><i class="fa fa-user"></i> Basic Information</a></li>
        <li><a href="#im_accounts" data-toggle="tab"><i class="fa fa-user"></i> IM Accounts</a></li>
        <li><a href="#other_profile" data-toggle="tab"><i class="fa fa-user"></i> Other Profiles</a></li>

      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="basic_info">
          <div class="form-group">&nbsp;</div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input required type="text" value="<?php echo @$first_name;?>" id="first_name" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" value="<?php echo @$last_name;?>" id="last_name" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input required type="email" value="<?php echo @$email;?>" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Mobile No</label>
            <input required type="text" value="<?php echo @$mobile_no;?>" id="mobile_no" name="mobile_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"> Date of Birth</label>
            <input required type="text" value="<?php echo @$dob;?>" id="dob" name="dob" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
<span class="help-block">mm/dd/yyyy</span>
          </div>

          <div class="form-group">
            <label for="exampleSelect1">Gender</label>
            <select required class="form-control" id="exampleSelect1" id="gender" name="gender">
              <option value="">Select Gender</option>
              <option value="1" <?php echo ($gender==1)?'selected':''; ?>>Male</option>
              <option value="2" <?php echo ($gender==2)?'selected':''; ?>>Female</option>     
            </select>
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Language</label>
            <input type="text" value="<?php echo @$language;?>" id="language" name="language" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>


          <div class="form-group">
            <label for="exampleTextarea">About</label>
            <textarea required class="form-control" id="exampleTextarea" rows="3" id="about_me" name="about_me"><?php echo @$about_me;?></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">My Blog</label>
            <input type="text" value="<?php echo @$my_blog;?>" id="my_blog" name="my_blog" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">My Website</label>
            <input type="text" value="<?php echo @$my_website;?>" id="my_website" name="my_website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">

          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Photo</label>
            <input type="file" id="photo" name="photo"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">

          </div>
        </div> <!-- BASIC INFO -->
        <div class="tab-pane fade" id="im_accounts">
          <div class="form-group">&nbsp;</div>
         <div class="form-group">
          <label for="exampleInputEmail1">Skype</label>
          <input type="text" value="<?php echo @$skype;?>" id="skype" name="skype" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Hangout</label>
          <input type="text" value="<?php echo @$hangout;?>" id="hangout" name="hangout" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">MSN</label>
          <input type="text" value="<?php echo @$msn;?>" id="msn" name="msn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Yahoo Chat</label>
          <input type="text" value="<?php echo @$yahoo_chat;?>" id="yahoo_chat" name="yahoo_chat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Skype for Business</label>
          <input type="text" value="<?php echo @$skype_business;?>" id="skype_business" name="skype_business" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
      </div> <!-- IM Accounts -->
      <div class="tab-pane fade" id="other_profiles">
        <div class="form-group">&nbsp;</div>
       <div class="form-group">
        <label for="exampleInputEmail1">Linked In</label>
        <input type="text" value="<?php echo @$linkedin;?>" id="linkedin" name="linkedin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Facebook</label>
        <input type="text" value="<?php echo @$facebook;?>" id="facebook" name="facebook" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Twitter</label>
        <input type="text" value="<?php echo @$twitter;?>" id="twitter" name="twitter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Google</label>
        <input type="text" value="<?php echo @$google;?>" id="google" name="google" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      </div>
    </div> <!-- Other Profiles -->

  </div>
</div><!--panel-body-->







<input type="hidden" name="id" value="<?php echo $id;?>">
<button type="submit" value="location_add" name="locationsave" id="locationsave" class="btn btn-primary">Submit</button>
</form>
<!-- form -->
</div>
</div><!--panel-->

