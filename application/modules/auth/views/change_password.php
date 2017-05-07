<?php $this -> load -> view (admin.'/includes/header');?>
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Dashboard <small>Welcome to Admin. <?php echo timespan($this->session->userdata('old_last_login'), time()) ;?> since last visit</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li class="active">Password Change</li>
      </ul>
    </div>
    <!-- /breadcrumbs line -->
<div class="row">
      <div class="col-md-12">
<!-- Form bordered -->
      <?php echo form_open("auth/change_password",'class="form-horizontal form-bordered .validate"');?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-menu"></i> <?php echo lang('change_password_heading');?> </h6>
        </div>
        <div class="panel-body">
        <h1><?php echo $message;?></h1>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo lang('change_password_old_password_label', 'old_password');?> </label>
            <div class="col-sm-10">
              <?php echo form_input($old_password);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
            <div class="col-sm-10">
              <?php echo form_input($new_password);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?></label>
            <div class="col-sm-10">
              <?php echo form_input($new_password_confirm);?>
            </div>
          </div>
          <div class="form-actions text-right">
          <?php echo form_submit('submit', lang('change_password_submit_btn'),'class="btn btn-primary"');?>
          </div>
        </div>
      </div>
    </form>
    <!-- /form striped -->
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('form').validate();
  });
</script>
<?php $this -> load -> view (admin.'/includes/footer');?>