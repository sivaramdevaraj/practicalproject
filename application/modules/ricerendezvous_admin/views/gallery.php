<!-- Page header -->
  <div class="page-header">
    <div class="page-title">
    <h3>Gallery</h3>
    </div>
  </div>
<!-- /page header -->
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
  <ul class="breadcrumb">
    <li><a href="<?php echo site_url().admin?>">Home</a></li>
    <li><a href="<?php echo site_url().admin.'/products'?>">Product</a></li>
    <li><a href="<?php echo site_url().admin.'/products'?>"><?php echo $product->product_type; ?></a></li>
    <li class="active"> Gallery</li>
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
      <h6 class="panel-title"><i class="icon-table"></i>Gallery List </h6>
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
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($gallery) && is_array($gallery) && count($gallery)): $i=1;?>
              <?php foreach ($gallery as $key => $gal) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <?php $src=base_url('uploads/gallery').'/'.$gal->image; ?>                 
                  <td> <a href="<?php echo $src;?>" class="lightbox" title="Product image">
                          <img src="<?php echo $src;?>" alt="" class="img-media"/>
                       </a>    
                  </td>
                  <td>
                  <script>var page_<?php echo $gal->id ?> = <?php echo json_encode($gal);?></script>
                  <div class="icons-group">
                    <a data="<?php echo 'page_'.$gal->id ?>" role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="icon-pencil"></i></a>
                    <a href="<?php echo site_url().admin.'gallery/delete'.'/'.$gal->id ?>" title="Delete" class="tip delete_check"><i class="icon-close"></i></a>
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
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add</span> Image</h4>
        </div>
        <!-- Form inside modal -->
        <?php echo form_open_multipart(site_url().admin.'/gallery/add_edit', 'id="cat_form" class=".validate"');?>
          <div class="modal-body with-padding">
             <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Image:</label>
                    <input type="file" class="styled form-control" id="report-screenshot" name="image">
                    <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
                    <input type="hidden" name="old_image" id="old_image" value="">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="product_id" value="<?php echo $product->id; ?>" id="product_id">
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
    $('#old_image').val(data.image);
    if(data.id!="")
      $('#pop_title').html('Edit');
  });
});
</script>