 <!DOCTYPE html>
<html lang="en">
<head>
  <title>The BOSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
  $header_css = array(
      'css/bootstrap.min',
      'css/theboss',     
      'css/font-awesome.min',     
     
  );
  add_css_file($header_css);
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/elfinder.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css" />

  <script src="//code.jquery.com/jquery-1.12.3.js"></script>
  <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
  <?php 
     $header_js = array(
              'js/app',
              'js/jquery.maskedinput',
              'js/elfinder.min',              
          );
          add_js_file($header_js);
  ?>
</head>
<body>
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>dashboard">The Boss (Best Of Staffing Specifix)</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <!--  <li>
                    <a href="#"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
                </li> -->
                <li>
                    <a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
                </li>
               <!--  <li>
                    <a href="#"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i> Settings</a>
                </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
  <nav class="navbar navbar-default theboss-nav">
    <div class="container-fluid">

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url()?>Departmentfiles/deplist"><i class="fa fa-bullseye" aria-hidden="true"></i>
            Departments</a></li>
          <li><a href="<?php echo base_url();?>/location/manage">
            <i class="fa fa-globe" aria-hidden="true"></i>
            Locations</a></li>
            <?php if($this->session->userdata('user_type')==1) {?>
              <li><a href="<?php echo base_url();?>/staff/manage">
              <i class="fa fa-users" aria-hidden="true"></i>
              Staff</a></li>
            <?php }else{ ?>
            
              <li><a href="<?php echo base_url();?>/staff/viewstaff">
              <i class="fa fa-users" aria-hidden="true"></i>
              Staff</a></li>
            <?php } ?>

          <li><a href="<?php echo base_url();?>/news/manage">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            Events</a></li>
          <li><a href="<?php echo base_url();?>/news/manage_ceo">
            <i class="fa fa-comments" aria-hidden="true"></i>
            Messages From the CEO</a></li>
            <?php if($this->session->userdata('user_type')==1) {?>
          <li><a href="<?php echo base_url();?>/department/manage_cat">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            Categories</a></li>
            <?php } ?>

        </ul>
        <form method="post" action="<?php echo base_url();?>/search" class="navbar-form navbar-left" style="margin-top:1%;">
          <div class="input-group">
            <input class="form-control" name="search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
          
        </form>
        <?php
        if($this->session->userdata('d_name')=='')
        {
          redirect('login/logout'); 
        }
        ?>
        <ul class="nav navbar-nav navbar-right" style="margin-top:1%;">
          <li class="dropdown">
            <a href="<?php echo base_url()?>staff/profile/<?php echo $this->session->userdata('staff_id')?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('d_name'); ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url()?>staff/profile/<?php echo $this->session->userdata('staff_id')?>">Profile</a></li>
              <li><a href="#">Change Password</a></li>
              <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
             <!--  <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li> -->
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

<div class="container">
  <div class="row">
   <?php echo $this->quicklinks->show_admin(); ?>
    <div class="col-md-8">