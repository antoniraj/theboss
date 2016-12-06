
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Staff</h3>
          <?php if($this->session->userdata('user_type')==1) {?>
          <div align="right"><a class="btn btn-primary" href="<?php echo base_url()?>staff/add">Add New</a></div>
            <?php } ?>
        </div>
        <div class="panel-body msg-panel">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email-Id</th>
                <th>Action</th>
              
            </tr>
        </thead>
    
        <tbody>
            <?php foreach ($results as $key => $value) {
               $photo = '<img width="50" class="img-circle" src="'.base_url().'/img/no_image.jpg">&nbsp;';
               if($value->photo!='')
               {
                $photo = '<img width="50" class="img-circle" src="'.base_url().'/staff_photo/'.$value->photo.'">&nbsp;';
               }
           ?>
            <tr>
                <td><?php echo $photo;?><?php echo $value->first_name.' '.$value->last_name?></td>
                <td><?php echo date('m/d/Y',strtotime($value->dob));?></td>
                <td><?php echo $value->email;?></td>
                <td><a href="<?php echo base_url();?>staff/edit/<?php echo $value->id;?>/2"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></td>
               
            </tr>
            <?php } ?>          
        </tbody>
    </table>
        </div>
      </div><!--panel-->

