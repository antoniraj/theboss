<script type="text/javascript">
// $(document).ready(function() {
//     $('#elfinder').elfinder({
//         url : '<?php echo base_url();?>php/connector.minimal.php?dir='+'<?php echo $dir_path;?>'  // connector URL (REQUIRED)
//         // , lang: 'ru'                    // language (OPTIONAL)
//     });
  
// });
$().ready(function() {
            var elf = $('#elfinder').elfinder({
                url : '<?php echo base_url();?>php/connector.minimal.php?dir='+'<?php echo $dir_path;?>',  // connector URL (REQUIRED)
                lang: 'de',             // language (OPTIONAL)
                cssClass: 'explorer',
                height: 450,
                uiOptions: {
                    toolbar : [
                        // toolbar configuration
                        ['open'],
                        ['back', 'forward'],
                        ['reload'],
                        ['home', 'up'],                        
                        ['quicklook'],                       
                      
                        ['archive'],
                        ['search'],
                        ['view'],
                        ['help']
                    ]
                },
                contextmenu : {
                    files  : [
                        'getfile', '|','open','|', 'archive', '|', 'info'
                    ]
                }
            }).elfinder("instance");
        });
</script>
<div class="panel panel-danger">
<div class="panel-heading">
  <h3 class="panel-title">Department Files - <?php echo $results->name;?></h3>
   <?php 
            $message =$this->session->flashdata('message');
            if(isset($message)) {
              echo '<div class="alert alert-warning">'.$message.'</div>';
            } 
          ?>
</div>
<div class="panel-body msg-panel">

    <div id="elfinder"></div>

</div>
</div><!--panel-->

