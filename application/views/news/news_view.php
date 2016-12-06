<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $text;?></h3>
  </div>
  <div class="panel-body msg-panel">
         <dl>
      
      <dt><?php echo date('M d,Y',strtotime($created_on));?></dt>
         <dd>
        <h3><a href="#"><?php echo $title?></a></h3>
          <p><?php echo $summary?></p>
          <ul class="list-unstyled list-inline">
            <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> <?php echo $view_count;?> Views</a></li>
               
          </ul>
      </dd>
     
    </dl>
  </div>
</div><!--panel-->