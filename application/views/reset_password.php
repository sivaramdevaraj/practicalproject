<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>

<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row">
         <div class="col-md-6 center-block f_none">
      	  <h1 class="style_font text-center red">Reset Password</h1><br>
          <form method="POST" class="form-horizontal" action="<?php echo site_url('usersinfo/password_change'); ?>" id="reset">
            <div class="form-group">
              <label class="col-md-4 control-label">New Password <span class="red">*</span></label>
              <div class="col-md-8">
                <input type="password" id="rpassword" name="password" class="form-control required"  placeholder="Enter new password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Confirm Password <span class="red">*</span></label>
              <div class="col-md-8">
                <input type="password" name="c_password" class="form-control required"  equalto="#rpassword" placeholder="Enter confirm  password">
              </div>
            </div>
            
            <div class="form-group">
              <div class="pull-right">
                <input name="user_id" value="<?php echo $user_info->id; ?>" type="hidden">
                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
              </div>
            </div>
          </form>
         </div>
        </div>
    </div> 
</div>




<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
 $('#reset').validate();
 </script>