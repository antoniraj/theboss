

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $text;?></h3>
        </div>
        <div class="panel-body msg-panel">
         <!-- form -->
         <form method="post" id="frmAddNews" name="frmAddNews" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input required type="text" value="<?php echo $name;?>" id="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>

<input type="hidden" name="id" value="<?php echo $id;?>">
  <button type="submit" value="cat_add" name="btncatadd" id="btncatadd" class="btn btn-primary">Save</button>
</form>
         <!-- form -->
        </div>
      </div><!--panel-->

