
 <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Pages</h3>
      </div>
    </div>
    <!-- /page header -->
   <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Shopping Cart</a></li>
        <li class="active"> Pages</li>
      </ul>
    </div>
    <!-- /breadcrumbs line -->
    <?php if($this->session->flashdata('message')){?>
    <div class="alert alert-success fade in block-inner">            
          <button type="button" class="close" data-dismiss="alert">×</button>
          <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?> </div>
    <?php } ?>
     <?php if($this->session->flashdata('error')){?>
    <div class="alert alert-danger fade in block-inner">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error')?> </div>
    <?php } ?>
  <!-- Datatable with tools menu -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-table"></i>All Pages </h6>
        <div class="panel-icons-group"> <?php $apage = array('id'=>'','image'=>'','page_name'=>'','url_name'=>'','name'=>'','description'=>'','other_column'=>'','add'=>'','p_id'=>'','status'=>'');?>
          <script>var page_0 = <?php echo json_encode($apage)?></script>
         <a data="page_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add pages"><i class="icon-plus"></i></a> 
        </div>
      </div>
      
       <div class="datatable-media">
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="cat_table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>              
              <th>URL Name</th>                        
              <th>Add</th>  
              <th>Actions</th>
            </tr>                    
          </thead>
          <tbody>
          <?php 
          if(isset($pages) && is_array($pages) && count($pages)): $i=1;?>
            <?php foreach ($pages as $key => $page) { ?>
              <tr id="row_<?php echo $page->id;?>">
                <td> <?php echo $i++; ?> </td>                
                <td> <?php echo $page->page_name;?> </td>                                       
                <td> <?php echo $page->url_name;?>  </td>                                                
                <td> <?php echo ($page->add)? 'YES': 'NO';?>  </td> 
                <td>
                <script>var page_<?php echo $page->id ?> = <?php echo json_encode($page);?></script>
                <div class="icons-group"> 
                  <a data="<?php echo 'page_'.$page->id ?>" 
                  role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="icon-pencil"></i></a>
                  <a data="<?php echo 'page_'.$page->id ?>" 
                  role="button" class="btn btn-link btn-icon data_form tip" title="View"><i class="icon-eye"></i></a>
                  <a href="<?php echo site_url().admin?>pages/delete/<?php echo $page -> id;?>" title="Delete " class="tip" onclick="return confirm('Are you sure to delete')"><i class="icon-close"></i></a> 
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
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Taxi details </h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'pages/add_edit', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">             
              <div class="form-group">
                  <div class="row">
                  <div class="col-sm-6">
                    <label>Page Name :</label>
                    <input type="text" name="page_name" id="page_name" class="form-control required">
                    <span class="help-block">Display Name</span>             
                  </div>
                  <div class="col-sm-6">
                    <label>URL Name :</label>                 
                    <input type="text" name="url_name" id="url_name" class="form-control required">
                    <span class="help-block">For url purpose </span>                    
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                    <label>Name :</label>
                     <input type="text" name="name" id="name" class="form-control required">
                     <span class="help-block">"0":No; "1":Yes; "2":Yes and mandatory; "3": Yes and other name</span>
                  </div>
                  <div class="col-sm-6">
                    <label>Description :</label>
                     <input type="text" name="description" id="description" class="form-control required">
                     <span class="help-block">"0":No; "1":Yes; "2":Yes and mandatory; "3": Yes and other name</span>
                  </div>             
                </div>
              </div>           
              <div class="form-group">
                  <div class="row">
                  <div class="col-sm-6">
                    <label>Image :</label>
                     <input type="text" name="image" id="image" class="form-control required">
                     <span class="help-block">"0":No; "1":Yes; "2":Yes and mandatory; "3": Yes and other name</span>
                  </div>
                  <div class="col-sm-6">
                    <label>Other Column :</label>
                     <input type="text" name="other_column" id="other_column" class="form-control required">
                     <span class="help-block">"0":No; "1":Yes; "2":Yes and mandatory; "3": Yes and other name</span>
                  </div>
                </div>
              </div> 
              <div class="form-group">
                  <div class="row">
                  <div class="col-sm-6">
                    <label>Image Size:</label>
                     <input type="text" name="image_size" id="image_size" class="form-control required">
                     <span class="help-block">"Width":;"Height":;</span>
                  </div>
                  <div class="col-sm-6">
                    <label>Add:</label>
                    <div>
                      <select name="add" id="add" class="select-full required">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                      </select>
                    </div>                  
                  </div>
                </div>
              </div>     
              <div class="form-group">
                <div class="row">
                  
                  <div class="col-sm-6">
                    <label>Sub Content :</label>
                     <input type="text" name="p_id" id="p_id" class="form-control required">
                     <span class="help-block">"0":No;name of url_name of subcontent</span>
                  </div>
                </div>
              </div>
            </div>           
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <span id="add">
                <input type="hidden" name="id" value="" id="id">                
                <input type="hidden" name="curl" value="<?php echo current_url()?>" id="id">                
                <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /form modal -->

    <!-- data modal -->
    <div id="data_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Taxi details </h4>
          </div>
          <div class="modal-body with-padding">
            <table class="table table-striped">
              <tbody>
                <tr> <td>Name.</td> <td id="dname"></td></tr>
                <tr> <td>Description.</td> <td id="ddescription"></td></tr>
                <tr> <td>Image</td> <td id="dimage"></td></tr>
                <tr> <td>Other Column</td> <td id="dother"></td></tr>
                <tr> <td>Image Size</td> <td id="dsize"></td></tr>
              </tbody>
            </table>
          </div>           
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>            
          </div>
        </div>
      </div>
    </div>
    <!-- /form modal -->
<script>
  $(document).ready(function(){ 
    $('#pages_m').addClass('active');
    $('#pages_m a').attr('id','second-level');
    $('#pages_m li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>')
        $(this).closest('li').addClass('active');
    });  
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
      $('#add').select2("val",data.add);
      $('#page_name').val(data.page_name);
      $('#url_name').val(data.url_name);
      $('#name').val(data.name);
      $('#description').val(data.description);
      $('#image').val(data.image);
      $('#other_column').val(data.other_column); 
      $('#image_size').val(data.image_size); 
      $('#p_id').val(data.p_id); 
    });
    $(document).on('click','.data_form',function(){
      $('#data_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      var data = eval($(this).attr('data'));
      $('#dname').html(data.name);
      $('#ddescription').html(data.description);
      $('#dimage').html(data.image);
      $('#dparking').html(data.parking);
      $('#dother').html(data.other_column);
      $('#dsize').html(data.image_size);
    });   
   
  });
</script>