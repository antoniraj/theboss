
<script type="text/javascript">
$(document).ready(function() {
    $('#elfinder').elfinder({
        url : '<?php echo base_url();?>php/connector.minimal.php'  // connector URL (REQUIRED)
        // , lang: 'ru'                    // language (OPTIONAL)
    });
  
});
// $().ready(function() {
//             var elf = $('#elfinder').elfinder({
//                 url : '<?php echo base_url();?>php/connector.minimal.php',  // connector URL (REQUIRED)
//                 lang: 'de',             // language (OPTIONAL)
//                 cssClass: 'explorer',
//                 height: 450,
//                 uiOptions: {
//                     toolbar : [
//                         // toolbar configuration
//                         ['open'],
//                         ['back', 'forward'],
//                         ['reload'],
//                         ['home', 'up'],                        
//                         ['quicklook'],                       
                      
//                         ['archive'],
//                         ['search'],
//                         ['view'],
//                         ['help']
//                     ]
//                 },
//                 contextmenu : {
//                     files  : [
//                         'getfile', '|','open','|', 'archive', '|', 'info'
//                     ]
//                 }
//             }).elfinder("instance");
//         });
</script>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Department Files</h3>
          
        </div>
        <div class="panel-body msg-panel">

            <form id="frm_dep_files">
                <div class="form-group span7">
                    <label for="exampleInputEmail1">Department</label>
                        <select id="dept_files" class="form-control">
                            <?php foreach ($results as $key => $value) { ?>
                            <option><?php echo $value->name;?></option>
                            <?php  }?>
                        </select>                    
                </div>
                <div class="form-group">
                  
                    <button type="submit" value="news_add" name="newssave" id="newssave" class="btn btn-primary">Submit</button>
                </div>
            </form>
        <div id="elfinder"></div>
        </div>
      </div><!--panel-->

