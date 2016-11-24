

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Location</h3>
          <?php if($this->session->userdata('user_type')==1) {?>
            <div align="right"><a class="btn btn-primary" href="<?php echo base_url()?>location/add">Add New</a></div>
          <?php } ?>
        </div>
        <div class="panel-body msg-panel">
          <dl>
            <?php foreach ($results as $key => $value) { ?>
            
               <dd>
              <h3><a href="#"><?php echo $value->title?></a></h3>
                <p><?php echo $value->location?></p>
                <p>Office : <?php echo $value->office?></p>
                <p>Fax : <?php echo $value->fax?></p>
                <?php if($this->session->userdata('user_type')==1) {?>
                <ul class="list-unstyled list-inline">
                 
                  <li><a href="<?php echo base_url();?>location/edit/<?php echo $value->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></li>
                  <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url();?>location/delete/<?php echo $value->id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></li>
                </ul>
                <?php } ?>
            </dd>
            <?php }?>
            
           
            
          </dl>
        </div>
      </div><!--panel-->

