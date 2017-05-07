<!-- Page header -->
  <div class="page-header">
    <div class="page-title">
    <h3>Categories</h3>
    </div>
  </div>
<!-- /page header -->
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
  <ul class="breadcrumb">
    <li><a href="<?php echo site_url().admin?>">Home</a></li>
    <li><a href="<?php echo site_url().admin?>">Shop now</a></li>
    <li class="active"> Categories</li>
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
      <h6 class="panel-title"><i class="icon-table"></i>Categories List </h6>
      <div class="panel-icons-group"> <?php $apage = array('id'=>'','name'=>'');?>
        <script>var page_0 = <?php echo json_encode($apage)?></script>
       <a data="page_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add Category"><i class="icon-plus"></i></a> 
      </div>
    </div>
    <div class="datatable-media">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="cat_table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <!-- <th>Image</th> -->
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($all_categories) && is_array($all_categories) && count($all_categories)): $i=1;?>
              <?php foreach ($all_categories as $key => $category) { ?>
                <tr id="row_<?php echo $category->id;?>">
                  <td> <?php echo $i++; ?> </td>
                  <td> <a href="<?php echo site_url().admin.'categories/sub_index/'?><?php echo $category->id;?>"><?php echo $category->name;?></a> </td>                 
                  <td><i data="<?php echo $category->id;?>" class="status_checkc btn icon-<?php echo ($category -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i> </td>
                  <td>
                  <script>var page_<?php echo $category->id ?> = <?php echo json_encode($category);?></script>
                  <div class="icons-group">
                    <a data="<?php echo 'page_'.$category->id ?>" role="button" class="btn btn-link btn-icon model_form tip" title="Edit <?php echo $category->name;?>"><i class="icon-pencil"></i></a>
                    <a data="<?php echo  $category->id ?>" title="Delete <?php echo $category->name;?>" class="tip delete_check"><i class="icon-close"></i></a>             
                   <!--  <a data="<?php echo  $category->id ?>" title="Delete <?php echo $category->name;?>" class="tip delete_check"><i class="icon-close"></i></a> -->
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
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add</span> category</h4>
        </div>
        <!-- Form inside modal -->
        <?php echo form_open_multipart(site_url().admin.'/categories/add_edit', 'id="cat_form" class=".validate"');?>
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Name :</label>
                   <input type="text" name="name" id="name" class="form-control required">
                   <span class="help-block">category name</span>
                </div>
              </div>
            </div>
             <!-- <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Image:</label>
                    <input type="file" class="styled form-control" id="report-screenshot" name="image">
                    <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
                    <input type="hidden" name="old_image" id="old_image" value="">
                  </div>
                </div>
              </div> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="curl" value="<?php echo current_url()?>">
              <button type="submit" class="btn btn-primary">Submit</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- /form modal -->
<script>
$(document).ready(function(){
  $('#categories').addClass('active');
   $('form').validate({
     errorPlacement: function(error, element) {
       if (element.next().hasClass("filename")) {
          error.insertAfter(element.parent().next('.help-block'));
       }else{
          error.insertAfter(element);
       }
     }           
     });
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
  $(document).on('click','.status_checkc',function(){
    if(confirm("Are you sure to do this action")){
      var current_element = $(this);
      if($(this).hasClass("btn-success")) var status = 0;
      else var status = 1;
      url = "<?php echo site_url().admin?>categories/status";
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
   $(document).on('click','.delete_check',function(){
    if(confirm("Are you sure to delete data")){
      var current_element = $(this);
      url = "<?php echo site_url().admin?>categories/delete_all";
      $.ajax({
      type:"POST",
      url: url,
      data: {ct_id:$(current_element).attr('data')},
      success: function(data) { location.reload(); } 
    });
    }
  });
});
</script>