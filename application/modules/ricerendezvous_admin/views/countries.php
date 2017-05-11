<!-- Page header -->
  <div class="page-header">
    <div class="page-title">
    <h3>Countries</h3>
    </div>
  </div>
<!-- /page header -->
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
  <ul class="breadcrumb">
    <li><a href="<?php echo site_url().admin?>">Home</a></li>
    <li class="active"> Countries</li>
  </ul>
</div>
<!-- /breadcrumbs line -->
<!-- Success Message -->
  <?php if($this->session->flashdata('message')){?>
      <div class="alert alert-success fade in block-inner">            
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?>
      </div>
  <?php } ?>
<!-- /Success Message -->
<!-- Error Message -->
  <?php if($this->session->flashdata('error')){?>
    <div class="alert alert-danger fade in block-inner">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error')?> 
    </div>
  <?php } ?>
<!-- Error Message -->
<!-- Datatable with tools menu -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h6 class="panel-title"><i class="icon-table"></i>Countries List </h6>
      <div class="panel-icons-group"> <?php $apage = array('id'=>'','name'=>'');?>
        <script>var page_0 = <?php echo json_encode($apage)?></script>
       <a data="page_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add country"><i class="icon-plus"></i></a> 
      </div>
    </div>
    <div class="datatable-media">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="cat_table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($all_countries) && is_array($all_countries) && count($all_countries)): $i=1;?>
              <?php foreach ($all_countries as $key => $country) { ?>
                <tr id="row_<?php echo $country->id;?>">
                  <td> <?php echo $i++; ?> </td>
                  <td> <a href="<?php echo site_url().admin.'states/index/'.$country->id; ?>"><?php echo $country->name;?></a> </td>
                  <td><i data="<?php echo $country->id;?>" class="status_checkc btn icon-<?php echo ($country -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i> </td>
                  <td>
                  <script>var page_<?php echo $country->id ?> = <?php echo json_encode($country);?></script>
                  <div class="icons-group">
                    <a data="<?php echo 'page_'.$country->id ?>"role="button" class="btn btn-link btn-icon model_form tip" title="Edit <?php echo $country->name;?>"><i class="icon-pencil"></i></a>              
                    <a data="<?php echo  $country->id ?>" title="Delete <?php echo $country->name;?>" class="tip delete_check"><i class="icon-close"></i></a>
                  </td>
                </tr>
              <?php } ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
<!-- /datatable with tools menu -->
<!-- Form modal -->
  <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add</span> Country</h4>
        </div>
        <!-- Form inside modal -->
        <?php echo form_open_multipart(site_url().admin.'countries/add_edit', 'id="cat_form" class=".validate"');?>
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Name :</label>
                   <input type="text" name="name" id="name" class="form-control required">
                   <span class="help-block">Enter country name</span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="curl" value="<?php echo current_url()?>">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- /form modal -->
<script>
$(document).ready(function(){
  $('#countries').addClass('active');
  $('form').validate();
  $(document).on('click','.model_form',function(){
    $('#form_modal').modal({
      keyboard: false,
      show:true,
      backdrop:'static'
    });
    $('label.error').hide();
    var data = eval($(this).attr('data'));
    $('#id').val(data.id);
    $('#name').val(data.name);
    if(data.id!="")
      $('#pop_title').html('Edit');
  });
  $(document).on('click','.delete_check',function(){
    if(confirm("Are you sure to delete data")){
      var current_element = $(this);
      url = "<?php echo site_url().admin?>/countries/delete";
      $.ajax({
      type:"POST",
      url: url,
      data: {ct_id:$(current_element).attr('data')},
      success: function(data) { location.reload(); } });
    }
  });
  $(document).on('click','.status_checkc',function(){
    if(confirm("Are you sure to do this action")){
      var current_element = $(this);
      if($(this).hasClass("btn-success")) var status = 0;
      else var status = 1;
      url = "<?php echo site_url().admin?>/countries/status";
      $.ajax({
        type:"POST",
        url: url,
        data: {ct_id:$(current_element).attr('data'),status:status},
        success: function(data)
        {   
          if(status) $(current_element).addClass('btn-success icon-checkmark').removeClass('btn-danger icon-close');
          else $(current_element).removeClass('btn-success icon-checkmark').addClass('btn-danger icon-close');
        }
      });
    }      
  });
});
</script>