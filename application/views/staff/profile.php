<script type="text/javascript">
jQuery(function($){
   $("#dob").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});  
});
</script>

<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $text;?></h3>
  </div>
  <div class="panel-body msg-panel">
   <!-- form -->
   <form enctype="multipart/form-data" method="post" id="frmAddNews" name="frmAddNews" action="<?php echo base_url();?>staff/profile_process">

     <div class="panel-body"> 
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



<input type="hidden" name="id" value="<?php echo $id;?>">
<button type="submit" value="save_profile" name="save_profile" id="save_profile" class="btn btn-primary">Save</button>
</form>
<!-- form -->
</div>
</div><!--panel-->

