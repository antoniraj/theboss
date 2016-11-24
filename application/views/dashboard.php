
      
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">A Message from the CEO</h3>
        </div>
        <div class="panel-body msg-panel">
               <dl>
            <?php foreach ($results as $key => $value) { ?>
            <dt><?php echo date('M d,Y',strtotime($value->created_on));?></dt>
               <dd>
              <h3><a href="#"><?php echo $value->title?></a></h3>
                <p><?php echo $value->summary?></p>
                <ul class="list-unstyled list-inline">
                  <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 0 Views</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 0 Comments</a></li>
                 
                  
                </ul>
            </dd>
            <?php }?>
          </dl>
        </div>
      </div><!--panel-->

