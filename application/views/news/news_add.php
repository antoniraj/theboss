

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $text;?></h3>
        </div>
        <div class="panel-body msg-panel">
         <!-- form -->
         <form method="post" id="frmAddNews" name="frmAddNews" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input required type="text" value="<?php echo $title;?>" id="title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
 

  <div class="form-group">
    <label for="exampleTextarea">Summary</label>
    <textarea required class="form-control" id="exampleTextarea" rows="3" id="summary" name="summary"><?php echo $summary;?></textarea>
  </div>
  <input type="hidden" id="news_type" name="news_type" value="<?php echo $news_type;?>">
<input type="hidden" name="id" value="<?php echo $id;?>">
  <button type="submit" value="news_add" name="newssave" id="newssave" class="btn btn-primary">Save</button>
</form>
         <!-- form -->
        </div>
      </div><!--panel-->

