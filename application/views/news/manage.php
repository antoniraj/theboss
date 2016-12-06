

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Events</h3>
          <?php 
            $message =$this->session->flashdata('message');
            if(isset($message)) {
              echo '<div class="alert alert-warning">'.$message.'</div>';
            } 
          ?>
          <div align="right">&nbsp;<a class="btn btn-primary" href="<?php echo base_url()?>news/add/2">Add New</a></div>
        </div>
        <div class="panel-body msg-panel">
          <dl>
            <?php foreach ($results as $key => $value) { ?>
            <dt><?php echo date('M d,Y',strtotime($value->created_on));?></dt>
               <dd>
              <h3><a href="#"><?php echo $value->title?></a></h3>
                <p><?php echo $value->summary?></p>
                <ul class="list-unstyled list-inline">
                  <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>  <?php echo $value->view_count?> Views</a></li>                  
                  <li><a href="<?php echo base_url();?>news/edit/<?php echo $value->id;?>/2"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></li>
                  <li><a href="<?php echo base_url();?>news/delete/<?php echo $value->id;?>/2"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></li>
                </ul>
            </dd>
            <?php }?>
            
           
            
          </dl>
        </div>
      </div><!--panel-->

