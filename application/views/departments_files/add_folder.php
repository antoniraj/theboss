

<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $text;?></h3>
  </div>
  <div class="panel-body msg-panel">
    <!-- form -->
    <form method="post" id="frmAddNews" name="frmAddNews" action="">
      <div class="form-group">
          <label for="exampleInputEmail1">Folder Name</label>
          <input required type="text" value="" id="file_name" name="file_name" class="form-control">

      </div>

      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="file_path" value="<?php echo $file_path;?>">
      <button type="submit" value="add" name="btnadd" id="btnadd" class="btn btn-primary">Add</button>
    </form>
    <!-- form -->
  </div>
</div><!--panel-->

