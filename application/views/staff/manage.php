
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
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td></td>
               
            </tr>
           
        </tbody>
    </table>
        </div>
      </div><!--panel-->

