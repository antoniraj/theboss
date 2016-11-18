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

</head>
<body>
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">The Boss (Best Of Staffing Specifix)</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i> Settings</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
  <nav class="navbar navbar-default theboss-nav">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="#"><i class="fa fa-bullseye" aria-hidden="true"></i>
            Departments</a></li>
          <li><a href="#">
            <i class="fa fa-globe" aria-hidden="true"></i>
            Locations</a></li>
          <li><a href="#">
            <i class="fa fa-users" aria-hidden="true"></i>
            Staff</a></li>
          <li><a href="#">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            Events</a></li>
          <li><a href="#">
            <i class="fa fa-comments" aria-hidden="true"></i>
            Messages From the CEO</a></li>
        </ul>
        <form class="navbar-form navbar-left" style="margin-top:1%;">
          <div class="input-group">
            <input class="form-control">
            <div class="input-group-btn">
              <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
          
        </form>
        <ul class="nav navbar-nav navbar-right" style="margin-top:1%;">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User name <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

<div class="container">