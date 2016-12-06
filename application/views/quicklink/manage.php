

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Quick Links</h3>
          <?php 
            $message =$this->session->flashdata('message');
            if(isset($message)) {
              echo '<div class="alert alert-warning">'.$message.'</div>';
            } 
          ?>
          <div align="right">&nbsp;<a class="btn btn-primary" href="<?php echo base_url()?>Quicklink/add">Add New</a></div>
        </div>
        <div class="panel-body msg-panel">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Name</th>               
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($results as $key => $value) {
              # code...
              ?>
              <tr>
                <td><?php echo $value->name?></td>                
                <td>
                  <a href="<?php echo base_url();?>Quicklink/edit/<?php echo $value->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
                  <a href="<?php echo base_url();?>Quicklink/delete/<?php echo $value->id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
                </td>
              </tr>
              <?php } ?>           
            </tbody>
          </table>
        </div>
      </div><!--panel-->

