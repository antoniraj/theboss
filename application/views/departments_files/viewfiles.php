<script type="text/javascript">
$(document).ready(function() {

    $('#example').DataTable();

     $("#selected_all").change(function(){
        alert('ffff');
        // if(this.checked){
        //   $('input[name="listed_files[]"]').each(function(){
        //     this.checked=true;
        //   })              
        // }else{
        //   $('input[name="listed_files[]"]').each(function(){
        //     this.checked=false;
        //   })              
        // }
      });
} );

</script>
<div class="panel panel-danger">
<div class="panel-heading">
  <h3 class="panel-title">Department Files - <?php echo $bread_crum;?></h3>
  
</div>
<div class="panel-body msg-panel">
 <?php 
            $message =$this->session->flashdata('message');
            if(isset($message)) {
              echo '<div class="alert alert-warning">'.$message.'</div>';
            } 
          ?>
    <form id="frm_dep_files" method="post" action="<?php echo base_url()?>/Departmentfiles/delete_files/<?php echo $id;?>">
    	<a class="btn btn-primary" href="<?php echo base_url();?>Departmentfiles/add_folder/<?php echo $add_url;?>/<?php echo $id;?>">Add Folder</a>
        <a class="btn btn-primary" href="<?php echo base_url();?>Departmentfiles/add_files/<?php echo $add_url;?>/<?php echo $id;?>">Add Files</a>
        <button class="btn btn-primary">Delete Files</button>
     <br><br>
     <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="10%"><!-- <input type="checkbox" name="selected_all" id="selected_all"> --></th>
                <th>Title</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $separator = DIRECTORY_SEPARATOR;
            $result = array();
            $cdir = scandir($dir);
            foreach ($cdir as $key => $value)
            {
                
                if (!in_array($value, array(".", "..")))
                {
                    $delete_path = encryptData($folder_name.'/'.$value);
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="listed_files[]" value="'.$delete_path.'"></td>';
                    if (is_dir($dir . $separator . $value))
                    {
                       $file_path = encryptData($folder_name.'/'.$value);

                       echo '<td><a href="'.base_url().'Departmentfiles/viewfiles/'.$file_path.'/'.$id.'">'.$value.'</a></td>'; 
                    }
                    else
                    {
                        echo '<td>'.$value.'</td>'; 
                    }
                    echo '</tr>';
                }

            }
                    ?>
        </tbody>
    </table>
       
    </form>

</div>
</div><!--panel-->

