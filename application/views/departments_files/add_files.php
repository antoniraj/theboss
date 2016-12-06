<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/dropzone.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/dropzone.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $( "#staff_id" ).change(function() {
      id = $(this).val();
      if(id=='all')
      {
        URL = '<?php echo base_url()?>Departmentfiles/upload/<?php echo $file_path;?>/<?php echo $id;?>/all';
      }
      else
      {
           URL = '<?php echo base_url()?>Departmentfiles/upload/<?php echo $file_path;?>/<?php echo $id;?>/'+id;
      }
       $(".dropzone").attr("action", URL);
    });
  });
</script>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $text;?></h3>
  </div>
  <div class="panel-body msg-panel">
    <!-- form -->
      <div class="form-group">
          <label for="exampleInputEmail1">Staff</label>
          <select name="staff_id" id="staff_id" class="form-control">
            <option value="all">All</option>
            <?php foreach ($staff as $key => $value) { ?>
              <option value="<?php echo $value->id;?>"><?php echo $value->first_name.' '.$value->last_name;?></option>
            <?php }?>
          </select> 
      </div>
    <div class="image_upload_div">
      <form action="<?php echo base_url()?>Departmentfiles/upload/<?php echo $file_path;?>/<?php echo $id;?>/all" class="dropzone">
    
      </form>
    </div>
    <!-- form -->
  </div>
</div><!--panel-->

