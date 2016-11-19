

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $text;?> Event</h3>
        </div>
        <div class="panel-body msg-panel">
         <!-- form -->
         <form method="post" id="frmAddNews" name="frmAddNews" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input required type="text" value="<?php echo $title;?>" id="title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>

  <div class="form-group">
    <label for="exampleSelect1">Channel</label>
    <select required class="form-control" id="exampleSelect1" id="news_type" name="news_type">
      <option value="">Select a Channel</option>
      <option value="1" <?php echo ($news_type==1)?'selected':''; ?>>Message From the CEO</option>
      <option value="2" <?php echo ($news_type==2)?'selected':''; ?>>Community</option>     
    </select>
  </div>

  <div class="form-group">
    <label for="exampleTextarea">Summary</label>
    <textarea required class="form-control" id="exampleTextarea" rows="3" id="summary" name="summary"><?php echo $summary;?></textarea>
  </div>
<input type="hidden" name="id" value="<?php echo $id;?>">
  <button type="submit" value="news_add" name="newssave" id="newssave" class="btn btn-primary">Submit</button>
</form>
         <!-- form -->
        </div>
      </div><!--panel-->

