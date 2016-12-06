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
     <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input required type="text" value="<?php echo @$first_name;?>" id="first_name" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" value="<?php echo @$last_name;?>" id="last_name" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

           <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" value="<?php echo @$title;?>" id="title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
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
            <label for="exampleInputEmail1">Photo</label>
            <input type="file" id="photo" name="photo"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <input type="hidden" name="ex_photo" id="ex_photo" value="<?php echo $photo;?>">
            <?php if($photo!=''){?>
              <img src="<?php echo base_url().'/staff_photo/'.$photo;?>">
            <?php } ?>
          </div>


<input type="hidden" name="id" value="<?php echo $id;?>">
<button type="submit" value="location_add" name="locationsave" id="locationsave" class="btn btn-primary">Submit</button>
</form>
<!-- form -->
</div>
</div><!--panel-->

