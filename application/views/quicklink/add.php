

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

  <div class="form-group">
    <label for="exampleTextarea">Link</label>
    <input required type="text" value="<?php echo $link;?>" id="link" name="link" class="form-control" >
  </div>

   <div class="form-group">
    <label for="exampleTextarea">Link to Open</label>
    <select name="window_open" id="window_open" class="form-control">
      <option value='_blank' <?php echo ($window_open=='_blank')?'selected':'';?>>New Tab</option>
      <option value="_self" <?php echo ($window_open=='_self')?'selected':'';?>>Same Tab</option>
    </select>
  </div>
 
<input type="hidden" name="id" value="<?php echo $id;?>">
  <button type="submit" value="btnadd" name="btnadd" id="btnadd" class="btn btn-primary">Save</button>
</form>
         <!-- form -->
        </div>
      </div><!--panel-->

