
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">View Staff</h3>          
        </div>
        <div class="panel-body msg-panel">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email-Id</th>               
              
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
            </tr>
            <?php } ?>          
        </tbody>
    </table>
        </div>
      </div><!--panel-->

