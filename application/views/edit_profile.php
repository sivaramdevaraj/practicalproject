<?php include_once('includes/header.php'); ?>
<div class="container-fluid b_top_menu">
   <div class="container ni_pad_tp_bt">
      <div class="row">
         <div class="col-md-12">
             <ol class="breadcrumb breadc_b">
                     <li><a href="<?php echo site_url(); ?>" class="red"> <i class="fa fa-home"></i> <sapn class="hidden-xs">Home</sapn></a></li>
                     <li class="hidden-xs"><span  class="red"></i> My Account</span></li>
                     <li class="active">Edit profile</li>
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
                        <h5 class="text-uppercase br_bt red f_h5">Edit Profile</h5>
                     </div>
                     <div class="panel-body">
                      <form class="form-horizontal" action="change_profile_information" method="post" id="edit_form">
                        <fieldset>
                          <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Name<span class="red">*</span></label>
                            <div class="col-lg-10 col-sm-12">
                              <input type="text" value="<?php echo $user_details->name; ?>" class="form-control edit_input required" name="name"  placeholder="Enter Name...">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail" class="col-lg-2  control-label">Email <span class="red">*</span></label>
                            <div class="col-lg-10 col-sm-12">
                              <input type="text" readonly="readonly" value="<?php echo $user_details->email; ?>" class="form-control edit_input required" name="email"  placeholder="Enter Email..">
                            </div>
                          </div>
                          <!-- <div class="form-group">
                            <label for="inputEmail" class="col-lg-2  control-label">Address</label>
                            <div class="col-lg-10 col-sm-12">
                              <textarea class="form-control edit_input required" rows="3" id="textArea" name="address" placeholder="Enter Address.."></textarea>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Mobile No <span class="red">*</span></label>
                            <div class="col-lg-10 col-sm-12">
                              <input type="text" class="form-control edit_input required number" value="<?php echo $user_details->phone; ?>" name="phone" placeholder="Enter Mobile No">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="text-right col-md-12">
                              <input type="hidden" name="curl" value="<?php echo current_url()?>">
                              <button type="submit" class="btn btn-danger btn-sm">Save Changes</button>
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
        $('#edit').addClass('current');
         $('#edit_form').validate();
    });
  
</script>