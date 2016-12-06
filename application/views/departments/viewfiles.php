<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<div class="panel panel-danger">
<div class="panel-heading">
  <h3 class="panel-title">Department Files - <?php echo $results->name;?></h3>
  
</div>
<div class="panel-body msg-panel">

    <form id="frm_dep_files">
    	<a class="btn btn-primary" href="<?php echo base_url();?>Department/add_folder/<?php echo $folder_name;?>/<?php echo $id;?>">Add Folder</a>
     <br><br>
     <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Title</th> 
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
       
    </form>

</div>
</div><!--panel-->

