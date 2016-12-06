
<div class="panel panel-danger">
<div class="panel-heading">
  <h3 class="panel-title">Department Files</h3>
  
</div>
<div class="panel-body msg-panel">

    <form id="frm_dep_files">
     
    <?php foreach ($results as $key => $value) { ?>
         <h4><a href="<?php echo base_url()?>Department/viewfiles/<?php echo $value->folder_name;?>/<?php echo $value->id;?>"><?php echo $value->name;?></a></h4>      
    <?php }?>
   
       
       
    </form>

</div>
</div><!--panel-->

