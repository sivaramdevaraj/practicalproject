<?php include_once('includes/header.php'); ?>
<div class="container-fluid b_top_menu">
   <div class="container ni_pad_tp_bt">
      <div class="row">
         <div class="col-md-12">
             <ol class="breadcrumb breadc_b">
                     <li><a href="index.php" class="red"> <i class="fa fa-home"></i> <sapn class="hidden-xs">Home</sapn></a></li>
                     <li class="hidden-xs"><a href="#" class="red"></i> My Account</a></li>
                     <li class="active">Change Password</li>
             </ol>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-4">
             <div class="panel panel-default">
                     <div class="panel-heading head_padd">
                        <h5 class="text-uppercase br_bt red f_h5">MY Account</h5>
                     </div>
                     <div class="panel-body padd_5">
                        <?php include_once('includes/account.php'); ?>
                     </div>
                  </div>
         </div>
         <div class="col-md-9 col-sm-8">
             <div class="panel panel-default">
                     <div class="panel-heading head_padd">
                        <h5 class="text-uppercase br_bt red f_h5">Change Password</h5>
                     </div>
                     <div class="panel-body">
                        <form id="update_pwd" class="form-horizontal">
                  <fieldset>
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-3  control-label">Old Password <span class="red">*</span></label>
                      <div class="col-lg-9 col-sm-12">
                        <input type="password" class="form-control edit_input required" name="old_passwords" id="old_passwords" placeholder="Enter your Old Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-3  control-label">New Password <span class="red">*</span></label>
                      <div class="col-lg-9 col-sm-12">
                        <input type="password" class="form-control edit_input required" name="nepassword" id="nepassword" placeholder="Enter your New Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-3  control-label">Confirm Password <span class="red">*</span></label>
                      <div class="col-lg-9 col-sm-12">
                        <input type="password" class="form-control edit_input required"  name="chpassword" equalto="#nepassword" placeholder="Confirm your New Password">
                      </div>
                    </div>
                    <div align="center" class="error Password_error"></div>   
                    <div class="form-group">
                        <div class="text-right col-md-12">
                          <button type="button" class="btn btn-sm btn-danger update_passwords">submit</button>
                        </div>
                      </div>
                   </fieldset>
              </form>
                     </div>
                  </div>
         </div>
      </div>
   </div>
</div>
<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#change_pass').addClass('current');
         $('#pass_form').validate();
    });
  
</script>

<script>
     $('.update_passwords').on('click', function(){ 
      if($('#update_pwd').valid()){
        $.ajax({
          url : "<?php echo site_url(); ?>usersinfo/new_password",
          type: "POST",
          data : $('#update_pwd').serializeArray(),
          success: function(data)
            {
              if(data=='1')
                {         
                  window.location.reload(true);
                } 
              if(data=='0')
               {
                  $('.Password_error').html('The password you gave is incorrect.');
                  $('#old_passwords').val();
               }           
            }
        });
      }
    return false;
  });
</script>
