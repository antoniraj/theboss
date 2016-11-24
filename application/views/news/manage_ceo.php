

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">CEO Message</h3>
          <?php if($this->session->userdata('user_type')==1) {?>
          <div align="right"><a class="btn btn-primary" href="<?php echo base_url()?>news/add/1">Add New</a></div>
       <?php } ?>
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
                  <?php if($this->session->userdata('user_type')==1) {?>
                  <li><a href="<?php echo base_url();?>news/edit/<?php echo $value->id;?>/1"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></li>
                  <li><a href="<?php echo base_url();?>news/delete/<?php echo $value->id;?>/1"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></li>
                 <?php } ?>
                </ul>
            </dd>
            <?php }?>
          </dl>
        </div>
      </div><!--panel-->

