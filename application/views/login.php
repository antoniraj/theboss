 <!DOCTYPE html>
<html lang="en">
<head>
  <title>The BOSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/theboss.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <?php
  $login_css = array(
      'css/bootstrap.min',
      'css/theboss',     
      'css/font-awesome.min',
     
  );
  add_css_file($login_css);
  ?>
</head>
<body>


<div class="container login">
  <div class="row">
      <div id="logo-container"></div>
      <div class="col-sm-12 col-md-4 col-md-offset-4">
        <h1 style="background:#000; color:#fff; letter-spacing:1; text-align:center; padding:5px; margin:5%;">The BOSS</h1>
        <p>&nbsp;</p>
        <form action="<?php echo base_url().'login/validateuser'; ?>" id="loginForm" method="post">
          <div class="login-inner">
            <h4>Sign In</h4>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input class="form-control" type="email" id="email" name="email" name='' placeholder="Email Address"/>          
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="glyphicon glyphid="password" name="password"icon-lock"></i></span>
              <input class="form-control" type="password" id="password" name="password" placeholder="Password"/>     
            </div>
            <div class="form-group text-center">
              <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Remember Me</a>
            </div>
          </div>
          <button type="submit" class="btn btn-danger btn-block">Sign In</button>
        </form>        
      </div>
  </div>
</div>

<?php
   $login_js = array(
            'js/jquery.min',
            'js/bootstrap.min',           
        );
        add_js_file($login_js);
?>
</body>
</html>