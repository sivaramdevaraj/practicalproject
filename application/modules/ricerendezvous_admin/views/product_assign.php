<?php if(isset($mode) && $mode == 'all'): ?>
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3><?php echo $category->name; ?> Products</h3>
      </div>
    </div>
  <!-- /page header -->  
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>home">Home</a></li>
        <li class="active"><?php echo $category->name; ?></li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Sueccss message  -->
  <?php if($this->session->flashdata('message')){?>
      <div class="alert alert-success fade in block-inner">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?> 
      </div>
  <?php } ?>
  <!--end Sueccss message  -->
     
  <!-- Datatable with tools menu -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-table"></i> All Product Details</h6>
          <div class="panel-icons-group"> 
            <a href="#" class="btn btn-link btn-icon tip model_form" title="Add"><i class="icon-plus"></i></a> </div>
        </div>
         <div class="datatable-media">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th >#</th>                
                <th>Image</th>
                <th>Name</th>
                <th>Sku id</th>           
                <th>Updated on</th>
                <th>Actions</th>
              </tr>                    
            </thead>
            <tbody>
            <?php if(isset($products) && is_array($products) && count($products)): $i=1;?>
              <?php foreach ($products as $key => $product) { ?>
                 <tr>
                  <td> <?php echo $i++; ?> </td> 
                  <?php if((substr($product->image, 0, 7 ) === "http://") ||(substr($product->image, 0, 8) === "https://")) : 
                        $src=$product->image;
                      else :
                          $src=base_url('uploads/products/thumb').'/'.$product->image;
                      endif;
                  ?> 
                  <td> <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $product->productname?>">
                           <img src="<?php echo $src;?>" alt="" class="img-media"/>
                       </a>    
                  </td>
                  <td> <?php echo $product -> productname?> </td> 
                  <td> <?php echo $product -> sku_id?> </td>
                  <td> <?php echo $product -> last_update?> </td>
                  <td>
                       <script>var subcat_<?php echo $product->assignid ?> = <?php echo json_encode($product);?></script>
                       <a title="Delete <?php echo $product -> productname?>" class="tip delete" data="<?php echo $product->assignid?>"><i class="icon-close"></i></a>                       
                  </td>
                </tr>
              <?php } ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
  <!-- /datatable with tools menu -->
<div id="model_form" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add</span> Product</h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'product_assign/product_add', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">              
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                      <?php  $categories [''] = 'Select product Categories name';
                              $options =' id="catt_id" data-placeholder="Choose a country name..." class="select-full required" tabindex="2"';
                             echo form_dropdown('c_id',$categories,'',$options);?>
                  </div>
                </div>
              </div>              
              <div id="subcat">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-2 control-label"> Subccategory</label>
                    <div class="col-sm-12">
                      <select id="subb_id" name="sub_id" data-placeholder="Choose a Subcategory..." class="select-full" tabindex="2">
                      <option value=""></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label"> Subsub category</label>
                      <div class="col-sm-12">
                        <select id="subb_subid" name="cat_name" data-placeholder="Choose a course sub subcategory..." class="select-full required" tabindex="2">
                        <option value=""></option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="form-group" id="subbb_subids" style="display:none;">
                  <div class="row">
                    <label class="col-sm-10 control-label"> Subsub sub category</label>
                      <div class="col-sm-12">
                        <select id="subbb_subid" name="cat_name" data-placeholder="Choose a course subsub subcategory..." class="select-full required" tabindex="2">
                        <option value=""></option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label"> Product</label>
                      <div class="col-sm-12">
                        <div id="product"></div>
                      </div>
                    </div>
                </div>
               </div>
             
          </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="cat_id" value="<?php echo $category->id; ?>" id="id">
              <input type="hidden" name="curl" value="<?=current_url()?>">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
          </div>
          </form>
        </div>
      </div>
 </div>
<?php endif; ?>
<!-- /form modal -->

<script type="text/javascript">

  $(document).ready(function(){
  $('#assign_product').addClass('active'); 
  //$('#assign_product a').attr('id','second-level');
  $('#assign_product li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });  
  $('form').validate({  
  ignore: ":hidden:not(textarea)",  
    rules: {
           cust_image:{ required: true, extension: "gif|jpeg|jpg|png"},
       old_image:{ required: true, extension: "gif|jpeg|jpg|png"},
           cust_details:{required:true} 
           //rec_image:{ required: true}       
       
        },
        messages: {
          rec_image:{ extension:"File must be in gif / jpeg / jpg / png formats"},
      
        },
        errorPlacement: function(error, element) {
        if (element.next().hasClass("filename")) {
           error.insertAfter(element.parent().next('.help-block'));
        }else{
           error.insertAfter(element);
        }
    }
  
    });
    $(document).on('click','.model_form',function(){
      $('#model_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('#cat_form')[0].reset();
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      return false;
    });  
    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>product_assign/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });
    $(document).on('change','#catt_id',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>product_assign/subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#subb_id').html(data); 
                      $('#subcat').show();
         }
       });
      $('#subb_id').select2("val","");
    });
    $(document).on('change','#subb_id',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>/product_assign/sub_subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#subb_subid').html(data); 
         }
       });
      $('#subb_subid').select2("val","");
    });
    $(document).on('change','#subb_subid',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>product_assign/products/";
      $.ajax({
         type: "POST",
         url: url,
         dataType: "html",
         data: {cat_id:value},
         success: function(data)
         {
             if(data)
             { 
               var str = data; 
               var res = str.substring(0, 1);
               if(res=='1')
               {
                 $('#ass_search').dataTable();
                 $('#product').html(data);
                 $('#subbb_subids').hide();
               }
               else {
                 $('#subbb_subids').show();
                 s_data = data.replace(/\\/g, '')
                 $('#subbb_subid').html(s_data);
               }               
             }             
         }
       });
      $('#subbb_subid').select2("val","");
    });
    $(document).on('change','#subbb_subid',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>product_assign/products/";
      $.ajax({
         type: "POST",
         url: url,
         dataType: "html",
         data: {cat_id:value},
         success: function(data)
         {
            if(data)
             $('#ass_search').dataTable();
             $('#product').html(data);
         }
       });        
    });

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
    } 
    $('.nav-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash;
    })
  });
</script>
