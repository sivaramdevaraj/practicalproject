<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <title>Admin - Prabha Info Solutions</title> -->
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/uniform.min.js"></script>
</head>
<body class="full-width page-condensed">
<!-- Navbar -->
<div class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header"><a class="navbar-brand" href="#">Rice Room<!-- <img src="<?php echo base_url()?>assets/images/logo.png" height ="28" alt="Prabha Info Solutions"> --></a></div>  
</div>
<!-- /navbar -->
<!-- Login wrapper -->
<div class="login-wrapper">
  <?php echo form_open("auth/login");?>
    <div class="popup-header"><span class="text-semibold">User Login</span></div>
    <div class="well">
    <div id="infoMessage" class="error"><?php echo $message;?></div>
      <div class="form-group has-feedback">
        <label>Username</label>
        <?php echo form_input($identity);?>
        <i class="icon-users form-control-feedback"></i></div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <?php echo form_input($password);?>
        <i class="icon-lock form-control-feedback"></i></div>
      <div class="row form-actions">
        <div class="col-xs-6">
          <div class="checkbox checkbox-success">
            <label>
              <input type="checkbox" class="styled" name="remember" value="1" id="remember">
              Remember me</label>
          </div>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Sign in</button>
        </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>
<!-- /login wrapper -->
<!-- Footer -->
<div class="footer clearfix">
  <!-- <div class="pull-left">&copy; 2014. Admin by <a href="http://www.webdesignpis.com/" target="_blank">Prabha Info Solutions</a></div> -->
  <div class="pull-right icons-group"> <a href="#"><i class="icon-screen2"></i></a> <a href="#"><i class="icon-balance"></i></a> <a href="#"><i class="icon-cog3"></i></a> </div>
</div>
<!-- /footer -->
<script>
  $(document).ready(function(){
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice', selectAutoWidth: false });
    $('form').validate();
  });
</script>
</body>
</html>