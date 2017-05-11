<style type="text/css">
  .thumb_hover{
    padding:11px 40px;
  }
</style>

<!-- Page header -->
  <div class="page-header">
    <div class="page-title"> <h3><?= $categories_sub->name?> Categories</h3> </div>
  </div>
<!-- /page header -->
<!-- Breadcrumbs line -->
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li>Home</li>
      <li><a href="<?php echo site_url().admin?>">Shop now</a></li>
      <li><a href="<?=site_url().admin?>categories/">Categories</a></li>
      <li class="active"><?= $categories_sub->name?></li>
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
        <h6 class="panel-title"><i class="icon-table"></i> <?=(isset($category))? $category->name: 'Categories'?> list</h6>
        <div class="panel-icons-group"> <?php $abuilder = array('id'=>'','name'=>'','parent_id'=>'');?>  
         <script>var builder_0 = <?php echo json_encode($abuilder)?></script>            
          <a data="builder_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add category"><i class="icon-plus"></i></a>
        </div>
      </div>      
      <div class="datatable-media">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Name</th>       
                <th>Status</th> 
                <th>Action</th>
              </tr>                    
            </thead>
            <tbody>
            <?php if(isset($categories) && is_array($categories) && count($categories)): $i=1;?>
              <?php foreach ($categories as $key => $cat) { ?>
                <tr id="row_<?php echo $cat->id;?>">
                  <td><?php echo $i++; ?></td>               
                  <td>
                   <?php echo $cat->name;?>
                  </td>                  
                  <td><i data="<?php echo $cat->id;?>" class="status_checkc btn icon-<?php echo ($cat -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i> </td> 
                  <td>
                      <script>var cat_<?=$cat->id?> = <?=json_encode($cat);?></script>
                      <a data="<?='cat_'.$cat->id?>" role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="icon-pencil"></i></a>
                      <a data="<?php echo  $cat->id ?>" title="Delete <?php echo $cat->name;?>" class="tip delete_check"><i class="icon-close"></i></a>             

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
<!-- Category form modal -->
  <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Category </h4>
        </div>
        <?php echo form_open_multipart(site_url().admin.'/categories/add_edit', '');?>
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Category name: *</label>
                  <input type="text" id="name" name="name" title="Please enter category name" class="form-control required" value="">
                </div>
              </div>
            </div>                                  
          </div>                                 
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="parent_id" value="<?php echo $categories_sub->id?>">
              <input type="hidden" name="curl" value="<?=current_url()?>">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- / Category form modal --> 
<script>
  $(document).ready(function(){   
        $('form').validate({
     errorPlacement: function(error, element) {
       if (element.next().hasClass("filename")) {
          error.insertAfter(element.parent().next('.help-block'));
       }else{
          error.insertAfter(element);
       }
     }           
     }); 
    $('#categories').addClass('active');
    $(document).on('click','.model_form',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();           
      var data = eval($(this).attr('data'));     
      $('#name').val(data.name); 
      $('#id').val(data.id);
      editor.setValue(data.seo_description);        
      $.uniform.update();
    });

    $(document).on('click','.delete_check',function(){
      if(confirm("Are you sure to delete data")){
        var current_element = $(this);
        url = "<?php echo site_url().admin?>categories/sub_delete_all";
        $.ajax({
        type:"POST",
        url: url,
        data: {ct_id:$(current_element).attr('data')},
        success: function(data) { location.reload(); } 
      });
      }
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
  });
</script>