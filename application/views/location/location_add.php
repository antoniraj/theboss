

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $text;?> Location</h3>
        </div>
        <div class="panel-body msg-panel">
         <!-- form -->
         <form method="post" id="frmAddNews" name="frmAddNews" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input required type="text" value="<?php echo $title;?>" id="title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Location</label>
    <textarea required class="form-control" id="exampleTextarea" rows="3" id="location" name="location"><?php echo $location;?></textarea>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Office</label>
    <input required type="text" value="<?php echo $office;?>" id="office" name="office" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Fax</label>
    <input required type="text" value="<?php echo $fax;?>" id="fax" name="fax" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
<input type="hidden" name="id" value="<?php echo $id;?>">
  <button type="submit" value="location_add" name="locationsave" id="locationsave" class="btn btn-primary">Submit</button>
</form>
         <!-- form -->
        </div>
      </div><!--panel-->

