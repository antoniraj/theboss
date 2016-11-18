</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2016 &copy; David Johnson. All rights reserved. </div>
</div>

<!--end-Footer-part-->

<?php
   $header_js = array(
            'js/excanvas.min',
            'js/jquery.min',
            'js/jquery.ui.custom',
            'js/bootstrap.min',
            'js/jquery.flot.min',
            'js/jquery.flot.resize.min',
            'js/jquery.peity.min',
            'js/fullcalendar.min',
            'js/matrix.dashboard',
            'js/jquery.gritter.min',
            'js/matrix.interface', 
            'js/matrix.chat', 
            'js/jquery.validate', 
            'js/matrix.form_validation', 
            'js/jquery.wizard', 
            'js/jquery.uniform',
            'js/jquery.uniform',
            'js/select2.min',
            'js/matrix.popover', 
            'js/jquery.dataTables.min',
            'js/matrix.tables',     
        );
  add_js_file($header_js);
?>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
